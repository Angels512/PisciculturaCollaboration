<?php

    // Requerimos a nuestra conexion.
    require_once("../../config/conexion.php");

    // Confirma que se hayan enviado los datos con el metodo POST.
    if (isset($_SESSION['id_usu']) || isset($_SESSION['nombre_usu']) || isset($_SESSION['apellido_usu']) || isset($_SESSION['id_rol']))
    {
        header("Location: inicio");
        die();
    }


    // Recogemos de la URL el usuario y su token de verificacion
    if (isset($_GET['user']) && isset($_GET['token']))
    {
        $user = $_GET['user'];
        $token = $_GET['token'];
    }else {
        header("Location: login");
    }

?>

<!DOCTYPE html>
<html>
    <head lang="es-419">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Restablecer Contraseña</title>

        <link rel="icon" type="image/vnd.microsoft.icon" href="public/img/fav.ico" sizes="32x32">

        <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
        <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/lib/bootstrap-sweetalert/sweetalert.css">
        <link rel="stylesheet" href="public/css/separate/vendor/sweet-alert-animations.min.css">
        <link rel="stylesheet" href="public/css/main.css">
    </head>

    <body>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box reset-password-box" id="codigoForm">
                    <header class="sign-title">Ingrese su Codigo</header>
                    <div class="form-group">
                        <input type="number" id="codigo" name="codigo" class="form-control" placeholder="Numero de Codigo"/>
                    </div>

                    <input type="hidden" id="id_usu" name="id_usu" value="<?php echo $user; ?>"/>
                    <input type="hidden" id="token" name="token" value="<?php echo $token; ?>"/>

                    <button type="submit" class="btn btn-rounded btn-block">Confirmar</button>
                </form>
            </div>
        </div>
    </div><!--.page-center-->

    <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
    <script src="view/CodigoRestPassword/codigorestpassword.js"></script>
    </body>
</html>