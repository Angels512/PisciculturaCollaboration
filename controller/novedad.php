<?php 

    require_once('../config/conexion.php');
    require_once('../models/Novedad.php');

    $novedad = new Novedad();

    switch ($_GET['op'])
    {
        // Para insertar una novedad
        case "insertNovedad":
            $novedad->insertNovedad($_POST["id_cultivo"],$_POST["medidad_prev"]);
        break;

    }

?>