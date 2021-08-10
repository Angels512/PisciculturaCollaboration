<!DOCTYPE html>
<html>
    <head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Inicio - A'ttia</title>
    </head>

    <body class="with-side-menu">

        <div class="mainContainer">
            <?php require_once('../../public/templates/header.php'); ?> <!--HEADER-->
            <div class="mobile-menu-left-overlay"></div>
            <?php require_once('../../public/templates/nav.php') ?> <!--NAV-->



            <!-- CONTENIDO -->
            <div class="page-content">
                <div class="container-fluid">
                    Este es el home de los usuarios!
                </div><!--Contenedor-->
            </div><!--Contenido Principal-->



            <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
            <script src="view/Home/home.js"></script>
        </div>

    </body>
</html>
