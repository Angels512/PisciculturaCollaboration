<!DOCTYPE html>
<html>
    <head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Nuevo Chat - A'ttia</title>
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
                                <h3>Nuevo Chat</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="inicio">Inicio</a></li>
                                    <li class="active">Nuevo Chat</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header> <!--BREADCRUMB-->


                <div class="box-typical box-typical-padding">
                    <h5 class="with-border">Ingrese la Informacion</h5>

                    <div class="row">

                        <form method="POST" id="chatForm">
                            <!-- En el modelo pedimos como parametro el usuario, lo extraemos de la VARIABLE DE SESION -->
                            <input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

                            <div class="col-lg-6">
                                <fieldset class="form-group">

                                    <!-- Estamos pasasando los option del select mediante JS -->
                                    <label class="form-label semibold" for="exampleInput">Categoria</label>
                                    <select id="id_cat" name="id_cat" class="select2 manual select2-no-search-default select2-hidden-accessible"></select>

                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="titulo_chat">Titulo</label>
                                    <input type="text" class="form-control" id="titulo_chat" name="titulo_chat" placeholder="Ingrese un titulo">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="desc_chat">Descripcion</label>
                                    <div class="summernote-theme-1">
                                        <textarea class="summernote" id="desc_chat" name="desc_chat"></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" name="action" value="add" class="btn btn-inline btn-primary azul float-right" style="padding-left: 35px; padding-right: 35px;">Crear</button>
                            </div>
                        </form>

                    </div><!--.row-->
                </div><!--Contenedor Blanco-->
            </div><!--Contenedor-->
        </div><!--Contenido Principal-->



        <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
        <script type="text/javascript" src="view/NuevoChat/nuevochat.js"></script>

    </body>
</html>
