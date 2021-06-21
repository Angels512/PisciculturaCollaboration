<?php

    require_once('../config/conexion.php');
    require_once('../models/Responsable.php');

    $responsable = new Responsable();
    $html = '';

    switch ($_GET['op'])
    {
        case 'select':
            $datos = $responsable->getResponsable();

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $html .= "<option value='".$row['id_respon']."'>".$row['nombre_respon']." ".$row['apellido_respon']."</option>";
                }
                echo $html;
            }
        break;
    }

?>