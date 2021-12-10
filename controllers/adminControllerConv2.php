<?php

include("../models/DB.php");
include("../models/convocatoria.php");


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
        $query = $connection->prepare('SELECT * FROM convocatoria WHERE status = 1');
        $query->execute();

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $convocatoria = new Convocatoria($row["id"], $row["idEquipo"], $row["descripcion"], $row["status"]);

            echo 
            "<div class='col-auto border-bottom row' style='text-align:justify; justify-content: space-between;'>".
                "<div>" .
                    "<p>" . $convocatoria->getDescripcion() .  "</p>" .
                "</div>".
                "<div>" .
                    "<form action='../../controllers/adminControllerConv2.php?id=" . $convocatoria->getId() . "'  class='row' method='POST'> " .
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
                $query = $connection->prepare('DELETE FROM convocatorias WHERE id = :id');
                $query->bindParam(':id',$id, PDO::PARAM_STR);

                $query->execute();
                if ($query->rowCount() == 0){
                    //errror
                    exit();
                }

                header("Location: http://localhost/myGameProfile/views/admin/EliminarConvocatoria.php"); 
            }
            catch(PDOException $e){
                error_log("Error en query - ". $e, 0);
                
                exit();
            }
        }else if($_POST["_method"] == "PUT"){
            //cambiar el status
            $id = $_GET["id"];

            try{
                $query = $connection->prepare('UPDATE convocatorias SET status = 1 WHERE id = :id');
                $query->bindParam(':id',$id, PDO::PARAM_STR);

                $query->execute();
                if ($query->rowCount() == 0){
                    //errror
                    exit();
                }

                header("Location: http://localhost/myGameProfile/views/admin/AceptarConvocatoria.php"); 
            }
            catch(PDOException $e){
                error_log("Error en query - ". $e, 0);
                
                exit();
            }
        
    }
}


?>