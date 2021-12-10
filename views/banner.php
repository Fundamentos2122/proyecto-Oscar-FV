<?php
 
 //Verificar si el usuario esta loggeado
    session_start();

?>
<nav class="navbar navbar-toggle">
    <div>
        <ul style="margin-top:1.5em;">
            <div class="navbar-nav">
                <li class="nav-item dropdown">
                    <button type="button" class="btn dropdown-toggle">x</button>
                        <ul class="dropdown-menu">
                            <li  class="dropdown-item">
                                <a href="../views/info/view_torneo.php">Torneos</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="../views/convocatoria/view_convocatoria.php">Convocatorias</a>
                            </li>
                        </ul>
                </li>
                <li class="nav-item">
                    <a href="../views/" class="nav-link">
                        <img style="width:4.5em; margin-left:2.5em; display:none;" src="../images/logo2.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <ul>
            <div class="navbar-nav">
                <li class="nav-item dropdown" style="margin:0; padding:0;">
                    <img  class= "dropdown-toggle" style="width:2.5em; border-radius: 50%; margin-left:5em;" src="../images/user.png" alt="">
                        <ul class="dropdown-menu" style="font-size:.76em; text-align:right;">
                        <?php 

                            if(!array_key_exists("username", $_SESSION)){
                                echo
                                '<li class="dropdown-item">
                                    <a href="../views/registro/iniciar_sesion.php">Iniciar Sesion</a>
                                </li>' . 
                                '<li class="dropdown-item">
                                    <a href="../views/registro/registro_usuario.php">Registar Usuario</a>
                                </li>' . 
                                '<li class="dropdown-item">
                                    <a href="../views/registro/registro_equipo.php">Registrar Equipo</a>
                                </li>' ;

                            }else{

                                if($_SESSION["tipoUsuario"] == 0 ){
                                    echo
                                        "<li class='dropdown-item'>" . 
                                            "<a href='../views/usuario/Perfil_Usuario.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/usuario/Actualizar_Info-usuario.php?id=" .  $_SESSION["id"] . "'> " . "Actualizar Perfil</a>" . 
                                        "</li>";
                                }else if($_SESSION["tipoUsuario"] == 1){
                                    echo 
                                        "<li class='dropdown-item'>".
                                            "<a href='../views/equipo/Perfil_Equipo.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>".
                                            "<a href='../views/equipo/Actualizar_Info-equipo.php?id=" . $_SESSION["id"] . "'>" . "Actualizar Perfil</a>" .
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/convocatoria/crear_convocatoria.php?id=" . $_SESSION["id"] . "'>" . "Crear Convocatoria</a>" . 
                                        "</li>" ;

                                }else if($_SESSION["tipoUsuario"] == 2){
                                    echo
                                        "<li class='dropdown-item'>" . 
                                            "<a href='../views/usuario/Perfil_Usuario.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/usuario/Actualizar_Info-usuario.php?id=" .  $_SESSION["id"] . "'> " . "Actualizar Perfil</a>" . 
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/info/crear_torneo.php?id=" . $_SESSION["id"] . "'>" . "Crear Torneo</a>" .
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/admin/EliminarTorneo.php'>Eliminar Torneos</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/admin/EliminarConvocatoria.php'>Eliminar Convocatorias</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/admin/AceptarConvocatoria.php'>Convocatorias Pendientes</a>" .
                                        "</li>"; ;
                                }

                                echo
                                    '<li class="dropdown-item">
                                        <a href="../controllers/cerrarSesion.php">Cerrar Sesión</a>
                                    </li> ';

                            }   
                        
                        ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
</nav>


    <nav class="navbar navbar-collapse" style="justify-content:flex-end;">
        <div>
            <ul class="navbar-nav">
                <li class="nav-item" style="margin-top:1em;">
                    <a href="../views/info/view_torneo.php" class="nav-link">
                        Torneos
                    </a>
                </li>
                <li class="nav-item" style="margin-top:1em;">
                    <a href="../views/convocatoria/view_convocatoria.php" class="nav-link">
                        Convocatorias
                    </a>
                </li>
                <li class="nav-item dropdown" style="margin:0; padding:0;">
                    <img class="dropdown-toggle" style="width:3em; margin-left:4em; border-radius: 50%;" src="../images/user.png" alt="">
                    
                    <ul class="dropdown-menu" style="font-size:.76em; text-align:right;"> 

                        <?php 

                            if(!array_key_exists("username", $_SESSION)){
                                echo
                                '<li class="dropdown-item">
                                    <a href="../views/registro/iniciar_sesion.php">Iniciar Sesion</a>
                                </li>' . 
                                '<li class="dropdown-item">
                                    <a href="../views/registro/registro_usuario.php">Registar Usuario</a>
                                </li>' . 
                                '<li class="dropdown-item">
                                    <a href="../views/registro/registro_equipo.php">Registrar Equipo</a>
                                </li>' ;

                            }else{

                                if($_SESSION["tipoUsuario"] == 0 ){
                                    echo
                                        "<li class='dropdown-item'>" . 
                                            "<a href='../views/usuario/Perfil_Usuario.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/usuario/Actualizar_Info-usuario.php?id=" .  $_SESSION["id"] . "'> " . "Actualizar Perfil</a>" . 
                                        "</li>";
                                }else if($_SESSION["tipoUsuario"] == 1){
                                    echo 
                                        "<li class='dropdown-item'>".
                                            "<a href='../views/equipo/Perfil_Equipo.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>".
                                            "<a href='../views/equipo/Actualizar_Info-equipo.php?id=" . $_SESSION["id"] . "'>" . "Actualizar Perfil</a>" .
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/convocatoria/crear_convocatoria.php?id=" . $_SESSION["id"] . "'>" . "Crear Convocatoria</a>" . 
                                        "</li>" ;

                                }else if($_SESSION["tipoUsuario"] == 2){
                                    echo
                                        "<li class='dropdown-item'>" . 
                                            "<a href='../views/usuario/Perfil_Usuario.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/usuario/Actualizar_Info-usuario.php?id=" .  $_SESSION["id"] . "'> " . "Actualizar Perfil</a>" . 
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/info/crear_torneo.php?id=" . $_SESSION["id"] . "'>" . "Crear Torneo</a>"  .
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../views/admin/EliminarTorneo.php'>Eliminar Torneos</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                        "<a href='../views/admin/EliminarConvocatoria.php'>Eliminar Convocatorias</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                        "<a href='../views/admin/AceptarConvocatoria.php'>Convocatorias Pendientes</a>" .
                                        "</li>";
                                }

                                echo
                                    '<li class="dropdown-item">
                                        <a href="../controllers/cerrarSesion.php">Cerrar Sesión</a>
                                    </li> ';

                            }   
                        
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>