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
    //Leer
    
    if(array_key_exists("id", $_GET)){
        //Traer la informacion de un elemento
        $id = $_GET["id"];

        try{
            $query = $connection->prepare('SELECT * FROM convocatoria WHERE id = :id');
            $query->bindParam("id", $id, PDO::PARAM_INT);
            $query->execute();

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $convocatoria = new Convocatoria($row["id"], $row["idEquipo"], $row["descripcion"], $row["status"]);


                $convocatoria->returnJson();
            }

            exit();
            
        }
        catch(PDOException $e){
            error_log("Error en query - ". $e, 0);

            exit();
        }
    }
    else{
        //Traer el listado de todos los registros
        try{
            $query = $connection->prepare('SELECT * FROM convocatorias WHERE status = 1');
            $query->execute();

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $convocatoria = new Convocatoria($row["id"], $row["idEquipo"], $row["descripcion"], $row["status"]);

                echo 
                "<div class='row'>" .
                    "<div class='col-3 content-info'>" . 
                        "<img class = 'img-fluid' src='../../images/No-Image.jpg' alt=''>" .
                    "</div>" .
                    "<div class='col-9 content-info'>" . 
                        "<p>" . $convocatoria->getDescripcion() .
                        "</p>" .
                        "<a href='../info/info-torneo.php?id=" . $convocatoria->getID() . "'> Ver más...</a>" .
                    "</div>" .
                "</div>";
            }
        }
        catch(PDOException $e){
            error_log("Error en query - ". $e, 0);

            exit();
        }
    }
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["_method"] == "POST"){
        //Guardar

        $id = $_GET["id"];

        $descripcion = $_POST["descripcion"];
        $statusC = 0;

        if( sizeof($_FILES) > 0){
            $tmp_name = $_FILES["foto"]["tmp_name"];
            $foto = file_get_contents($tmp_name);
        }

        try{
            $query = $connection->prepare('INSERT INTO convocatorias VALUES(NULL,  :id, :descripcion, 0)');

            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);

            $query->execute();
            if ($query->rowCount() == 0){
                //errror
                exit();
            }

            header("Location: http://localhost/myGameProfile/views/");    
        }
        catch(PDOException $e){
            error_log("Error en query - ". $e, 0);

            exit();
        }
        
    }else if($_POST["_method"] == "PUT"){

        //Actualizar

        $id = $_GET["id"];

        $cve_unica = $_POST["cve_unica"];
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha_nacimiento"];
        $foto = "";
        
        $update_foto = false;

        if( sizeof($_FILES) > 0 && $_FILES["foto"]["tmp_name"] !== ""){
            $tmp_name = $_FILES["foto"]["tmp_name"];
            $foto = file_get_contents($tmp_name);
            $update_foto = true;
        }

        try{
            $query_string ='UPDATE alumnos SET cve_unica = :cve_unica, nombre_completo = :nombre, fecha_nacimiento = :fecha';

            if ($update_foto ===  true){
                $query_string = $query_string . ', foto = :foto';
            }
            
            // var_dump($query_string);

            $query = $connection->prepare($query_string . ' WHERE id = :id');

            $query->bindParam(':id',$id, PDO::PARAM_STR);
            $query->bindParam(':cve_unica', $cve_unica, PDO::PARAM_STR);
            $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);

            if ($update_foto ===  true){
                $query->bindParam(':foto', $foto, PDO::PARAM_STR);
            }

            $query->execute();
            if ($query->rowCount() == 0){
                //errror
                exit();
            }

            header("Location: http://localhost/PRACTICAPHP-OSCAR-FV/views/");  
        }
        catch(PDOException $e){
            error_log("Error en query - ". $e, 0);

            exit();
        }

    }else if($_POST["_method"] == "DELETE"){
        //Eliminar
        $id = $_GET["id"];

        try{
            $query = $connection->prepare('DELETE FROM alumnos WHERE id = :id');
            $query->bindParam(':id',$id, PDO::PARAM_STR);

            $query->execute();
            if ($query->rowCount() == 0){
                //errror
                exit();
            }

            header("Location: http://localhost/PRACTICAPHP-OSCAR-FV/views/"); 
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