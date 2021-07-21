<?php 

    require_once('../config/conexion.php');
    require_once('../models/Proveedor.php');

    $proveedor = new Proveedor();

    switch ($_GET['op'])
    {
        // Para insertar los proveedores 
        case "insertproveedor":
            $proveedor->insertProveedor($_POST["nombre_emp"],$_POST["direccion_emp"],$_POST["telefono_emp"],$_POST["correo_emp"]);
        break;

    }

?>