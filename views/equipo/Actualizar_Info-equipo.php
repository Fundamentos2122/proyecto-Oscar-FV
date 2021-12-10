<?php

    session_start();
    if(!array_key_exists("username", $_SESSION)){
        header("Location: http://localhost/myGameProfile/views/");
    }else{
        if($_SESSION["tipoUsuario"] !== 1){
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
    <?php include("../banner_2.php")?>

    <form action="../../controllers/equiposController.php" enctype="multipart/form-data" method="POST" id="formPut">
        <input type="hidden" name="_method" value="PUT">
        <div class="row-inverse">
            <div class="col-auto content-info">
                <div class="row">
                    <div class ="col-4">
                        <img id="img" src="../../images/No-Image.jpg" class="img-fluid" alt="">
                        <input id="foto" type="file" style="padding-top:2em;">
                    </div>
                    <div class="col-auto">
                        <h6 style="text-align:left" class="content-info-center">Acerca del equipo...</h6>
                        <textarea name="biografia" id="bio" style="resize:none; width:40vw; height:40vh;"></textarea>
                    </div>
                </div>
            </div>
            <div class="row content-info-center" style="padding-top:3em;">
                <div class="col-auto">
                    <div>
                        <h6 style="text-align: left">Jugadores:</h6>
                    </div>
                    <div class="col-auto">
                        <table class="table">
                            <tr>
                                <th>Posicion</th>
                                <th>Jugador</th>
                            </tr>
                            <tr>
                                <td>Top</td>
                                <td><input name="top" id="top" type="text"></td>
                            </tr>
                            <tr>
                                <td>Jungla</td>
                                <td><input name="jg" id="jg" type="text"></td>
                            </tr>
                            <tr>
                                <td>Mid</td>
                                <td><input name="mid" id="mid" type="text"></td>
                            </tr>
                            <tr>
                                <td>ADC</td>
                                <td><input  name="adc" id="adc"  type="text"></td>
                            </tr>
                            <tr>
                                <td>Soporte</td>
                                <td><input name="supp" id="supp" type="text"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-auto" style="padding-top:12em; padding-left:10em;">
                    <input type="submit" class="btn btn-warning" value="Guardar">
                </div>
            </div>
        </div>
    </form>
    <script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
    <script>

        const formPut = document.getElementById("formPut");
        const foto = document.getElementById("img");
        const bio = document.getElementById("bio");
        const topJ = document.getElementById("top");
        const jg = document.getElementById("jg");
        const mid = document.getElementById("mid");
        const adc = document.getElementById("adc");
        const supp = document.getElementById("supp");

        const id_equipo = ""+<?php echo $_GET["id"] ?> + "";

        getEquipo();

        function getEquipo() {
            var xhttp = new XMLHttpRequest();

            xhttp.open("GET", "../../controllers/equiposController.php?id=" + id_equipo, false);

            xhttp.onreadystatechange = function(){
                if(this.readyState == 4){
                    var equipo = JSON.parse(this.responseText);
                    console.log(equipo);

                    formPut.action += "?id=" + equipo.id;
                    
                    bio.innerHTML = equipo.biografia;
                    topJ.value = equipo.top;
                    jg.value = equipo.jg;
                    mid.value = equipo.mid;
                    adc.value = equipo.adc;
                    supp.value = equipo.supp;
        

                    
                }
            };

            xhttp.send();
        }
    </script>
</body>
</html>