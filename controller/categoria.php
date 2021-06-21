<?php

    require_once('../config/conexion.php');
    require_once('../models/Categoria.php');

    $categoria = new Categoria();

    switch ($_GET['op'])
    {
        // Con la opcion select vamos a recorrer la tabla Categoria para mostrarla en el chat
        case 'select':
            // Llamamos el metodo getCategoria del model
            $datos = $categoria->getCategoria();

            // Miramos que si hayan datos dentro de la tabla Categoria
            if (is_array($datos) == true AND count($datos)>0)
            {
                // Llenamos todos los option del select que esta en la vista del chat
                foreach ($datos as $row)
                {
                    $html .= "<option value='".$row['id_cat']."'>".$row['nombre_cat']."</option>";
                }
                echo $html;
            }
        break;
    }
?>