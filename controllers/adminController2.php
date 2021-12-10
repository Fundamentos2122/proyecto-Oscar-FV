<?php

include("../models/DB.php");
include("../models/torneo.php");
// include("../models/convocatoria.php");

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - ". $e, 0);

    exit();
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    //Traer el listado de todos los registros
    try{
        $query = $connection->prepare('SELECT * FROM torneos');
        $query->execute();

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $torneo = new Torneo($row["id"], $row["id_admin"], $row["descripcion"], $row["foto"], $row["premio1"], $row["premio2"], $row["premio3"]);

            echo 
            "<div class='col-auto border-bottom row' style='text-align:justify; justify-content: space-between;'>".
                "<div>" .
                    "<p>" . $torneo->getDescripcion() .  "</p>" .
                "</div>".
                "<div>" .
                    "<form action='../../controllers/adminController.php?id=" . $torneo->getId() . "'  class='row' method='POST'> " .
                    "<input type='hidden' name='_method' value='DELETE'>" .
                    "<input type='submit' class='btn btn-danger' value='X'>" .
                    "</form>" . 
                "</div>" .
            "</div>";
            }
        }
        catch(PDOException $e){
            error_log("Error en query - ". $e, 0);

            exit();
        }

}elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["_method"] == "DELETE"){
            //Eliminar
            $id = $_GET["id"];

            try{
                $query = $connection->prepare('DELETE FROM torneos WHERE id = :id');
                $query->bindParam(':id',$id, PDO::PARAM_STR);

                $query->execute();
                if ($query->rowCount() == 0){
                    //errror
                    exit();
                }

                header("Location: http://localhost/myGameProfile/views/admin/EliminarTorneo.php"); 
            }
            catch(PDOException $e){
                error_log("Error en query - ". $e, 0);
                
                exit();
            }
        }else{
            //Error
        }
    }


?>