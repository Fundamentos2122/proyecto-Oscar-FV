<?php

    include("../models/DB.php");
    include("../models/equipo.php");


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

                $topName = "";
                $jgName = "";
                $midName = "";
                $adcName = "";
                $suppName = "";

                $query = $connection->prepare('SELECT * FROM equipos WHERE id = :id');
                $query->bindParam("id", $id, PDO::PARAM_INT);
                $query->execute();

                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    //obtiene el nombre de los jugadores del equipo
                    if($row["id_top"] !== NULL){
                        $id_user = $row["id_top"];
                        $queryTop = $connection->prepare('SELECT * FROM usuarios where id = :id_user');
                        $queryTop->bindParam(':id_user',$id_user, PDO::PARAM_STR);

                        $queryTop->execute();
                        if ($queryTop->rowCount() == 0){
                            //errror
                            exit();
                        }
                        $rowTop = $queryTop->fetch(PDO::FETCH_ASSOC);
                        $topName = $rowTop["summoner_name"];
                    }
                    if($row["id_jg"] !== NULL ){
                        $id_user = $row["id_jg"];
                        $queryJg = $connection->prepare('SELECT * FROM usuarios where id = :id_user');
                        $queryJg->bindParam(':id_user',$id_user, PDO::PARAM_STR);

                        $queryJg->execute();
                        if ($querySupp->rowCount() == 0){
                            //errror
                            exit();
                        }
                        $rowJg = $queryJg->fetch(PDO::FETCH_ASSOC);
                        $jgName = $rowJg["summoner_name"];
                    }
                    if($row["id_mid"] !== NULL){
                        $id_user = $row["id_mid"];
                        $queryMid = $connection->prepare('SELECT * FROM usuarios where id = :id_user');
                        $queryMid->bindParam(':id_user',$id_user, PDO::PARAM_STR);

                        $queryMid->execute();
                        if ($queryMid->rowCount() == 0){
                            //errror
                            exit();
                        }
                        $rowMid = $queryMid->fetch(PDO::FETCH_ASSOC);
                        $midName = $rowMid["summoner_name"];
                    }
                    if($row["id_adc"] !== NULL){
                        $id_user = $row["id_adc"];
                        $queryAdc = $connection->prepare('SELECT * FROM usuarios where id = :id_user');
                        $queryAdc->bindParam(':id_user',$id_user, PDO::PARAM_STR);

                        $queryAdc->execute();
                        if ($queryAdc->rowCount() == 0){
                            //errror
                            exit();
                        }
                        $rowAdc = $queryAdc->fetch(PDO::FETCH_ASSOC);
                        $adcName = $rowAdc["summoner_name"];
                    }
                    if($row["id_supp"] !== NULL){
                        $id_user = $row["id_supp"];
                        $querySupp = $connection->prepare('SELECT * FROM usuarios where id = :id_user');
                        $querySupp->bindParam(':id_user',$id_user, PDO::PARAM_STR);

                        $querySupp->execute();
                        if ($querySupp->rowCount() == 0){
                            //errror
                            exit();
                        }
                        $rowSupp = $querySupp->fetch(PDO::FETCH_ASSOC);
                        $suppName = $rowSupp["summoner_name"];
                    }

                    $equipo = new Equipo($row["id"], $row["nombre"], $row["username"], $row["contrasena"], $topName,  $jgName, $midName, $adcName, $suppName, $row["biografia"], $row["foto"], $row["tipoUsuario"]);

                    $equipo->returnJson();
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
                $query = $connection->prepare('SELECT * FROM alumnos');
                $query->execute();

                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    $equipo = new Equipo($row["id"], $row["nombre"], $row["username"], $row["contrasena"], $row["biografia"], $row["foto"], $row["tipoUsuario"]);

                    echo 
                        "<div class='col-3'>".
                            "<a href='alumno_detalles.php?id=" . $alumno->getId() . "'>".
                                "<img src=\"data:image/jpeg;base64,".$alumno->getFoto()."\"' class='img-fluid card'>".
                                "<p>".$alumno->getNombre()."</p>".
                            "</a>".
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
            $nombre = $_POST["nombre"];
            $username = $_POST["username"];
            $contrasena = $_POST["contrasena"];
            $tipoUsuario = 1;
            $biografia = "";
            $foto = "";

            try{
                $query = $connection->prepare('INSERT INTO equipos VALUES(NULL, :nombre, :username, :contrasena, NULL, NULL, NULL, NULL, NULL, :biografia, :foto, :tipoUsuario)');

                $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $query->bindParam(':username', $username, PDO::PARAM_STR);
                $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $query->bindParam(':biografia', $biografia, PDO::PARAM_STR);
                $query->bindParam(':foto', $foto, PDO::PARAM_STR);
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

            $biografia = $_POST["biografia"];
            $biografia = $biografia . " ";
            $topj = $_POST["top"];
            $jg = $_POST["jg"];
            $mid = $_POST["mid"];
            $adc = $_POST["adc"];
            $supp = $_POST["supp"];
            $foto = "";
            
            $update_foto = false;
            if( sizeof($_FILES) > 0 && $_FILES["foto"]["tmp_name"] !== ""){
                $tmp_name = $_FILES["foto"]["tmp_name"];
                $foto = file_get_contents($tmp_name);
                $update_foto = true;
            }

            try{

                $query_string ='UPDATE equipos SET biografia = :biografia';
                

                if($topj !== ""){
                    $queryTop = $connection->prepare('SELECT * FROM usuarios where summoner_name = :topj');
                    $queryTop->bindParam(':topj',$topj, PDO::PARAM_STR);
                    $queryTop->execute();

                    if ($queryTop->rowCount() == 0){
                    //errror
                    exit();
                    }
                    $rowTop = $queryTop->fetch(PDO::FETCH_ASSOC);
                    $idTop = $rowTop["id"];
                    $query_string = $query_string . ', id_top = :idTop ';
                }
                if($jg !== ""){
                    $queryJg = $connection->prepare('SELECT * FROM usuarios where summoner_name = :jg');
                    $queryJg->bindParam(':jg',$jg, PDO::PARAM_STR);

                    $queryJg->execute();
                    if ($queryJg->rowCount() == 0){
                        //errror
                        exit();
                    }
                    $rowJg = $queryJg->fetch(PDO::FETCH_ASSOC);
                    $idJg = $rowJg["id"];
                    $query_string = $query_string . ', id_jg = :idJg ';
                }
                if($mid !== ""){
                    $queryMid = $connection->prepare('SELECT * FROM usuarios where summoner_name = :mid');
                    $queryMid->bindParam(':mid',$mid, PDO::PARAM_STR);

                    $queryMid->execute();
                    if ($queryMid->rowCount() == 0){
                        //errror
                        exit();
                    }
                    $rowMid = $queryMid->fetch(PDO::FETCH_ASSOC);
                    $idMid = $rowMid["id"];
                    $query_string = $query_string . ', id_mid = :idMid ';

                }
                if($adc !== ""){
                    $queryAdc = $connection->prepare('SELECT * FROM usuarios where summoner_name = :adc');
                    $queryAdc->bindParam(':adc',$adc, PDO::PARAM_STR);

                    $queryAdc->execute();
                        if ($queryAdc->rowCount() == 0){
                        //errror
                        exit();
                    }
                    $rowAdc = $queryAdc->fetch(PDO::FETCH_ASSOC);
                    $idAdc = $rowAdc["id"];
                    $query_string = $query_string . ', id_adc = :idAdc ';
                }
                if($supp !== ""){
                    $querySupp = $connection->prepare('SELECT * FROM usuarios where summoner_name = :supp');
                    $querySupp->bindParam(':supp',$supp, PDO::PARAM_STR);

                    $querySupp->execute();
                    if ($querySupp->rowCount() == 0){
                        //errror
                        exit();
                    }
                    $rowSupp = $querySupp->fetch(PDO::FETCH_ASSOC);
                    $idSupp = $rowSupp["id"];
                    $query_string = $query_string . ', id_supp = :idSupp ';
                }


                if ($update_foto ===  true){
                    $query_string = $query_string . ', foto = :foto';
                }
                

                $query = $connection->prepare($query_string . ' WHERE id = :id');

                $query->bindParam(':id',$id, PDO::PARAM_STR);
                $query->bindParam(':biografia', $biografia, PDO::PARAM_STR);
                if($topj !== ""){
                    $query->bindParam(':idTop',$idTop, PDO::PARAM_INT);

                    $queryTop = $connection->prepare('UPDATE usuarios SET id_equipo = :id WHERE id=:idTop');
                    $queryTop->bindParam(':id',$id, PDO::PARAM_INT);
                    $queryTop->bindParam(':idTop',$idTop, PDO::PARAM_INT);
                    $queryTop->execute();
                }
                if($jg !== ""){
                    $query->bindParam(':idJg',$idJg, PDO::PARAM_INT);

                    $queryJg = $connection->prepare('UPDATE usuarios SET id_equipo = :id WHERE id=:idJg');
                    $queryJg->bindParam(':id',$id, PDO::PARAM_INT);
                    $queryJg->bindParam(':idJg',$idJg, PDO::PARAM_INT);
                    $queryJg->execute();
                }
                if($mid !== ""){
                    $query->bindParam(':idMid',$idMid, PDO::PARAM_INT);

                    $queryMid = $connection->prepare('UPDATE usuarios SET id_equipo = :id WHERE id=:idMid');
                    $queryMid->bindParam(':id',$id, PDO::PARAM_INT);
                    $queryMid->bindParam(':idMid',$idMid, PDO::PARAM_INT);
                    $queryMid->execute();
                }
                if($adc !== ""){
                    $query->bindParam(':idAdc',$idAdc, PDO::PARAM_INT);

                    $queryAdc = $connection->prepare('UPDATE usuarios SET id_equipo = :id WHERE id=:idAdc');
                    $queryAdc->bindParam(':id',$id, PDO::PARAM_INT);
                    $queryAdc->bindParam(':idAdc',$idAdc, PDO::PARAM_INT);
                    $queryAdc->execute();
                }
                if($supp !== ""){
                    $query->bindParam(':idSupp',$idSupp, PDO::PARAM_INT);

                    $querySupp = $connection->prepare('UPDATE usuarios SET id_equipo = :id WHERE id=:idSupp');
                    $querySupp->bindParam(':id',$id, PDO::PARAM_INT);
                    $querySupp->bindParam(':idSupp',$idSupp, PDO::PARAM_INT);
                    $querySupp->execute();
                }
                

                $query->execute();
                if ($query->rowCount() == 0){
                    //errror
                    exit();
                }

                header("Location: http://localhost/myGameProfile/views/equipo/Perfil_Equipo.php?id=" . $id);  
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