<?php
    require_once('../config/conexion.php');
    require_once('../models/ClaseProducto.php');
    $claseproducto = new ClaseProducto();

    switch($_GET["op"]){

        // Para llenar el select del nombre del producto //
        case "clases":

            // Llamamos el metodo getClaseProducto del model
            $datos = $claseproducto->getClaseProducto();

            // verificamos si datos es un array y si sus datos no son igual a 0
            if(is_array($datos)==true and count($datos)>0){

                //llenamos el select con un option, por cada fila del arreglo
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_clase']."'>".$row['nombre_clase']." - ".$row['tipo_clase']."</option>";
                }
                echo $html;
            }
        break;

    }

?>