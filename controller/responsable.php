<?php

    require_once('../config/conexion.php');
    require_once('../models/Responsable.php');

    $responsable = new Responsable();
    $html = '';

    switch ($_GET['op'])
    {
        // Para llenar el select de responsables //
        case 'select':

            // Llamamos el metodo getResponsable del model
            $datos = $responsable->getResponsable();

            // verificamos si datos es un array y si sus datos no son igual a 0
            if (is_array($datos) == true AND count($datos)>0)
            {
                //llenamos el select con un option, por cada fila del arreglo
                foreach ($datos as $row)
                {
                    $html .= "<option value='".$row['id_respon']."'>".$row['nombre_respon']." ".$row['apellido_respon']."</option>";
                }
                echo $html;
            }
        break;

        // Para insertar los responsables //
        case "insert":
            $responsable->insertResponsable($_POST["nombre_respon"],$_POST["apellido_respon"]);
        break;

    }

?>