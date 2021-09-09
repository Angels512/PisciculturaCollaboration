<?php
    require_once('../config/conexion.php');
    require_once('../models/TemperaturaAgua.php');
    $tempagua = new Tempagua();

    switch($_GET["op"]){

        // Para registrar la temperatura del agua //
        case "insertTempagua":
            $tempagua->insertTempagua($_POST["id_cultivo"],$_POST["id_usu"],$_POST["num_dia"],$_POST["grados1"],$_POST["grados2"],$_POST["grados3"]);
        break;

        //para llenar el datatable de Temperatura Agua por cultivo
        case "listar_x_cult":
            $datos=$tempagua->listar_tempagua_x_cult($_POST["id_cultivo"]);
            $data= array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_temp_agua"];
                $sub_array[] = $row["nombre_usu"].' '.$row["apellido_usu"];
                $sub_array[] = date('d/m/Y', strtotime($row["fecha"]));
                $sub_array[] = $row["num_dia"];
                $sub_array[] = '<button type="button" onClick="consultar('.$row['id_temp_agua'].');" id="'.$row['id_temp_agua'].'"  class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $sub_array[] = '<button type="button" onClick="editar('.$row['id_temp_agua'].');" id="'.$row['id_temp_agua'].'"  class="btn btn-inline btn-warning btn-sm ladda-button"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['id_temp_agua'].');" id="'.$row['id_temp_agua'].'" class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash"></i></div></button>';

                $data[] = $sub_array;
            }

            $results = array
            (
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );

            echo json_encode($results);
        break;

        // Extrae todos los datos del FORMATO Temperatura Agua para mostrarlos en su formulario
        case 'listarDatosTempagua':
            $datos = $tempagua->getTempagua_id($_POST['id_temp_agua']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_temp_agua"] = $row["id_temp_agua"];
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

        // Para actualizar el formato de temperatura agua por su id
        case "editar":
            $tempagua->updateTempagua($_POST["id_temp_agua"],$_POST["id_cultivo"],$_POST["num_dia"],$_POST["id_usu"] ,$_POST["grados1"],$_POST["grados2"],$_POST["grados3"]);
        break;

        //para eliminar un formato de temperatura agua por su id
        case "eliminar":
            $tempagua->delete_tempagua($_POST["id_temp_agua"]);
        break;

    }

?>