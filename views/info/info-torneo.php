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
    <?php include("../banner_2.php");  ?>
        <div class="row-inverse">
            <div class="col-auto">
                <div class="row content-info-center" style="text-align:justify;">

                    <div class="col-3 content-info">
                        <img id="foto" class = "img-fluid" src="../../images/No-Image.jpg" alt="">
                    </div>

                    <div class="col-7 content-info">
                        <p id="descripcion"></p>
                        <table class="table">
                        <tr>
                            <th>Posición</th>
                            <th>Premio</th>
                        </tr>
                        <tr>
                            <td>Primer Lugar</td>
                            <td id="p1"></td>
                        </tr>
                        <tr>
                            <td>Segundo Lugar</td>
                            <td id="p2"></td>
                        </tr>
                        <tr>
                            <td>Tercer Lugar</td>
                            <td id="p3"></td>
                        </tr>
                    </table>
                        <p>Para registrar a tu equipo envia un email a mygameprofile@mgp.com</p>
                    </div>
                </div>
        
            
        </div>
    <script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
    <script>

        const foto = document.getElementById('foto');
        const descripcion = document.getElementById('descripcion');
        const p1 = document.getElementById('p1');
        const p2 = document.getElementById('p2');
        const p3 = document.getElementById('p3');

        const id_torneo = ""+<?php echo $_GET["id"] ?> + "";

        getTorneo();

        function getTorneo() {
            var xhttp = new XMLHttpRequest();

            xhttp.open("GET", "../../controllers/torneosController2.php?id=" + id_torneo, false);

            xhttp.onreadystatechange = function(){
                if(this.readyState == 4){
                    var torneo = JSON.parse(this.responseText);
                    
                    descripcion.innerHTML = torneo.descripcion;
                    p1.innerHTML = torneo.premio1;
                    p2.innerHTML = torneo.premio2;
                    p3.innerHTML = torneo.premio3;
                }
            };

            xhttp.send();
        }
    </script>
</body>
</html>