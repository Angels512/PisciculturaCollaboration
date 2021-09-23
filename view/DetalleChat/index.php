<!DOCTYPE html>
<html>
    <head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Detalle del Chat - A'ttia</title>
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
                                <h3 id="lbltitulo"></h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="inicio">Inicio</a></li>
                                    <li><a href="consultar-chat">Consultar Chat's</a></li>
                                    <li class="active">Detalle de Chat</li>
                                </ol><br>
                                <span class="label label-pill label-primary" id="nombre_usu"></span>
                                <span id="estado"></span>
                                <span class="label label-pill label-default" id="fecha"></span>
                            </div>
                        </div>
                    </div>
                </header> <!--BREADCRUMB-->

                <div class="box-typical box-typical-padding">
                    <div class="row">
                        <div class="centrar">
                            <div class="col-lg-5">
                                <fieldset class="form-group">
                                    <!-- Estamos pasasando los option del select mediante JS -->
                                    <label class="form-label semibold" for="exampleInput">Categoría</label>
                                    <input type="text" class="form-control" id="id_cat" name="id_cat" value="" readonly>
                                </fieldset>
                            </div><!--Categoria-->
                            <div class="col-lg-5">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="titulo_chat">Título</label>
                                    <input type="text" class="form-control" id="titulo_chat" name="titulo_chat" value="" readonly>
                                </fieldset>
                            </div><!--Titulo-->
                        </div>
                        <div class="centrarSummer">
                            <div class="col-lg-10">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="desc_chat">Descripción</label>
                                    <div class="summernote-theme-1">
                                        <textarea class="summernote" id="desc_chat" name="desc_chat"></textarea>
                                    </div>
                                </fieldset>
                            </div><!--Descripcion-->
                        </div>
                    </div><!--.row-->
                </div><!--Contenedor Blanco-->

                <section class="activity-line" id="lblDetalle">
                </section><!--.activity-line-->

                <div class="box-typical box-typical-padding" id="pnlDetalle">
                    <h5 class=" with-border">Nuevo Mensaje</h5>

                    <form action="">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset class="form-group" style="margin-bottom: 0;">
                                    <div class="summernote-theme-1">
                                        <textarea class="summernote" id="desc_chatd" name="desc_chatd"></textarea>
                                    </div>
                                </fieldset>
                            </div><!--Descripcion-->

                            <div class="col-lg-12">
                                <button type="button" id="btnenviar" class="btn btn-inline btn-primary float-right" style="padding: 7px 25px; margin-left: 8px;">Enviar Mensaje</button>
                                <button type="button" id="btncerrar" class="btn btn-inline btn-danger float-right" style="padding: 7px 25px;">Terminar</button>
                            </div>
                        </div><!--.row-->
                    </form>
                </div><!--Contenedor Blanco-->

            </div><!--Contenedor-->
        </div><!--Contenido Principal-->



        <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
        <script type="text/javascript" src="view/DetalleChat/detallechat.js"></script>

    </body>
</html>
