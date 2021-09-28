<?php 
    require_once('../config/conexion.php');
    require_once('../models/EstadoAcuicultura.php');
    $estacui = new EstAcui();

    switch($_GET["op"]){

        // Para registrar el Estado General del Modulo de Acuicultura //
        case "insertEstacui":
            $estacui->insertEstacui($_POST["id_cultivo"],$_POST["id_usu"],$_POST["obser_gene"]);
        break;

        //para llenar el datatable de Estado de Acuicultura por cultivo
        case "listar_x_cult":
            $datos=$estacui->listar_estacui_x_cult($_POST["id_cultivo"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_est_acui"];
                $sub_array[] = $row["nombre_usu"].' '.$row["apellido_usu"];
                $sub_array[] = date('d/m/Y', strtotime($row["fecha"]));
                $sub_array[] = $row["obser_gene"];
                $sub_array[] = '<button type="button" onClick="consultarestacui('.$row['id_est_acui'].');"  class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $sub_array[] = '<button type="button" onClick="editarestacui('.$row['id_est_acui'].');"  class="btn btn-inline btn-warning btn-sm ladda-button"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminarestacui('.$row['id_est_acui'].');" class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash"></i></div></button>';

                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        // Extrae todos los datos del FORMATO Estado Acuicultura para mostrarlos en su formulario
        case 'listarDatosEstacui':
            $datos = $estacui->getEstacui_id($_POST['id_est_acui']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_est_acui"] = $row["id_est_acui"];
                    $output["obser_gene"] = $row["obser_adic"];
                    $output["fecha"] = date('d/m/Y', strtotime($row["fecha"]));
                    $output["id_cultivo"] = $row["id_cultivo"];
                    $output["id_usu"] = $row["id_usu"];
                }
                echo json_encode($output);
            }
        break;

        // Para actualizar el formato de Estado de Acuicultura por su id
        case "editar":
            $estacui->updateEstacui($_POST["id_est_acui"],$_POST["id_cultivo"],$_POST["id_usu"],$_POST["obser_gene"]);
        break;

        //para eliminar un formato de Estado de Acuicultura por su id
        case "eliminar":
            $estacui->delete_estacui($_POST["id_est_acui"]);
        break;

        }

?>