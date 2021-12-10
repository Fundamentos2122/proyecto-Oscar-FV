<?php

    session_start();
    
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


    <div class="row-inverse">
        <div class="col-auto">
            <div class="row content-info-center">

            <div class="col-4 content-info">
                    <img id="img" src="../../images/No-Image.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-auto content-info" style="text-align:justify;">
                    <h6 id="nombre">Nombre Equipo</h6>
                        <textarea name="biografia" id="bio" style="resize:none; width:40vw; height:25vh; background-color:#FFF !important;" disabled>
                        </textarea>
                </div>
            </div>

            <div class="row content-info-center">
                <div class="col-6 content-info-center">
                    <h6>Jugadores</h6>
                    <table id="jugadores" class="table">
                        <tr>
                            <th>Posicion</th>
                            <th>Jugador</th>
                        </tr>
                        <tr>
                            <td>Top</td>
                            <td id="top"></td>
                        </tr>
                        <tr>
                            <td>Jungla</td>
                            <td id="jg"></td>
                        </tr>
                        <tr>
                            <td>Mid</td>
                            <td id="mid"></td>
                        </tr>
                        <tr>
                            <td>ADC</td>
                            <td id="adc"></td>
                        </tr>
                        <tr>
                            <td>Soporte</td>
                            <td id="supp"></td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
    <script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
    <script>

        const foto = document.getElementById("foto");
        const nombre = document.getElementById("nombre");
        const bio = document.getElementById("bio");
        const equipo = document.getElementById("equipo");
        const topJ = document.getElementById("top");
        const jg = document.getElementById("jg");
        const mid = document.getElementById("mid");
        const adc = document.getElementById("adc");
        const supp = document.getElementById("supp");

        const id_usuario = ""+<?php echo $_GET["id"] ?> + "";

        getUsuario();

        function getUsuario() {
            var xhttp = new XMLHttpRequest();

            xhttp.open("GET", "../../controllers/equiposController.php?id=" + id_usuario, false);

            xhttp.onreadystatechange = function(){
                if(this.readyState == 4){
                    var usuario = JSON.parse(this.responseText);

                    nombre.innerHTML = usuario.nombre;
                    bio.innerHTML = usuario.biografia;
                    top.innerHTML = usuario.top;
                    jg.innerHTML = usuario.jg;
                    mid.innerHTML = usuario.mid;
                    adc.innerHTML = usuario.adc;
                    supp.innerHTML = usuario.supp;
                    

                }
            };

            xhttp.send();
        }
    </script>
</body>
</html>