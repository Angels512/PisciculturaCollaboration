<?php 

    require_once('../config/conexion.php');
    require_once('../models/Novedad.php');

    $novedad = new Novedad();

    switch ($_GET['op'])
    {
        // Para insertar una novedad
        case "insertNovedad":
            $novedad->insertNovedad($_POST["id_cultivo"],$_POST["medidad_prev"]);
        break;

        //para llenar el datatable de novedades por cultivo
        case "listar_x_cult":
            $datos=$novedad->listar_novedad_x_cult($_POST["id_cultivo"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_novedad"];
                $sub_array[] = $row["medidad_prev"];
                $sub_array[] = date('d/m/Y', strtotime($row["fecha"]));

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