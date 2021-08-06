<!DOCTYPE html>
<html>
<head lang="es-419">
	<?php require_once('../../../public/templates/head.php') ?>
    <link rel="stylesheet" href="public/css/separate/pages/error.min.css">
	<title>Error 500</title>
</head>
<body>

<div class="page-error-box">
    <div class="error-code">500</div>
    <div class="error-title">Tuvimos algunos problemas, intenta mas tarde...</div>

    <?php
        if (isset($_SESSION['id_usu']) || isset($_SESSION['nombre_usu']) || isset($_SESSION['apellido_usu']) || isset($_SESSION['id_rol']))
        {
            ?>
                <a href="inicio" class="btn btn-rounded">Volver Atras</a>
            <?php
        }else {
            ?>
                <a href="login" class="btn btn-rounded">Volver Atras</a>
            <?php
        }
    ?>
</div>