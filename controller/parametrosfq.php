<?php 
    require_once('../config/conexion.php');
    require_once('../models/ParametrosFQ.php');
    $parafq = new Parametrosfq();

    switch($_GET["op"]){

        // Para registrar los Parametros Fisico Quimicos //
        case "insertparafq":
            $parafq->insertparafq($_POST["id_cultivo"],$_POST["id_usu"],$_POST["rango_amonio"],$_POST["rango_nitrito"],$_POST["rango_nitrato"],$_POST["rango_ph"],$_POST["cant_melaza"],$_POST["porc_agua"],$_POST["observaciones"]);
        break;

        //para llenar el datatable de biocre por cultivo
        case "listar_x_cult":
            $datos=$parafq->listar_parafq_x_cult($_POST["id_cultivo"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_par_fq"];
                $sub_array[] = $row["nombre_usu"].' '.$row["apellido_usu"];
                $sub_array[] = date('d/m/Y', strtotime($row["fecha"]));
                $sub_array[] = $row["observaciones"];
                $sub_array[] = '<button type="button" onClick="consultarparafq('.$row['id_par_fq'].');"  class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $sub_array[] = '<button type="button" onClick="editarparafq('.$row['id_par_fq'].');"  class="btn btn-inline btn-warning btn-sm ladda-button"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminarparafq('.$row['id_par_fq'].');" class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash"></i></div></button>';

                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        // Extrae todos los datos del FORMATO BIOCRECIMIENTO para mostrarlos en su formulario
        case 'listarDatosParafq':
            $datos = $parafq->getParafq_id($_POST['id_par_fq']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_par_fq"] = $row["id_par_fq"];
                    $output["rango_amonio"] = ($row["rango_amonio"]);
                    $output["rango_nitrito"] = $row["rango_nitrato"];
                    $output["rango_nitrato"] = $row["rango_nitrato"];
                    $output["rango_ph"] = $row["rango_ph"];
                    $output["cant_melaza"] = $row["cant_melaza"];
                    $output["porc_agua"] = $row["porc_agua"];
                    $output["fecha"] = date('d/m/Y', strtotime($row["fecha"]));
                    $output["id_etapa"] = $row["id_etapa"];
                    $output["id_cultivo"] = $row["id_cultivo"];
                    $output["id_usu"] = $row["id_usu"];
                }
                echo json_encode($output);
            }
        break;

        // Para actualizar el formato de biocrecimiento por su id
        case "editar":
            $parafq->updateparafq($_POST["id_par_fq"],$_POST["id_cultivo"],$_POST["id_usu"],$_POST["rango_amonio"],$_POST["rango_nitrito"],$_POST["rango_nitrato"],$_POST["rango_ph"],$_POST["cant_melaza"],$_POST["porc_agua"],$_POST["observaciones"]);
        break;

        //para eliminar un formato de biocrecimiento por su id
        case "eliminar":
            $parafq->delete_parafq($_POST["id_par_fq"]);
        break;

    }

?>