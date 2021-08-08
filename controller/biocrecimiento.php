<?php 
    require_once('../config/conexion.php');
    require_once('../models/Biocrecimiento.php');
    $biocre = new Biocrecimiento();

    switch($_GET["op"]){

        // Para registrar el Biocrecimiento //
        case "insertbiocre":
            $biocre->insertBiocre($_POST["id_etapa"],$_POST["id_cultivo"],$_POST["id_usu"] ,$_POST["num_organ"],$_POST["peso_organ"],$_POST["peso_biomasa"],$_POST["edad_organ"],$_POST["color_organ"],$_POST["escamas_organ"],$_POST["ojos_organ"],$_POST["compor_organ"],$_POST["crecimiento_organ"],$_POST["obser_adic"]);
        break;

        //para llenar el datatable de biocre por cultivo
        case "listar_x_cult":
            $datos=$biocre->listar_biocre_x_cult($_POST["id_cultivo"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_biocre"];
                $sub_array[] = $row["nombre_usu"].' '.$row["apellido_usu"];
                $sub_array[] = $row["fecha"];
                $sub_array[] = $row["compor_organ"];
                $sub_array[] = $row["num_organ"];
                $sub_array[] = '<button type="button"  class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';                
                $sub_array[] = '<button type="button" class="btn btn-inline btn-warning btn-sm ladda-button"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button"  class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash"></i></div></button>';
                
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

    }

?>