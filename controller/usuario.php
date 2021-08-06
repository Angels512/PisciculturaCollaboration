<?php

    require_once('../config/conexion.php');
    require_once('../models/Usuario.php');
    require_once('../models/Email.php');

    $usuario = new Usuario();
    $email = new Email();

    switch ($_GET['op'])
    {
        // Selecciona los datos del usuario que se llamo por el documento para restablecer la clave
        case 'selectUserReset':
            $datos = $usuario->seletUserReset($_POST['documento_usu']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_usu"] = $row["id_usu"];
                    $output["nombre_usu"] = $row["nombre_usu"];
                    $output["apellido_usu"] = $row["apellido_usu"];
                    $output["documento_usu"] = $row["documento_usu"];
                    $output["correo_usu"] = $row["correo_usu"];
                }
                echo json_encode($output);
            }
        break;

        // Se envia el EMAIL con el enlace y codigo para restablecer la clave
        case 'sendMail':
            $usuario->sendMail($_POST['id_usu'], $_POST['nombre_usu'], $_POST['apellido_usu'], $_POST['correo_usu']);
        break;

        // Se verifica que el token de la persona sea el mismo que esta en la base de datos para realizar el cambio
        case 'verificarToken':
            $datos = $usuario->verifyToken($_POST['id_usu'], $_POST['codigo'], $_POST['token']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output['codigo'] = $row['codigo'];
                    $output['id_usu'] = $row['id_usu'];
                    $output['token'] = $row['token'];
                    $output['fecha'] = $row['fecha'];
                }
                echo json_encode($output);
            }
        break;

        // Se ejecuta la actualizacion de la contraseña en la base de datos
        case 'restPassword':
            $usuario->restPassword($_POST['id_usu'], $_POST['pass_usu']);
        break;



        // Vamos a crear un usuario
        case 'create':
            $usuario->createUser($_POST['id_rol'], $_POST['nombre_usu'], $_POST['apellido_usu'], $_POST['direccion_usu'], $_POST['telefono_usu'], $_POST['documento_usu'], $_POST['correo_usu']);

            $datos = $usuario->seletUserReset($_POST['documento_usu']);
            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $nombre_usu = $row["nombre_usu"]. ' ' .$row["apellido_usu"];
                    $documento_usu = $row["documento_usu"];
                    $correo_usu = $row["correo_usu"];
                    $pass_usu = $row["pass_usu"];
                }
            }

            $email->createUser($nombre_usu, $documento_usu, $correo_usu, $pass_usu);
        break;

        // Verificamos el documento y el token en la base de datos
        case 'verifyData':
            $datos = $usuario->verifyData($_POST['token'], $_POST['documento_usu']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output['id_usu'] = $row['id_usu'];
                    $output['documento_usu'] = $row['documento_usu'];
                }
                echo json_encode($output);
            }
        break;

        // Vamos a crear o actualizar a un usuario
        case 'addDataUser':
            $usuario->addDataUser($_POST['documento_usu'], $_POST['direccion_usu'], $_POST['telefono_usu'], $_POST['pass_usu']);
        break;

        // Vamos a actualizar un usuario
        case 'update':
            $usuario->updateUser($_POST['id_rol'], $_POST['nombre_usu'], $_POST['apellido_usu'], $_POST['direccion_usu'], $_POST['telefono_usu'], $_POST['documento_usu'], $_POST['correo_usu'], $_POST['id_usu']);
        break;



        // Vamos a eliminar al usuario del sistema (Inactivarlo)
        case 'delete':
            $usuario->deleteUser($_POST['id_usu']);
        break;


        // Vamos a listar los usuarios en el DataTable
        case 'listarUsuarios':
            $datos = $usuario->getUser();
            $data = array(); // Declaramos un array

            // Recorremos el resultado de la consulta realizada en el modelo
            foreach($datos as $row)
            {
                $sub_array = array();

                // Generamos las columnas que se mostraran en la vista
                $sub_array[] = $row['nombre_usu'];
                $sub_array[] = $row['apellido_usu'];
                $sub_array[] = $row['documento_usu'];
                $sub_array[] = $row['telefono_usu'];
                $sub_array[] = $row['direccion_usu'];
                $sub_array[] = $row['correo_usu'];

                if ($row["id_rol"] == "2")
                {
                    $sub_array[] = '<span class="label label-pill label-success">Piscicultor</span>';
                }else {
                    $sub_array[] = '<span class="label label-pill label-primary">Acuicultor</span>';
                }

                $sub_array[] = '<button type="button" onClick="editar('.$row['id_usu'].');" id="'.$row['id_usu'].'" class="btn btn-inline btn-warning btn-sm ladda-button"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row['id_usu'].');" id="'.$row['id_usu'].'" class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash"></i></div></button>';

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


        // Extrae todos los datos del USUARIO para mostrarlos (Nombre, Apellidos, Documento, Rol, Etc)
        case 'listarDatosUsu':
            $datos = $usuario->getUser_id($_POST['id_usu']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_usu"] = $row["id_usu"];
                    $output["id_rol"] = $row["id_rol"];
                    $output["nombre_usu"] = $row["nombre_usu"];
                    $output["apellido_usu"] = $row["apellido_usu"];
                    $output["direccion_usu"] = $row["direccion_usu"];
                    $output["telefono_usu"] = $row["telefono_usu"];
                    $output["correo_usu"] = $row["correo_usu"];
                    $output["documento_usu"] = $row["documento_usu"];
                    $output["pass_usu"] = $row["pass_usu"];
                    $output["fecha_edit"] = date('d/m/Y', strtotime($row["fecha_edit"]));
                    $output["fecha"] = date('d/m/Y', strtotime($row["fecha"]));
                }
                echo json_encode($output);
            }
        break;



        // Actualizar perfil
        case 'updatePerfil':
            $usuario->updatePerfil($_POST['direccion_usu'], $_POST['telefono_usu'], $_POST['pass_usu'], $_POST['id_usu']);
        break;

        // Actualizar perfil
        case 'updatePasswordPerfil':
            $usuario->updatePasswordPerfil($_POST['direccion_usu'], $_POST['telefono_usu'], $_POST['pass_usu'], $_POST['id_usu']);
        break;
    }
?>