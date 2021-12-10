<?php

    session_start();

    if(!array_key_exists("username", $_SESSION)){
        header("Location: http://localhost/myGameProfile/views/");
    }else{
        if($_SESSION["tipoUsuario"] !== 2){
            header("Location: http://localhost/myGameProfile/views/");
        }
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
    <?php include("../banner_2.php")  ?>


            <div class="row content-info-center" style="padding-top:5em;">
                <div class="col-6 ">
                    <div></div>
                    <h6>Convocatorias Pendientes</h6>
                    <div class="col-auto border" style="overflow:auto; height:500px;">
                        <?php 
                            include("../../controllers/adminControllerAceptar.php")
                        ?>
                    </div>
                </div>
            </div>
            

    <script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
</body>
</html>