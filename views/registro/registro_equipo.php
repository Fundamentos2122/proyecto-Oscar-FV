<?php

session_start();
    if(array_key_exists("username", $_SESSION)){
        exit();
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fundamentos2122.github.io/framework-css-Oscar-FV/css/framework.css">
    <title>Document</title>
</head>
<body class="container">
    <div class="col-4">
        <a href="../"><img class = "img-fluid" src="../../images/logo.png" alt=""></a>
    </div>


    <div class="row-inverse session-register">

        <form action="../../controllers/equiposController.php" method="POST">

            <input type="hidden" name="_method" value="POST">

            <div class="col-auto">
                <label for="nombre">Nombre Del Equipo</label>
            </div>
            <div class="col-auto">
                <input type="text" name="nombre" id="">
            </div>
            
            <div class="col-auto">
                <label for="username">Usuario</label>
            </div>
            <div class="col-auto">
                <input type="text" name="username" id="">
            </div>
    
             <div class="col-auto">
                <label for="contrasena">Contraseña</label>
                <input class="input-margin" type="password" name="contrasena" id="">
            </div>

            <div class="col-auto">
                <label for="ConfContrasena">Confirmar Contraseña</label>
                <input class="input-margin" type="password" name="ConfContrasena" id="">
            </div>

            <div class="col-auto">
                <input type="submit" class="btn btn-warning" value="Registrarse">
             </div>
            
        </form>

    </div>

<script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
</body>
</html>