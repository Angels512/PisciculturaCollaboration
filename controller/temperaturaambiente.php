<?php 
    require_once('../config/conexion.php');
    require_once('../models/TemperaturaAmbiente.php');
    $tempagua = new TempAmbiente();

    switch($_GET["op"]){

        // Para registrar la temperatura del agua //
        case "insertTempamb":
            $tempagua->insertTempamb($_POST["id_cultivo"],$_POST["id_usu"],$_POST["num_dia"],$_POST["grados1"],$_POST["grados2"],$_POST["grados3"]);
        break;

    }

?>