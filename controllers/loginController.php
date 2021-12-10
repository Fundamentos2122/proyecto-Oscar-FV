<?php

include '../models/DB.php';
include '../models/usuario.php';
include '../models/equipo.php';

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - ". $e, 0);

    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST['_method'] == "POST"){
        //login
        
        $username = $_POST["username"];
        $contrasena = $_POST["contrasena"];
        
        try{
            $query = $connection->prepare('SELECT * FROM usuarios WHERE username = :username AND contrasena = :contrasena');

            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

            $query->execute();
            if($query->rowCount() > 0){
                //Se encontro al usuario en la tabla usuarios
                $usuario;
                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    $usuario = new Usuario($row["id"], $row["nombre"], $row["apellido"], $row["username"], "", $row["contrasena"], $row["posicion"], $row["id_equipo"], "", "", $row["tipoUsuario"]);
                }
            }else{

                $topName = "";
                $jgName = "";
                $midName = "";
                $adcName = "";
                $suppName = "";

                $query = $connection->prepare('SELECT * FROM equipos WHERE username = :username AND contrasena = :contrasena');

                $query->bindParam(':username', $username, PDO::PARAM_STR);
                $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

                $query->execute();

                if($query->rowCount() == 0){
                    //No se encontro en ninguna tabla
                    exit();
                }

                $usuario;
                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    $usuario = new Equipo($row["id"], $row["nombre"], $row["username"], $row["contrasena"], $row["id_top"],  $row["id_jg"], $row["id_mid"], $row["id_adc"], $row["id_supp"], $row["biografia"], $row["foto"], $row["tipoUsuario"]);
                }

            }

            session_start();
            $_SESSION["id"] = $usuario->getID();
            $_SESSION["username"] = $usuario->getUsername();
            $_SESSION["tipoUsuario"] = $usuario->getTipoUsuario();

            header("Location: http://localhost/myGameProfile/views/");
        }
        catch(PDOException $e){
            error_log("ERROR en query - " . $e, 0);
            exit();
        }
    }
}

?>