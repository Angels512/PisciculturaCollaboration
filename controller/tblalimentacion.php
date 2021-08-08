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
                $sub_array[] = $row["fecha"];
                $sub_array[] = $row["obser_gen_cult"];
                $sub_array[] = $row["cant_siembra"];
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