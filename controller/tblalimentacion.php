<?php
    require_once('../config/conexion.php');
    require_once('../models/Tblalimentacion.php');
    $tblalim = new Tblalimentacion();

    switch($_GET["op"]){

        // Para registrar la tabla de alimentacion //
        case "inserttblalim":
            $tblalim->insertTblalim($_POST["id_produ"] , $_POST["id_cultivo"], $_POST["id_usu"], $_POST["cant_siembra"], $_POST["porc_proteina"], $_POST["hora_sum_alim1"], $_POST["hora_sum_alim2"],$_POST["hora_sum_alim3"], $_POST["obser_atmo"], $_POST["obser_gen_cult"] );
        break;

        //para llenar el datatable de tblalim por cultivo
        case "listar_x_cult":
            $datos=$tblalim->listar_tblalim_x_cult($_POST["id_cultivo"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_tbl_alim"];
                $sub_array[] = $row["nombre_usu"].' '.$row["apellido_usu"];
                $sub_array[] = date('d/m/Y', strtotime($row["fecha"]));
                $sub_array[] = $row["obser_gen_cult"];
                $sub_array[] = $row["cant_siembra"];
                $sub_array[] = '<button type="button" onClick="consultartbal('.$row['id_tbl_alim'].');"  class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $sub_array[] = '<button type="button" onClick="editartbal('.$row['id_tbl_alim'].');" class="btn btn-inline btn-warning btn-sm ladda-button"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminartbal('.$row['id_tbl_alim'].');" class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash"></i></div></button>';

                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;

        // Extrae todos los datos del formato tbl alimentacion para mostrarlos en su formulario
        case 'listarDatosTblAlim':
            $datos = $tblalim->getAlim_id($_POST['id_tbl_alim']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_tbl_alim"] = $row["id_tbl_alim"];
                    $output["cant_siembra"] = $row["cant_siembra"];
                    $output["porc_proteina"] = ($row["porc_proteina"]);
                    $output["hora_sum_alim1"] = $row["hora_sum_alim1"];
                    $output["hora_sum_alim2"] = $row["hora_sum_alim2"];
                    $output["hora_sum_alim3"] = $row["hora_sum_alim3"];
                    $output["obser_atmo"] = $row["obser_atmo"];
                    $output["obser_gen_cult"] = $row["obser_gen_cult"];
                    $output["fecha"] = date('d/m/Y', strtotime($row["fecha"]));
                    $output["id_produ"] = $row["id_produ"];
                    $output["id_cultivo"] = $row["id_cultivo"];
                    $output["id_usu"] = $row["id_usu"];
                }
                echo json_encode($output);
            }
        break;

        // Para actualizar el formato de tbl alimentacion por su id
        case "editar":
            $tblalim->updateTblAlim($_POST["id_tbl_alim"],$_POST["id_produ"] , $_POST["id_cultivo"], $_POST["id_usu"], $_POST["cant_siembra"], $_POST["porc_proteina"], $_POST["hora_sum_alim1"], $_POST["hora_sum_alim2"],$_POST["hora_sum_alim3"], $_POST["obser_atmo"], $_POST["obser_gen_cult"] );
        break;

        //para eliminar un formato de tbl alimentacion por su id
        case "eliminar":
            $tblalim->delete_tblalm($_POST["id_tbl_alim"]);
        break;

    }

?>