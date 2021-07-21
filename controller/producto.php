<?php 
    require_once('../config/conexion.php');
    require_once('../models/Producto.php');
    $producto = new Producto();

    switch($_GET["op"]){

        // Para llenar el select del producto suminitrado en la tblAlimentacion //
        case "productos":

            // Llamamos el metodo getNombreProducto del model
            $datos = $producto->getNombreProducto();

             // verificamos si datos es un array y si sus datos no son igual a 0
            if(is_array($datos)==true and count($datos)>0){

                //llenamos el select con un option, por cada fila del arreglo
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_produ']."'>".$row['nombre_clase']."  -  Vence: ".$row['fech_venc']."</option>";
                }
                echo $html;
            }
        break;

        // Para llenar el select de proveedores en el formulario de productos 
        case "nom_proveedores":

            // Llamamos el metodo getNombreProveedo del model
            $datos = $producto->getNombreProveedor();

             // verificamos si datos es un array y si sus datos no son igual a 0
            if(is_array($datos)==true and count($datos)>0){

                //llenamos el select con un option, por cada fila del arreglo
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_prove']."'>".$row['nombre_emp']."</option>";
                }
                echo $html;
            }
        break;

        // Para insertar productos //
        case "insertproducts":
            $producto->insertProducts($_POST["id_prove"],$_POST["id_clase"],$_POST["fech_venc"],$_POST["num_lote"]);
        break;

    }

?>

