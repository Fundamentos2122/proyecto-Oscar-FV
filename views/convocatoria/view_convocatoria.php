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
            <?php include("../../controllers/convocatoriasController2.php") ?>
        </div> 
    </div>
    <script src="https://fundamentos2122.github.io/framework-css-Oscar-FV/js/app.js"></script>
</body>
</html>