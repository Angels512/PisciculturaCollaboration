<?php
    // Requerimos a nuestra conexion.
    require_once("../../../config/conexion.php");

    // Confirma que se hayan enviado los datos con el metodo POST.
    if (isset($_SESSION['id_usu']) || isset($_SESSION['nombre_usu']) || isset($_SESSION['apellido_usu']) || isset($_SESSION['id_rol']))
    {
        header("Location: inicio");
        die();
    }


    if (isset($_POST['enviar']) and $_POST['enviar'] == 'si')
    {
        // En caso de que si, llama al modelo se usuario, crea uno nuevo y ejecuta el login.
        require_once("../../../models/Usuario.php");
        $usuario = new Usuario();
        $usuario->login();
    }
?>

<!DOCTYPE html>
<html lang="es-419" class="no-focus">
    <head>
        <?php require_once('../../../public/templates/autenticacion/head.php'); ?> <!-- HEAD -->
        <title>Login - A'ttia</title>
    </head>

    <body>
        <div id="page-container" class="main-content-boxed">
            <main id="main-container">
                <div class="bg-image" style="background-image: url('public/img/banner.jpg');">
                    <div class="row mx-0 bg-black-op">
                        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                            <div class="p-30 invisible" data-toggle="appear">
                                <p class="font-size-h3 font-w600 text-white">
                                    A'ttia - Piscicultura.
                                </p>
                                <p class="font-italic text-white-op">
                                    Copyright &copy; <span class="js-year-copy">2021</span>
                                </p>
                            </div>
                        </div>
                        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                            <div class="content content-full">
                                <!-- Header -->
                                <div class="py-10">
                                    <a href="login">
                                        <img src="public/img/logo.png" alt="logo" style="width: 250px;">
                                    </a>
                                    <h1 class="h3 font-w700 mt-30 mb-10">Bienvenido</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">Inicio sesion</h2>
                                </div>
                                <!-- END Header -->

                                <!-- Sign In Form -->
                                <form action="" method="POST" id="loginForm">
                                    <input type="hidden" name="enviar" value="si">

                                    <!-- ALERTAS -->
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <?php
                                                if (isset($_GET["m"])){
                                                    switch($_GET["m"]){
                                                        case "1";
                                                        ?>
                                                            <br><div class="alert alert-warning" role="alert" style="margin-bottom: -15px;">
                                                                <div class="d-flex align-items-center justify-content-start">
                                                                    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                                                    <span> El Usuario y/o Contraseña son incorrectos. </span>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        break;

                                                        case "2";
                                                        ?>
                                                            <br><div class="alert alert-danger" role="alert" style="margin-bottom: -15px;">
                                                                <div class="d-flex align-items-center justify-content-start">
                                                                    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                                                    <span> Los campos estan vacios.</span>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        break;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="documento_usu" name="documento_usu">
                                                <label for="documento_usu">Numero de documento</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="pass_usu" name="pass_usu">
                                                <label for="pass_usu">Contraseña</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                            <i class="si si-login mr-10"></i> Acceder
                                        </button>
                                        <div class="mt-30">
                                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="home">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver al inicio
                                            </a>
                                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="reset-password">
                                                <i class="fa fa-warning mr-5"></i> Olvide mi Contraseña
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <?php require_once('../../../public/templates/autenticacion/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
    </body>
</html>