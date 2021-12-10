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
                        <p>Para registrarte envia un email a mygameprofile_conv@mgp.com</p>
                    </div>
                </div>
        
            
        </div>
    <script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
    <script>

        const descripcion = document.getElementById('descripcion');

        const id_convocatoria = ""+<?php echo $_GET["id"] ?> + "";

        getConvocatoria();

        function getConvocatoria() {
            var xhttp = new XMLHttpRequest();

            xhttp.open("GET", "../../controllers/convocatoriasController.php?id=" + id_convocatoria, false);

            xhttp.onreadystatechange = function(){
                if(this.readyState == 4){
                    //var convocatoria = JSON.parse(this.responseText);
                    console.log(this.responseText);
                    //descripcion.innerHTML = convocatoria.descripcion;
                }
            };

            xhttp.send();
        }
    </script>
</body>
</html>