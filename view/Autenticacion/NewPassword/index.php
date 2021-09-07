<?php

    // Requerimos a nuestra conexion.
    require_once("../../../config/conexion.php");

    // Confirma que se hayan enviado los datos con el metodo POST.
    if (isset($_SESSION['id_usu']) || isset($_SESSION['nombre_usu']) || isset($_SESSION['apellido_usu']) || isset($_SESSION['id_rol']))
    {
        header("Location: ".Conectar::ruta()."view/Home/");
        die();
    }


    // Recogemos de la URL el usuario y su token de verificacion
    if (isset($_GET['user']) && isset($_GET['token']))
    {
        $user = $_GET['user'];
        $token = $_GET['token'];
    }else {
        header("Location: ".Conectar::ruta());
    }

?>

<!DOCTYPE html>
<html>
    <head lang="es-419">
        <?php require_once('../../../public/templates/autenticacion/head.php'); ?> <!-- HEAD -->
        <title>Restablecer Contraseña - A'ttia</title>
    </head>

    <body style="overflow-y: hidden;">
        <div id="page-container" class="main-content-boxed">
            <main id="main-container">
                <div class="bg-image" style="background-image: url('public/img/banner.png');">
                    <div class="row mx-0 bg-earth-op">
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
                        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white">
                            <div class="content content-full">
                                <!-- Header -->
                                <div class="px-30 py-10">
                                    <a href="login">
                                        <img src="public/img/logo.png" alt="logo" style="width: 250px;">
                                    </a>
                                    <h1 class="h3 font-w700 mt-30 mb-10">No te preocupes, te respaldamos.</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">Por favor ingrese su nueva contraseña</h2>
                                </div>
                                <!-- END Header -->

                                <!-- Reminder Form -->
                                <form class="px-30" method="post" id="restPassForm">
                                    <input type="hidden" id="id_usu" name="id_usu" value="<?php echo $user ?>">

                                    <div class="form-group row" id="divPass1">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="pass1" name="pass1">
                                                <label for="pass1">Nueva contraseña</label>
                                            </div>
                                            <div class="invalid-feedback" id="alertPass1">La contraseña debe tener entre 8 y 12 caracteres.</div>
                                        </div>
                                    </div>

                                    <div class="form-group row" id="divPass2">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="pass2" name="pass2">
                                                <label for="pass2">Confirme su contraseña</label>
                                            </div>
                                            <div class="invalid-feedback" id="alertPass2">Las contraseñas no son iguales.</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                            <i class="fa fa-asterisk mr-10"></i> Confirmar
                                        </button>
                                    </div>
                                </form>
                                <!-- END Reminder Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <?php require_once('../../../public/templates/autenticacion/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
        <script src="view/Autenticacion/NewPassword/newpassword.js"></script>
    </body>
</html>