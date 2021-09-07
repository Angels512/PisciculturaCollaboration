<?php

    class Responsable extends Conectar
    {
        // creamos el metodo getResponsable para obtener los responsables
        public function getResponsable()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM responsable WHERE est = 1;';
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // creamos el metodo insertResponsable para insertar los nuevos responsables
        public function insertResponsable($nombre_respon,$apellido_respon){

            $conectar= parent::Conexion();
            parent::setnames();

            $sql="INSERT INTO responsable (id_respon, nombre_respon, apellido_respon, fecha_elim, fecha, est) VALUES (NULL,?,?,NULL,now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_respon);
            $sql->bindValue(2, $apellido_respon);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        // Extrae los datos para completar la tabla con cada responsable y mostrarlos en la vista
        public function listarRespon()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM responsable
                    WHERE est = 1;";

            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Traemos los datos del responsable desde base de datos segun su id
        public function getRespon_id($id_respon)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM responsable WHERE id_respon=?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_respon);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        //Actualizamos el responsable en base de datos
        public function updateResponsable($nombre_respon,$apellido_respon,$id_respon){
            $conectar= parent::conexion();
            parent::setNames();
            $sql="UPDATE responsable set
            nombre_respon = ?,
            apellido_respon = ?
            WHERE
            id_respon = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_respon);
            $sql->bindValue(2, $apellido_respon); 
            $sql->bindValue(3, $id_respon); 
            $sql->execute();

        return $resultado=$sql->fetchAll();
        }

        //para eliminar un responsable en base de datos
        public function delete_respon($id_respon){
            $conectar= parent::conexion();
            parent::setNames();

            $sql="UPDATE responsable SET est=0, fecha_elim=now() where id_respon = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_respon);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }

?>