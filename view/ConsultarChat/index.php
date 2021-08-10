<!DOCTYPE html>
<html>
    <head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Chat's - A'ttia</title>
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
                                <h3>Consultar Chat's</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="inicio">Inicio</a></li>
                                    <li class="active">Consultar Chat's</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header> <!--BREADCRUMB-->

                <div class="box-typical box-typical-padding">
                    <?php

                        if ($_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3)
                        {
                            ?>
                                <table id="chatData" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">Nro. Chat</th>
                                            <th style="width: 10%;">Categoria</th>
                                            <th class="d-none d-sm-table-cell" style="width: 30%;">Titulo</th>
                                            <th class="d-none d-sm-table-cell" style="width: 10%;">Fecha de creacion</th>
                                            <th class="d-none d-sm-table-cell" style="width: 5%;">Estado</th>
                                            <th class="text-center" style="width: 3%;"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>
                                </table>
                            <?php
                        }else {
                            ?>
                                <table id="chatData" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th style="width: 8%;">Nro. Chat</th>
                                            <th style="width: 8%;">Cargo</th>
                                            <th style="width: 15%;">Nombre</th>
                                            <th style="width: 15%;">Apellido</th>
                                            <th class="d-none d-sm-table-cell" style="width: 21%;">Titulo</th>
                                            <th style="width: 8%;">Categoria</th>
                                            <th class="d-none d-sm-table-cell" style="width: 10%;">Fecha de creacion</th>
                                            <th class="d-none d-sm-table-cell" style="width: 10%;">Estado</th>
                                            <th class="text-center" style="width: 5%;"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>
                                </table>
                            <?php
                        }
                    ?>

                </div><!--Contenedor Blanco-->
            </div><!--Contenedor-->
        </div><!--Contenido Principal-->



        <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
        <script type="text/javascript" src="view/ConsultarChat/consultarchat.js"></script>

    </body>
</html>
