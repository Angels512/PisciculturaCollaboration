<?php 
    require_once('../config/conexion.php');
    require_once('../models/ParametrosFQ.php');
    $parafq = new Parametrosfq();

    switch($_GET["op"]){

        // Para registrar los Parametros Fisico Quimicos //
        case "insertparafq":
            $parafq->insertparafq($_POST["id_cultivo"],$_POST["id_usu"],$_POST["rango_amonio"],$_POST["rango_nitrito"],$_POST["rango_nitrato"],$_POST["rango_ph"],$_POST["cant_melaza"],$_POST["porc_agua"],$_POST["observaciones"]);
        break;

    }

?>