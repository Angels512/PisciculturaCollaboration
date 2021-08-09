<?php 

    require_once('../config/conexion.php');
    require_once('../models/Proveedor.php');

    $proveedor = new Proveedor();

    switch ($_GET['op'])
    {
        // Para insertar los proveedores 
        case "guardar":
            $proveedor->insertProveedor($_POST["nombre_emp"],$_POST["direccion_emp"],$_POST["telefono_emp"],$_POST["correo_emp"]);   
        break;

        // Para actualizar los proveedores por su id 
        case "editar":
            $proveedor->updateProveedor( $_POST["id_prove"] ,$_POST["nombre_emp"] ,$_POST["direccion_emp"],$_POST["telefono_emp"],$_POST["correo_emp"]); 
        break;

        // Extrae todos los datos del PROVEEDOR para mostrarlos 
        case 'listarDatosProve':
            $datos = $proveedor->getProve_id($_POST['id_prove']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_prove"] = $row["id_prove"];
                    $output["nombre_emp"] = $row["nombre_emp"];
                    $output["direccion_emp"] = $row["direccion_emp"];
                    $output["telefono_emp"] = $row["telefono_emp"];
                    $output["correo_emp"] = $row["correo_emp"];
                    
                }
                echo json_encode($output);
            }
        break;

        //para eliminar un proveedor por su id 
        case "eliminar":
            $proveedor->delete_proveedor($_POST["id_prove"]);
        break;

    }

?>