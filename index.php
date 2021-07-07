<?php
    // Requerimos a nuestra conexion.
    require_once("config/conexion.php");

    // Confirma que se hayan enviado los datos con el metodo POST.
    if (isset($_SESSION['id_usu']) || isset($_SESSION['nombre_usu']) || isset($_SESSION['apellido_usu']) || isset($_SESSION['id_rol']))
    {
        header("Location: inicio");
        die();
    }


    if (isset($_POST['enviar']) and $_POST['enviar'] == 'si')
    {
        // En caso de que si, llama al modelo se usuario, crea uno nuevo y ejecuta el login.
        require_once("models/Usuario.php");
        $usuario = new Usuario();
        $usuario->login();
    }
?>

<!DOCTYPE html>
<html>
    <head lang="es-419">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login - Piscicultura</title>

        <link rel="icon" type="image/vnd.microsoft.icon" href="public/img/fav.ico" sizes="32x32">

        <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
        <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/preloader.css">
        <link rel="stylesheet" href="public/css/main.css">
    </head>

    <body>

        <div class="page-center">
            <div class="page-center-in">
                <div class="container-fluid">


                    <form class="sign-box" action="" method="POST" id="loginForm">
                        <input type="hidden" name="id_rol" id="id_rol" value="1"> <!--Recoge el Rol del Usuario-->

                        <div class="sign-avatar">
                            <img src="public/img/1.jpg" id="imgRol" alt="">
                        </div>
                        <header class="sign-title" id="lblTitulo">Inicio de Sesion</header>

                        <!-- Alertas por errores -->
                        <?php
                            // Este m lo crea en nuestro controlador de usuario, en el login
                            if (isset($_GET['m']))
                            {
                                switch ($_GET['m'])
                                {
                                    // index.php?m=1
                                    case '1':
                                        ?>
                                            <div class="alert alert-danger alert-no-border alert-close alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                El usuario y/o contraseña son incorrectos.
                                            </div>
                                        <?php
                                    break;

                                    // index.php?m=2
                                    case '2':
                                        ?>
                                            <div class="alert alert-warning alert-no-border alert-close alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                Por favor, complete todos los campos.
                                            </div>
                                        <?php
                                    break;
                                }
                            }
                        ?><!--Fin de PHP con alertas-->

                        <div class="form-group">
                            <input type="text" id="documento_usu" name="documento_usu" class="form-control" placeholder="Numero de documento"/>
                        </div>
                        <div class="form-group">
                            <input type="password" id="pass_usu" name="pass_usu" class="form-control" placeholder="Contraseña"/>
                        </div>

                        <!-- Este input es el que e solicita al comienzo del documento, enviar con el valor si -->
                        <input type="hidden" name="enviar" value="si">
                        <button type="submit" class="btn btn-rounded">Acceder</button><br>
                        <p class="sign-note">Olvidaste tu contraseña? <a href="reset-password">Presiona Aqui</a></p>
                    </form>
                </div>
            </div>
        </div><!--Pagina centrada-->


        <script src="public/js/lib/jquery/jquery.min.js"></script>
        <script src="public/js/lib/tether/tether.min.js"></script>
        <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="public/js/plugins.js"></script>
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
        <script src="public/js/app.js"></script>
        <script src="index.js"></script>
    </body>
</html>