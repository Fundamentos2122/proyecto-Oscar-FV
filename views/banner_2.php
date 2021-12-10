<nav class="navbar navbar-toggle">
        <ul class="navbar-nav" style="margin-top:1.5em;">
            <li class="nav-item dropdown">
                <button type="button" class="btn dropdown-toggle">x</button>
                    <ul class="dropdown-menu">
                        <li  class="dropdown-item">
                            <a href="../info/view_torneo.php">Torneos</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="../convocatoria/view_convocatoria.php">Convocatorias</a>
                        </li>
                    </ul>
            </li>
            <li class="nav-item">
                <a href="../" class="nav-link">
                    <img style="width:4.5em; margin-left:2.5em;"  src="../../images/logo2.png" alt="">
                </a>
            </li>
        </ul>
        <ul>
            <div class="navbar-nav">
                <li class="nav-item dropdown" style="margin:0; padding:0;">
                    
                    <img  class= "dropdown-toggle" style="width:2.5em; border-radius: 50%; margin-left:5em;" src="../../images/user.png" alt="">
                    
                        <ul class="dropdown-menu" style="font-size:.76em; text-align:right;">
                        <?php 

                            if(!array_key_exists("username", $_SESSION)){
                                echo
                                '<li class="dropdown-item">
                                    <a href="../registro/iniciar_sesion.php">Iniciar Sesion</a>
                                </li>' . 
                                '<li class="dropdown-item">
                                    <a href="../registro/registro_usuario.php">Registar Usuario</a>
                                </li>' . 
                                '<li class="dropdown-item">
                                    <a href="../registro/registro_equipo.php">Registrar Equipo</a>
                                </li>' ;

                            }else{

                                if($_SESSION["tipoUsuario"] == 0 ){
                                    echo
                                        "<li class='dropdown-item'>" . 
                                            "<a href='../usuario/Perfil_Usuario.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../usuario/Actualizar_Info-usuario.php?id=" .  $_SESSION["id"] . "'> " . "Actualizar Perfil</a>" . 
                                        "</li>";
                                }else if($_SESSION["tipoUsuario"] == 1){
                                    echo 
                                        "<li class='dropdown-item'>".
                                            "<a href='../equipo/Perfil_Equipo.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>".
                                            "<a href='../equipo/Actualizar_Info-equipo.php?id=" . $_SESSION["id"] . "'>" . "Actualizar Perfil</a>" .
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../plantillas/crear_evento.php'>Crear Convocatoria</a>" . 
                                        "</li>" ;

                                }else if($_SESSION["tipoUsuario"] == 2){
                                    echo
                                        "<li class='dropdown-item'>" . 
                                            "<a href='../usuario/Perfil_Usuario.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../usuario/Actualizar_Info-usuario.php?id=" .  $_SESSION["id"] . "'> " . "Actualizar Perfil</a>" . 
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../plantillas/crear_torneo.php?id=" . $_SESSION["id"] . "'>" . "Crear Torneo</a>" .
                                        "</li>" .  
                                        "<li class='dropdown-item'>" .
                                            "<a href='../admin/EliminarTorneo.php'>Eliminar Torneos</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../admin/EliminarConvocatoria.php'>Eliminar Convocatoria</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../admin/AceptarConvocatoria.php'>Convocatoria Pendiente</a>" .
                                        "</li>" ;
                                }

                                echo
                                    '<li class="dropdown-item">
                                        <a href="../../controllers/cerrarSesion.php">Cerrar Sesión</a>
                                    </li> ';

                            }   
                        
                        ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </ul>
    </nav>

    <nav class="navbar navbar-collapse" style="justify-content:flex-end;">
        <div class="row">
            <div>
            <a href="../../views/" class="nav-link">
                        <img style="width:4.5em; margin-left:2.5em;" src="../../images/logo2.png" alt="">
            </a>
            </div>
            
            <ul class="navbar-nav">
                <li class="nav-item" style="margin-top:1em;">
                    <a href="../info/view_torneo.php" class="nav-link">
                        Torneos
                    </a>
                </li>
                <li class="nav-item" style="margin-top:1em;">
                    <a href="../convocatoria/view_convocatoria.php" class="nav-link">
                        Convocatorias
                    </a>
                </li>
                <li class="nav-item dropdown" style="margin:0; padding:0;">
                    <img class="dropdown-toggle" style="width:3em; margin-left:4em; border-radius: 50%;" src="../../images/user.png" alt="">
                    
                    <ul class="dropdown-menu" style="font-size:.76em; text-align:right;"> 
                    <?php 

                            if(!array_key_exists("username", $_SESSION)){
                                echo
                                '<li class="dropdown-item">
                                    <a href="../registro/iniciar_sesion.php">Iniciar Sesion</a>
                                </li>' . 
                                '<li class="dropdown-item">
                                    <a href="../registro/registro_usuario.php">Registar Usuario</a>
                                </li>' . 
                                '<li class="dropdown-item">
                                    <a href="../registro/registro_equipo.php">Registrar Equipo</a>
                                </li>' ;

                            }else{

                                if($_SESSION["tipoUsuario"] == 0 ){
                                    echo
                                        "<li class='dropdown-item'>" . 
                                            "<a href='../usuario/Perfil_Usuario.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../usuario/Actualizar_Info-usuario.php?id=" .  $_SESSION["id"] . "'> " . "Actualizar Perfil</a>" . 
                                        "</li>";
                                }else if($_SESSION["tipoUsuario"] == 1){
                                    echo 
                                        "<li class='dropdown-item'>".
                                            "<a href='../equipo/Perfil_Equipo.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>".
                                            "<a href='../equipo/Actualizar_Info-equipo.php?id=" . $_SESSION["id"] . "'>" . "Actualizar Perfil</a>" .
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../convocatoria/crear_convocatoria.php?id=" . $_SESSION["id"] . "'>" . "Crear Convocatoria</a>" . 
                                        "</li>" ;

                                }else if($_SESSION["tipoUsuario"] == 2){
                                    echo
                                        "<li class='dropdown-item'>" . 
                                            "<a href='../usuario/Perfil_Usuario.php?id=" . $_SESSION["id"] . "'>" . "Perfil</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../usuario/Actualizar_Info-usuario.php?id=" .  $_SESSION["id"] . "'> " . "Actualizar Perfil</a>" . 
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../info/crear_torneo.php?id=" . $_SESSION["id"] . "'>" . "Crear Torneo</a>" .
                                        "</li>" . 
                                        "<li class='dropdown-item'>" .
                                            "<a href='../admin/EliminarTorneo.php'>Eliminar Torneos</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../admin/EliminarConvocatoria.php'>Eliminar Convocatoria</a>" .
                                        "</li>" .
                                        "<li class='dropdown-item'>" .
                                            "<a href='../admin/AceptarConvocatoria.php'>Convocatoria Pendiente</a>" .
                                        "</li>" ;
                                }

                                echo
                                    '<li class="dropdown-item">
                                        <a href="../../controllers/cerrarSesion.php">Cerrar Sesión</a>
                                    </li> ';

                            }   
                        
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>