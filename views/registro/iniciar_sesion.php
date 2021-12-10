<?php

session_start();
    if(array_key_exists("username", $_SESSION)){
        header("Location: localhost/MyGameProfile/viewvs/");
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
        <img class="img-fluid session" src="images/logo.png" alt="">
    </div>

    <div class="row-inverse session">

            <div class="col-2">
                <a href="index.html"><img class = "img-fluid " src="../../images/logo.png" alt=""></a>
            </div>

            <div class="col-6">
                <form class="session-form" action="../../controllers/loginController.php" method="POST">

                <input type="hidden" name="_method" value="POST">
                    <div class="col-6">
                        <input type="text" name="username" placeholder="Usuario">
                        <input type="password" name="contrasena" placeholder="Contraseña">
                    </div>

                    <div class="col-auto">
                        <input type="submit" class="btn btn-warning" value="Iniciar Sesion">
                    </div>
                </form>
            </div>


    </div>

    <div class="row session-row">
        <div class="col-auto">
            <button class="btn btn-warning">Registrarse</button>
        </div>
        <div class="col-auto">
            <button class="btn btn-warning">Registrar Equipo</button>
        </div>
    </div>

<script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
</body>
</html>