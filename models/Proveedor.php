<?php 

class Proveedor extends Conectar
{
    // creamos el metodo insertProveedor para insertar un nuevo proveedor
    public function insertProveedor($nombre_emp, $direccion_emp, $telefono_emp, $correo_emp)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="INSERT INTO proveedor (id_prove, nombre_emp, direccion_emp, telefono_emp, correo_emp, fecha, fecha_elim, est) VALUES (NULL,?,?,?,?,now(),NULL,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_emp);
            $sql->bindValue(2, $direccion_emp);
            $sql->bindValue(3, $telefono_emp);
            $sql->bindValue(4, $correo_emp);
            $sql->execute();
        
        return $resultado=$sql->fetchAll();
    }
}

?>