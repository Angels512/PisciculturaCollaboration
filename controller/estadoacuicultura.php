<?php 
    require_once('../config/conexion.php');
    require_once('../models/EstadoAcuicultura.php');
    $estacui = new EstAcui();

    switch($_GET["op"]){

        // Para registrar el Estado General del Modulo de Acuicultura //
        case "insertEstacui":
            $estacui->insertEstacui($_POST["id_cultivo"],$_POST["id_usu"],$_POST["obser_gene"]);
        break;

    }

?>