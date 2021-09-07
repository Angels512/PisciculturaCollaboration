<?php 
    require_once('../config/conexion.php');
    require_once('../models/TemperaturaAmbiente.php');
    $tempamb = new Tempamb();

    switch($_GET["op"]){

        // Para registrar la temperatura del ambiente //
        case "insertTempamb":
            $tempamb->insertTempamb($_POST["id_cultivo"],$_POST["id_usu"],$_POST["num_dia"],$_POST["grados1"],$_POST["grados2"],$_POST["grados3"]);
        break;

        //para llenar el datatable de Temperatura Ambiente por cultivo
        case "listar_x_cult":
            $datos=$tempamb->listar_tempamb_x_cult($_POST["id_cultivo"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_temp_amb"];
                $sub_array[] = $row["nombre_usu"].' '.$row["apellido_usu"];
                $sub_array[] = date('d/m/Y', strtotime($row["fecha"]));
                $sub_array[] = $row["num_dia"];
                $sub_array[] = '<button type="button" onClick="consultar('.$row['id_temp_amb'].');"  class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $sub_array[] = '<button type="button" onClick="editar('.$row['id_temp_amb'].');"  class="btn btn-inline btn-warning btn-sm ladda-button"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['id_temp_amb'].');" class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash"></i></div></button>';

                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        // Extrae todos los datos del FORMATO Temperatura Ambiente para mostrarlos en su formulario
        case 'listarDatosTempamb':
            $datos = $tempamb->getTempamb_id($_POST['id_temp_amb']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_temp_amb"] = $row["id_temp_amb"];
                    $output["num_dia"] = $row["num_dia"];
                    $output["grados1"] = ($row["grados1"]);
                    $output["grados2"] = ($row["grados2"]);
                    $output["grados3"] = ($row["grados3"]);
                    $output["fecha"] = date('d/m/Y', strtotime($row["fecha"]));
                    $output["id_cultivo"] = $row["id_cultivo"];
                    $output["id_usu"] = $row["id_usu"];
                }
                echo json_encode($output);
            }
        break;

        // Para actualizar el formato de temperatura ambiente por su id
        case "editar":
            $tempamb->updateTempamb($_POST["id_temp_amb"],$_POST["id_cultivo"],$_POST["num_dia"],$_POST["id_usu"] ,$_POST["grados1"],$_POST["grados2"],$_POST["grados3"]);
        break;

        //para eliminar un formato de temperatura ambiente por su id
        case "eliminar":
            $tempamb->delete_tempamb($_POST["id_temp_amb"]);
        break;

    }

?>

    }

?>