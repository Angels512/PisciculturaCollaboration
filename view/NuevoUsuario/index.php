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
        <title>Nuevo Usuario</title>

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
                <form class="sign-box reset-password-box" id="newUserForm">
                    <header class="sign-title">Complete los campos</header>
                    <input type="hidden" id="documento_usu" name="documento_usu" value="<?php echo $user ?>">
                    <input type="hidden" id="temporalPassword" name="temporalPassword" value="<?php echo $token ?>">

                    <div class="form-group">
                        <input type="text" id="direccion_usu" name="direccion_usu" class="form-control" placeholder="Direccion"/>
                    </div>
                    <div class="form-group">
                        <input type="number" id="telefono_usu" name="telefono_usu" class="form-control" placeholder="Numero de telefono"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass1" name="pass1" class="form-control" placeholder="Nueva Contraseña"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass2" name="pass2" class="form-control" placeholder="Confirme su Contraseña"/>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-block">Guardar</button>
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
    <script src="view/NuevoUsuario/nuevousuario.js"></script>
    </body>
</html>