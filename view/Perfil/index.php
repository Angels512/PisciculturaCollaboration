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
                                <section class="widget widget-user">
                                    <div class="widget-user-bg" style="background-image: url('public/img/banner.png'); height: 175px;"></div>
                                    <div class="widget-user-photo">
                                        <img src="public/img/<?php echo $_SESSION["id_rol"]; ?>.jpg" alt="">
                                    </div>
                                    <div class="widget-user-name" id="nombreCompleto">
                                        <i class="font-icon font-icon-award"></i>
                                    </div>
                                    <div id="nombreRol"></div>
                                    <button type="button" id="btnPerfil" class="btn azul mt-1" style="margin-top: 12px;"><i class="fa fa-pencil-square-o"></i> &nbspActualizar</button>
                                    <div class="widget-user-stat">
                                        <div class="item col-md-6 col-sm-12">
                                            <div class="number" id="fechaCreacion" style="font-size: 1.1em;"></div>
                                            <div class="caption">Fecha de creación</div>
                                        </div>
                                        <div class="item col-md-6 col-sm-12">
                                            <div class="number" id="fechaAct" style="font-size: 1.1em;"></div>
                                            <div class="caption">Última Actualización</div>
                                        </div>
                                    </div>
                                </section><!--.widget-user-->

                                <section class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <section class="widget widget-simple-sm">
                                            <div class="widget-simple-sm-statistic">
                                                <div class="number" id="numeroDocumento" style="font-size: 1.1em;"></div>
                                                <div class="caption color-blue"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp&nbsp Número de documento</div>
                                            </div>
                                        </section><!--.widget-simple-sm-->
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <section class="widget widget-simple-sm">
                                            <div class="widget-simple-sm-statistic">
                                                <div class="number" id="direccionCorreo" style="font-size: 1.1em;"></div>
                                                <div class="caption color-purple"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp&nbsp Correo electrónico</div>
                                            </div>
                                        </section><!--.widget-simple-sm-->
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <section class="widget widget-simple-sm">
                                            <div class="widget-simple-sm-statistic">
                                                <div class="number" id="direccion" style="font-size: 1.1em;"></div>
                                                <div class="caption color-red"><i class="fa fa-home"></i>&nbsp&nbsp Dirección</div>
                                            </div>
                                        </section><!--.widget-simple-sm-->
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <section class="widget widget-simple-sm">
                                            <div class="widget-simple-sm-statistic">
                                                <div class="number" id="numeroTelefono" style="font-size: 1.1em;"></div>
                                                <div class="caption color-green"><i class="fa fa-phone"></i>&nbsp&nbsp Teléfono</div>
                                            </div>
                                        </section><!--.widget-simple-sm-->
                                    </div>
                                </section>
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
