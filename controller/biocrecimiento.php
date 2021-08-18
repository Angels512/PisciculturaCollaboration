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
                $sub_array[] = date('d/m/Y', strtotime($row["fecha"]));
                $sub_array[] = $row["compor_organ"];
                $sub_array[] = $row["num_organ"];
                $sub_array[] = '<button type="button" onClick="consultar('.$row['id_biocre'].');"  class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $sub_array[] = '<button type="button" onClick="editar('.$row['id_biocre'].');"  class="btn btn-inline btn-warning btn-sm ladda-button"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['id_biocre'].');" class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash"></i></div></button>';

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
        case 'listarDatosBiocre':
            $datos = $biocre->getBiocre_id($_POST['id_biocre']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_biocre"] = $row["id_biocre"];
                    $output["num_organ"] = $row["num_organ"];
                    $output["peso_organ"] = ($row["peso_organ"]);
                    $output["peso_biomasa"] = $row["peso_biomasa"];
                    $output["edad_organ"] = $row["edad_organ"];
                    $output["color_organ"] = $row["color_organ"];
                    $output["escamas_organ"] = $row["escamas_organ"];
                    $output["ojos_organ"] = $row["ojos_organ"];
                    $output["compor_organ"] = $row["compor_organ"];
                    $output["crecimiento_organ"] = $row["crecimiento_organ"];
                    $output["obser_adic"] = $row["obser_adic"];
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
            $biocre->updateBiocre($_POST["id_biocre"],$_POST["id_etapa"],$_POST["id_cultivo"],$_POST["id_usu"] ,$_POST["num_organ"],$_POST["peso_organ"],$_POST["peso_biomasa"],$_POST["edad_organ"],$_POST["color_organ"],$_POST["escamas_organ"],$_POST["ojos_organ"],$_POST["compor_organ"],$_POST["crecimiento_organ"],$_POST["obser_adic"]);
        break;

        //para eliminar un formato de biocrecimiento por su id
        case "eliminar":
            $biocre->delete_biocre($_POST["id_biocre"]);
        break;

    }

?>