<?php

    include("../models/DB.php");
    include("../models/usuario.php");


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
                $query = $connection->prepare('SELECT * FROM usuarios WHERE id = :id');
                $query->bindParam("id", $id, PDO::PARAM_INT);
                $query->execute();

                while($row = $query->fetch(PDO::FETCH_ASSOC)){

                    $teamName = "";

                    if($row["id_equipo"] !== NULL){
                        $id_equipo = $row["id_equipo"];
                        $queryEquipo = $connection->prepare('SELECT * FROM equipos where id = :id_equipo');
                        $queryEquipo->bindParam(':id_equipo',$id_equipo, PDO::PARAM_INT);

                        $queryEquipo->execute();
                        if ($queryEquipo->rowCount() == 0){
                            //errror
                            exit();
                        }
                        $rowEquipo = $queryEquipo->fetch(PDO::FETCH_ASSOC);
                        $teamName = $rowEquipo["nombre"];
                    }

                    $usuario = new Usuario($row["id"], $row["nombre"], $row["apellido"], $row["username"], $row["summoner_name"], $row["contrasena"], $row["posicion"], $teamName, $row["biografia"], $row["foto"], $row["tipoUsuario"]);

                    $usuario->returnJson();

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
                $query = $connection->prepare('SELECT * FROM usuarios');
                $query->execute();

                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    $usuario = new Usuario($row["id"], $row["nombre"], $row["apellido"], $row["username"], $row["summoner_name"], $row["contrasena"], $row["posicion"], $row["id_equipo"], $row["biografia"], $row["foto"], $row["tipoUsuario"]);

                    // echo 
                    //     "<div class='col-3'>".
                    //         "<a href='alumno_detalles.php?id=" . $alumno->getId() . "'>".
                    //             "<img src=\"data:image/jpeg;base64,".$alumno->getFoto()."\"' class='img-fluid card'>".
                    //             "<p>".$alumno->getNombre()."</p>".
                    //         "</a>".
                    //    "</div>";
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
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $username = $_POST["username"];
            $summonername = "";
            $posicion = $_POST["posicion"];
            $contrasena = $_POST["contrasena"];
            $tipoUsuario = 0;
            $biografia = "";
            $foto = "";

            try{
                $query = $connection->prepare('INSERT INTO usuarios VALUES(NULL, :nombre, :apellido, :username, NULL, :contrasena, :posicion, NULL, NULL, NULL, :tipoUsuario)');

                $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $query->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $query->bindParam(':username', $username, PDO::PARAM_STR);
                $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $query->bindParam(':posicion', $posicion, PDO::PARAM_STR);
                $query->bindParam(':tipoUsuario', $tipoUsuario, PDO::PARAM_INT);

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

            $summonername = $_POST["summonername"];
            $biografia = $_POST["biografia"];
            $foto = "";
            
            $update_foto = false;
            if( sizeof($_FILES) > 0 && $_FILES["foto"]["tmp_name"] !== ""){
                $tmp_name = $_FILES["foto"]["tmp_name"];
                $foto = file_get_contents($tmp_name);
                $update_foto = true;
            }

            try{
                $query_string ='UPDATE usuarios SET summoner_name = :summonername, biografia = :biografia';

                if ($update_foto ===  true){
                    $query_string = $query_string . ', foto = :foto';
                }
                

                $query = $connection->prepare($query_string . ' WHERE id = :id');

                $query->bindParam(':id',$id, PDO::PARAM_STR);
                $query->bindParam(':summonername', $summonername, PDO::PARAM_STR);
                $query->bindParam(':biografia', $biografia, PDO::PARAM_STR);

                if ($update_foto ===  true){
                    $query->bindParam(':foto', $foto, PDO::PARAM_STR);
                }

                $query->execute();
                if ($query->rowCount() == 0){
                    //errror
                    exit();
                }

                header("Location: http://localhost/myGameProfile/views/usuario/Perfil_Usuario.php?id=" . $id);  
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