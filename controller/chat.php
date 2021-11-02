<?php

    require_once('../config/conexion.php');
    require_once('../models/Chat.php');

    $chat = new Chat();
    $meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

    switch ($_GET['op'])
    {
        // Crear un nuevo CHAT
        case 'create':
            $chat->createChat($_POST['id_usu'], $_POST['id_cat'], $_POST['titulo_chat'], $_POST['desc_chat']);
        break;

        // Crear un nuevo CHAT
        case 'cerrar':
            $chat->cerrarChat($_POST['id_chat']);
        break;

        // Mostrar los chats de un usuario en el DATATABLE
        case 'listarChatUsu':
            $datos = $chat->listarChat_usu($_POST['id_usu']);
            $data = array(); // Declaramos un array

            // Recorremos el resultado de la consulta realizada en el modelo
            foreach($datos as $row)
            {
                $sub_array = array();

                // Generamos las columnas que se mostraran en la vista
                $sub_array[] = '<b>'.$row['id_chat'].'</b>';
                $sub_array[] = $row['nombre_cat'];
                $sub_array[] = $row['titulo_chat'];

                $diaFecha = date('d', strtotime($row["fecha"]));
                $mesFecha = date('m', strtotime($row["fecha"])) - 1;
                $yearFecha = date('Y', strtotime($row["fecha"]));

                $sub_array[] = "$diaFecha/$meses[$mesFecha]/$yearFecha";

                if ($row["estado_chat"] == "Abierto")
                {
                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }else {
                    $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                }

                $sub_array[] = '<button type="button" onClick="ver('.$row['id_chat'].');" id="'.$row['id_chat'].'" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

                $data[] = $sub_array;
            }

            // Esto es parte de la documentacion de la libreria para DataTables
            $results = array
            (
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($results);
        break;

        // Mostrar los chats de TODOS los usuarios en el DATATABLE
        case 'listarChatTotal':
            $datos = $chat->listarChatTotal();
            $data = array(); // Declaramos un array

            // Recorremos el resultado de la consulta realizada en el modelo
            foreach($datos as $row)
            {
                $sub_array = array();

                // Generamos las columnas que se mostraran en la vista
                $sub_array[] = '<b>'.$row['id_chat'].'</b>';

                if ($row["id_rol"] == 2)
                {
                    $sub_array[] = '<b>Piscicultor</b>';
                }else {
                    $sub_array[] = '<b>Acuicultor</b>';
                }

                $sub_array[] = $row['nombre_usu'];
                $sub_array[] = $row['apellido_usu'];
                $sub_array[] = $row['titulo_chat'];
                $sub_array[] = $row['nombre_cat'];

                $diaFecha = date('d', strtotime($row["fecha"]));
                $mesFecha = date('m', strtotime($row["fecha"])) - 1;
                $yearFecha = date('Y', strtotime($row["fecha"]));

                $sub_array[] = "$diaFecha/$meses[$mesFecha]/$yearFecha";

                if ($row["estado_chat"] == "Abierto")
                {
                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }else {
                    $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                }

                $sub_array[] = '<button type="button" onClick="ver('.$row['id_chat'].');" id="'.$row['id_chat'].'" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

                $data[] = $sub_array;
            }

            // Esto es parte de la documentacion de la libreria para DataTables
            $results = array
            (
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($results);
        break;
    }
?>