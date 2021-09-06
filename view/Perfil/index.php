<!DOCTYPE html>
<html>
    <head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Perfil - A'ttia</title>
    </head>

    <body class="with-side-menu">

        <div class="mainContainer">
            <?php require_once('../../public/templates/header.php'); ?> <!--HEADER-->
            <div class="mobile-menu-left-overlay"></div>
            <?php require_once('../../public/templates/nav.php') ?> <!--NAV-->



            <!-- CONTENIDO -->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="centrarSummer">
                            <div class="col-lg-10 col-lg-pull-10 col-md-10 col-sm-12">
                                <section class="box-typical profileCard">
                                    <div class="profile-card">
                                        <div class="profile-card-photo">
                                            <img src="public/img/<?php echo $_SESSION["id_rol"]; ?>.jpg" alt=""/>
                                        </div>
                                        <div class="profile-card-name" id="nombreCompleto"></div>
                                        <div class="profile-card-status" id="nombreRol"></div><br>
                                        <button type="button" id="btnPerfil" class="btn btn-rounded">Actualizar</button>
                                    </div><!--.profile-card-->

                                    <div class="profile-statistic tbl">
                                        <div class="tbl-row">
                                            <div class="tbl-cell">
                                                <b id="fechaCreacion"></b>
                                                Fecha de creación
                                            </div>
                                            <div class="tbl-cell">
                                                <b id="fechaAct"></b>
                                                Ultima Actualización
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="profile-links-list">
                                        <li class="nowrap">
                                            <p><i class="fa fa-address-card" aria-hidden="true"></i><b>&nbsp&nbsp Número de documento:</b> <span id="numeroDocumento"></span></p>
                                        </li>
                                        <li class="nowrap">
                                            <p><i class="fa fa-envelope" aria-hidden="true"></i><b>&nbsp&nbsp Correo electrónico:</b> <span id="direccionCorreo"></span></p>
                                        </li>
                                        <li class="nowrap">
                                            <p><i class="fa fa-home"></i><b>&nbsp&nbsp Dirección:</b> <span id="direccion"></span></p>
                                        </li>
                                        <li class="nowrap">
                                            <p><i class="fa fa-phone"></i><b>&nbsp&nbsp Teléfono:</b> <span id="numeroTelefono"></span></p>
                                        </li>
                                    </ul>
                                </section><!--.box-typical-->
                            </div><!--.col- -->
                        </div>
                    </div><!--.row-->
                </div><!--Contenedor-->
            </div><!--Contenido Principal-->



            <?php require_once('modalPerfil.php'); ?>
            <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
            <script src="view/Perfil/perfil.js"></script>
        </div>

    </body>
</html>
