<?php
    //logout
    session_start();

    session_destroy();
    header("Location:http://localhost/myGameProfile/views/");

    exit();

?>