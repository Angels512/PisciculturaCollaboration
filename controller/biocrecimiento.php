<?php 
    require_once('../config/conexion.php');
    require_once('../models/Biocrecimiento.php');
    $biocre = new Biocrecimiento();

    switch($_GET["op"]){

        // Para registrar el Biocrecimiento //
        case "insertBiocre":
            $biocre->insertBiocre($_POST["id_etapa"],$_POST["id_cultivo"],$_POST["id_usu"],$_POST["num_organ"],$_POST["peso_organ"],$_POST["peso_biomasa"],$_POST["edad_organ"],$_POST["color_organ"],$_POST["escamas_organ"],$_POST["ojos_organ"],$_POST["compor_organ"],$_POST["crecimiento_organ"],$_POST["obser_adic"]);
        break;

    }

?>