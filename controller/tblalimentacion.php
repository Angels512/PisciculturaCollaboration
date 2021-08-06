<?php 
    require_once('../config/conexion.php');
    require_once('../models/Tblalimentacion.php');
    $tblalim = new Tblalimentacion();

    switch($_GET["op"]){

        // Para registrar la tabla de alimentacion //
        case "inserttblalim":
            $tblalim->insertTblalim($_POST["id_produ"] , $_POST["id_cultivo"], $_POST["id_usu"], $_POST["cant_siembra"], $_POST["porc_proteina"], $_POST["hora_sum_alim1"], $_POST["hora_sum_alim2"],$_POST["hora_sum_alim3"], $_POST["obser_atmo"], $_POST["obser_gen_cult"] );
        break;

    }

?>