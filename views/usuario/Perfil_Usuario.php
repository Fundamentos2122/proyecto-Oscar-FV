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
                    <img id="foto" class="img-fluid"style="padding-top" src="../../images/No-Image.jpg" alt="">
                </div>

                <div class="col-auto content-info" style="text-align:justify;">
                    <h6 id="nombre">Nombre Jugador</h6>
                    <h6 id="posicion">posicion</h6>
                    <textarea id="bio" style="resize:none; width:40vw; height:18vh; background-color:#FFF !important;" disabled>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, dolore? Aspernatur, vero nostrum itaque nemo nisi odio quis corrupti deleniti quaerat sed pariatur possimus blanditiis tempora reiciendis iure! Ex, officia?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae rem eos non aspernatur consectetur cum recusandae eveniet voluptatem, labore doloribus dolor reprehenderit officiis dolores qui impedit rerum consequuntur illo quibusdam.
                    </textarea>
                </div>

            </div>

            <div class="row content-info-center">
                <div class="col-3 content-info header-center">
                    <h6>Cuenta</h6>
                        <table class="table">
                            <tr>
                                <td id="cuenta"></td>
                            </tr>
                        </table>
                </div>
                <div class="col-3 content-info-center">
                    <h6>Equipo</h6>
                    <table class="table">
                        <tr>
                            <td id="equipo"></td>
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
        const cuenta = document.getElementById("cuenta");
        const equipo = document.getElementById("equipo");

        const id_usuario = ""+<?php echo $_GET["id"] ?> + "";

        getUsuario();

        function getUsuario() {
            var xhttp = new XMLHttpRequest();

            xhttp.open("GET", "../../controllers/usuariosController.php?id=" + id_usuario, false);


            xhttp.onreadystatechange = function(){
                if(this.readyState == 4){
                    var usuario = JSON.parse(this.responseText);
                    

                    nombre.innerHTML = usuario.nombre + " " + usuario.apellido;
                    bio.innerHTML = usuario.biografia;
                    posicion.innerHTML = usuario.posicion;
                    cuenta.innerHTML = usuario.summonername;
                    equipo.innerHTML = usuario.equipo;

                }
            }

            xhttp.send();

        }
    </script>
</body>
</html>