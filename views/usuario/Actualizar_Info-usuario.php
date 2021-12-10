<?php

    session_start();
    if(!array_key_exists("username", $_SESSION)){
        header("Location: http://localhost/myGameProfile/views/");
    }else{
        if($_SESSION["tipoUsuario"] !== 0){
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
</head>
<body class="container">
    <?php include("../banner_2.php")  ?>
    
    <form action="../../controllers/usuariosController.php" enctype="multipart/form-data" method="POST" id="formPut">
        <input type="hidden" name="_method" value="PUT">
        <div class="row-inverse">
            <div class="col-auto content-info">
                <div class="row">
                    <div class ="col-4">
                        <img id="img" src="../../images/No-Image.jpg" class="img-fluid" alt="">
                    </div>
                    <div class ="col-4">
                        <input type="file" name="foto">
                    </div>
                </div>
            </div>
            <div class="col-7">
                <h6 style="text-align:left" class="content-info-center">Acerca de ti...</h6>
            </div>
            <div class="col-auto">
                <div class="row">
                    <div class="col-auto">
                        <textarea name="biografia" id="bio" style="resize:none; width:40vw; height:25vh;">
                        </textarea>
                    </div>

                    <div class="col-auto row-inverse" >
                        <table class="table">
                            <tr>
                                <th>Cuenta</th>
                            </tr>
                            <tr>
                                <td><input name="summonername" id="cuenta" type="text"></td>
                            </tr>
                            
                        </table>

                        <div style="justify-content:flex-end;">
                            <input type="submit" class="btn btn-warning" value="Guardar">
                        </div>

                    
                    </div>

                </div>
            
            </form>
        </div>
    <script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
    <script>

        const formPut = document.getElementById("formPut");
        const foto = document.getElementById("img");
        const bio = document.getElementById("bio");
        const cuenta = document.getElementById("cuenta");

        const id_usuario = ""+<?php echo $_GET["id"] ?>+"";

        console.log(id_usuario);

        getUsuario();

        function getUsuario() {
            var xhttp = new XMLHttpRequest();

            xhttp.open("GET", "../../controllers/usuariosController.php?id=" + id_usuario, false);

            xhttp.onreadystatechange = function(){
                if(this.readyState == 4){
                    var usuario = JSON.parse(this.responseText);

                    console.log(this.responseText);

                    formPut.action += "?id=" + usuario.id;
                    
                    // bio.innerHTML = usuario.biografia;
                    // cuenta.value = usuario.summonername;


                    
                }
            };

            xhttp.send();
        }
    </script>
</body>
</html>