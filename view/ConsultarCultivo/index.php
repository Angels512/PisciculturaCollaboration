<!DOCTYPE html>
<html>
    <head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Cultivos - A'ttia</title>
    </head>

    <body class="with-side-menu">


        <?php require_once('../../public/templates/header.php'); ?> <!--HEADER-->
        <div class="mobile-menu-left-overlay"></div>
        <?php require_once('../../public/templates/nav.php') ?> <!--NAV-->



        <!-- CONTENIDO -->
        <div class="page-content">
            <div class="container-fluid">
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Cultivos</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="inicio">Inicio</a></li>
                                    <li class="active">Consultar Cultivos</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header> <!--BREADCRUMB-->

                <div class="container-fluid">
                    <div class="row card-user-grid" id="pnlCultivo">

                    </div><!--.card-user-grid-->
                </div><!--.container-fluid-->
            </div><!--Contenedor-->
        </div><!--Contenido Principal-->


        <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
        <?php require_once('modalCultivos.php'); ?>
        <script type="text/javascript" src="view/ConsultarCultivo/consultarcultivo.js"></script>

    </body>
</html>
