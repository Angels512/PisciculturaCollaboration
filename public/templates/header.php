<?php

    // Aseguramos de que la persona tenga una sesion iniciada
    require_once("../../config/conexion.php");
    if (isset($_SESSION["id_usu"]))
    {
    ?>

        <style>
            @media (max-width: 560px){.nombreSession,.rolSession{display: none;}} @media (max-width: 1920) and (min-width: 300px){.profileCard{width: 100%!important;}} @media (max-width: 1056px) and (min-width: 300px){.side-menu{left: -250px;}}
        </style>

        <header class="site-header">
            <div class="container-fluid">

                <a href="inicio" class="site-logo">
                    <img class="hidden-md-down" src="public/img/logo2.png" alt="logo">
                    <!-- <img class="hidden-lg-up" src="../../public/img/logo-2-mob.png" alt=""> -->
                </a>

                <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                    <span>toggle menu</span>
                </button>

                <button class="hamburger hamburger--htla">
                    <span>toggle menu</span>
                </button>

                <div class="mobile-menu-right-overlay"></div>
                <div class="site-header-content">
                    <div class="site-header-content-in">
                        <div class="site-header-shown">
                            <div class="dropdown user-menu">
                                <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="public/img/<?php echo $_SESSION["id_rol"];?>.jpg" alt="">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                    <a class="dropdown-item" href="perfil"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesión</a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown dropdown-typical">
                            <a href="inicio" class="dropdown-toggle no-arr">
                                <span class="font-icon font-icon-home"></span>
                            </a>
                        </div>

                        <!-- Aqui guardamos el ID del usuario que inicio sesion igual que con el nombre -->
                        <input type="hidden" id="id_usu_x" value="<?php echo $_SESSION["id_usu"]; ?>">
                        <!-- Aqui guardamos el ROL del usuario que inicio sesion igual que con el nombre -->
                        <input type="hidden" id="id_rol_x" value="<?php echo $_SESSION["id_rol"]; ?>">

                        <div class="dropdown dropdown-typical">
                            <a href="perfil" class="dropdown-toggle no-arr">
                                <!-- Utilizamos la variable se sesion que creamos en el modelo para mostrar el nombre completo por pantalla -->
                                <span class="font-icon font-icon-user"></span>
                                <span class="nombreSession"> <?php echo $_SESSION["nombre_usu"]; ?> <?php echo $_SESSION["apellido_usu"]; ?> &nbsp&nbsp- </span>
                                <span id="rol" class="rolSession"></span>
                            </a>
                        </div>


                        <?php
                            if ($_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3)
                            {
                                ?>

                                <style>
                                    @media (max-width: 560px){.nombreSession,.rolSession{display: none;} .messages{display: none;}.consultarChat{display: block;}} @media (max-width: 1920) and (min-width: 300px){.profileCard{width: 100%!important;}}.btnHeader{float: right !important;}.tab-pane active, .jspScrollable{height: 400px !important; overflow-x: hidden !important;}.tab-content{overflow-x: hidden !important;}.jspTrack{display:none;}
                                </style>

                                <!-- CHAT -->
                                <div class="dropdown dropdown-notification messages">
                                    <a href="#"
                                    class="header-alarm dropdown-toggle active"
                                    id="dd-messages"
                                    data-toggle="dropdown"
                                    aria-haspopup="false"
                                    aria-expanded="false">
                                        <i class="font-icon-mail"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
                                        <div class="dropdown-menu-messages-header">
                                            <ul class="nav" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active"
                                                    href="#">
                                                        Crear Chat
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--<button type="button" class="create">
                                                <i class="font-icon font-icon-pen-square"></i>
                                            </button>-->
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-incoming" role="tabpanel">
                                                <div class="dropdown-menu-messages-list">
                                                    <form method="POST" id="chatFormHeader">
                                                        <!-- En el modelo pedimos como parametro el usuario, lo extraemos de la VARIABLE DE SESION -->
                                                        <fieldset class="form-group">
                                                            <input type="hidden" id="id_usuHeader" name="id_usuHeader" value="<?php echo $_SESSION["id_usu"]; ?>">
                                                        </fieldset>

                                                        <div class="col-lg-12 input">
                                                            <fieldset class="form-group">

                                                                <!-- Estamos pasasando los option del select mediante JS -->
                                                                <label class="form-label semibold" for="">Categoría</label>
                                                                <select id="id_catHeader" name="id_catHeader" class="select2 manual select2-no-search-default select2-hidden-accessible"></select>

                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-12 input">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="titulo_chatHeader">Título</label>
                                                                <input type="text" class="form-control" id="titulo_chatHeader" name="titulo_chatHeader" placeholder="Ingrese un titulo">
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-sm-12 input">
                                                            <fieldset class="form-group">
                                                            <label class="form-label semibold" for="desc_chatHeader">Descripción</label>
                                                                <textarea rows="4" class="form-control" id="desc_chatHeader" name="desc_chatHeader" placeholder="Escriba una breve descipcion"></textarea>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <fieldset class="form-group">
                                                                <button type="button" id="btnChatHeader" class="btn btn-rounded btn-inline btn-primary btnHeader">Crear</button>
                                                            </fieldset>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu-notif-more">
                                            <a href="crear-chat">Vista Completa</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>


                    </div>
                </div>
            </div>

            <!-- <script src="js/header.js"></script> -->
        </header>
    <?php
    } else {
        header("Location: login");
    }

?>