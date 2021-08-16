<?php 

    require_once('../config/conexion.php');
    require_once('../models/Mortalidad.php');

    $mortalidad = new Mortalidad();

    switch ($_GET['op'])
    {
        // Para insertar la mortalidad 
        case "insertMortalidad":
            $mortalidad->insertMortalidad($_POST["id_cultivo"],$_POST["reg_mortandad"]);
        break;


        //para llenar el datatable de mortalidad por cultivo 
        case "listar_x_cult":
            $datos=$mortalidad->listar_mortalidad_x_cult($_POST["id_cultivo"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_mortalidad"];
                $sub_array[] = 'Hubo reporte de '.$row["reg_mortandad"].' peces muertos.';
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