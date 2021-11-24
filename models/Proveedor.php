<?php

class Proveedor extends Conectar
{
    // creamos el metodo insertProveedor para insertar un nuevo proveedor
    public function insertProveedor($nombre_emp, $direccion_emp, $telefono_emp, $correo_emp)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="CALL sp_insertProveedor(?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_emp);
            $sql->bindValue(2, $direccion_emp);
            $sql->bindValue(3, $telefono_emp);
            $sql->bindValue(4, $correo_emp);
            $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    // Traemos los datos del proveedor desde base de datos
    public function getProve_id($id_prove)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql = "SELECT * FROM proveedor WHERE id_prove=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_prove);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Actualizamos el proveedor en base de datos
    public function updateProveedor( $id_prove , $nombre_emp ,$direccion_emp, $telefono_emp, $correo_emp){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="CALL sp_updateProveedor(?,?,?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre_emp);
        $sql->bindValue(2, $direccion_emp);
        $sql->bindValue(3, $telefono_emp);
        $sql->bindValue(4, $correo_emp);
        $sql->bindValue(5, $id_prove);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    //para eliminar un proveedor en base de datos
    public function delete_proveedor($id_prove){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="CALL sp_delete_proveedor(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_prove);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>