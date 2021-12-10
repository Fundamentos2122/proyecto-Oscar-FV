<?php

    session_start();
    if(!array_key_exists("username", $_SESSION)){
        exit();
    }else{
        if($_SESSION["tipoUsuario"] == 0){
            exit();
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
    <form action="../../controllers/torneosController2.php" method="POST" id="formPut">
        <input type="hidden" name="_method" value="POST">    
        <div class="col-auto ">
            <div class="row content-info-center" style="padding-top:2em;">
                <div class ="col-4">
                    <img id="img" src="../../images/No-Image.jpg" class="img-fluid" alt="">
                    <input id="foto" name="foto" type="file" style="padding-top:2em;">
                </div>
                <div class="col-auto">
                    <h6 style="text-align:left" class="content-info-center">Acerca del torneo...</h6>
                    <textarea name="descripcion" id="descripcion" style="resize:none; width:40vw; height:40vh;"></textarea>
                </div>
            </div>
        </div>
        <div class="row content-info-center" style="padding-top:3em;">
            <div class="col-5">
                <div class="col-auto content-info-center">
                    <h6 style="text-align: left">Premios:</h6>
                </div>
                <table class="table">
                    <tr>
                        <th>Posición</th>
                        <th>Premio</th>
                    </tr>
                    <tr>
                        <td>Primer Lugar</td>
                        <td><input name="p1" type="text"></td>
                    </tr>
                    <tr>
                        <td>Segundo Lugar</td>
                        <td><input name="p2" type="text"></td>
                    </tr>
                    <tr>
                        <td>Tercer Lugar</td>
                        <td><input name="p3" type="text"></td>
                    </tr>
                </table>
            </div>
            <div class="col-auto" style="padding-top:12em; padding-left:10em;">
                    <input type="submit" class="btn btn-warning" value="Enviar">
            </div>
        </div>
    </form>
    <script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
    <script>

        const formPut = document.getElementById("formPut");

        const id_admin = ""+<?php echo $_GET["id"] ?> + "";

        getEquipo();

        function getEquipo() {
            var xhttp = new XMLHttpRequest();

            xhttp.open("GET", "../../controllers/usuariosController.php?id=" + id_admin, false);

            xhttp.onreadystatechange = function(){
                if(this.readyState == 4){

                    formPut.action += "?id=" + id_admin;
                }
            };

            xhttp.send();
        }
    </script>
</body>
</html>