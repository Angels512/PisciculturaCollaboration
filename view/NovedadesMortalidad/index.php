<!DOCTYPE html>
<html>
    <head lang="es">
            <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
            <title>Novedades y Mortalidad - A'ttia</title>
    </head>

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
                                <h3>Novedades y Mortalidad</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="inicio">Inicio</a></li>
                                    <li><a href="consultar-cultivo">Cultivos</a></li>
                                    <li class="active">Novedades y Mortalidad</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header> <!--BREADCRUMB-->

                <div class="container-fluid">
                    <div class="row card-user-grid">

                        <section class="tabs-section">
                            <div class="tabs-section-nav tabs-section-nav-icons">
                                <div class="tbl">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#tabs-1-tab-1" role="tab" data-toggle="tab">
                                                <span class="nav-link-in">
                                                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                                    Novedades
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tabs-1-tab-2" role="tab" data-toggle="tab">
                                                <span class="nav-link-in">
                                                    <i class="fa fa-anchor" aria-hidden="true"></i>
                                                    Mortalidad
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--.tabs-section-nav-->

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="tabs-1-tab-1">
                                    <section class="card">
                                        <div class="card-block">
                                            <table id="dt_novedad" class="display table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%;">#</th>
                                                        <th style="width: 45%;">Medidas Preventivas</th>
                                                        <th style="width: 25%;">Fecha</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div><!--.tab-pane-->

                                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">
                                    <section class="card">
                                        <div class="card-block">
                                            <table id="dt_mortalidad" class="display table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%;">#</th>
                                                        <th style="width: 45%;">Cantidad de peces muertos</th>
                                                        <th style="width: 25%;">Fecha</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div><!--.tab-pane-->
                            </div><!--.tab-content-->
                        </section><!--.tabs-section-->

                    </div><!--.card-user-grid-->
                </div><!--.container-fluid-->
            </div><!--Contenedor-->
        </div><!--Contenido Principal-->



        <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
        <script src="view/NovedadesMortalidad/novedadesmortalidad.js"></script>

    </body>
</html>
