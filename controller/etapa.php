<?php
    require_once('../config/conexion.php');
    require_once('../models/Etapa.php');
    $etapa = new Etapa();

    switch($_GET["op"]){

        // Para llenar el select de la etapa //
        case "etapas":

            // Llamamos el metodo getEtapa del model
            $datos = $etapa->getEtapa();

            // verificamos si datos es un array y si sus datos no son igual a 0
            if(is_array($datos)==true and count($datos)>0){

                //llenamos el select con un option, por cada fila del arreglo
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_etapa']."'>".$row['nombre_etapa']."</option>";
                }
                echo $html;
            }
        break;

    }

?>