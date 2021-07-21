<?php 

    require_once('../config/conexion.php');
    require_once('../models/Mortalidad.php');

    $mortalidad = new Mortalidad();

    switch ($_GET['op'])
    {
        // Para insertar la mortalidad 
        case "insertMortalidad":
            $mortalidad->insertMortalidad($_POST["id_cultivo"],$_POST["reg_mortandad"]);
        break;

    }

?>