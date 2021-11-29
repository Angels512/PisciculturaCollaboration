<!DOCTYPE html>
<html>
    <head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Nuevo Cultivo - A'ttia</title>
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
                                <h3>Nuevo Cultivo</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="inicio">Inicio</a></li>
                                    <li class="active">Nuevo Cultivo</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header> <!--BREADCRUMB-->


                <div class="box-typical box-typical-padding">
                    <h5 class="with-border">Ingrese la Información</h5>

                    <div class="row">

                        <form action="" method="post" id="cultivoForm">
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="num_lote">Número de lote <span class="color-red">*</span></label>
                                    <div class="form-control-wrapper form-control-icon-right">
                                        <input type="number" class="form-control" id="num_lote" name="num_lote" placeholder="Ingrese el numero de lote para el cultivo">
                                        <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                                    </div>

                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="cant_siembra">Cantidad de siembra <span class="color-red">*</span></label>
                                    <input id="cant_siembra" name="cant_siembra" type="text" value="0" name="demo_vertical2">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">

                                    <!-- Estamos pasasando los option del select mediante JS -->
                                    <label class="form-label semibold" for="id_tanque">Número de estanque</label>
                                    <select id="id_tanque" name="id_tanque" class="select2 manual select2-no-search-default select2-hidden-accessible"></select>

                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">

                                    <!-- Estamos pasasando los option del select mediante JS -->
                                    <label class="form-label semibold" for="id_respon">Nombre del responsable</label>
                                    <select id="id_respon" name="id_respon" class="select2 manual select2-no-search-default select2-hidden-accessible"></select>

                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" name="action" value="add" class="btn azul btn-inline btn-primary float-right mg-top">Agregar Cultivo</button>
                            </div>
                        </form>

                    </div><!--.row-->
                </div><!--Contenedor Blanco-->
            </div><!--Contenedor-->
        </div><!--Contenido Principal-->



        <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
        <script type="text/javascript" src="view/NuevoCultivo/nuevocultivo.js"></script>

    </body>
</html>
