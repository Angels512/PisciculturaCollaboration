<?php 
    require_once('../config/conexion.php');
    require_once('../models/TemperaturaAgua.php');
    $tempagua = new TempAgua();

    switch($_GET["op"]){

        // Para registrar la temperatura del agua //
        case "insertTempagua":
            $tempagua->insertTempagua($_POST["id_cultivo"],$_POST["id_usu"],$_POST["num_dia"],$_POST["grados1"],$_POST["grados2"],$_POST["grados3"]);
        break;

    }

?>