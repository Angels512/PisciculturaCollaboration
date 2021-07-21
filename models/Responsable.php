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

        // creamos el metodo getResponsable_x_nombre para consultar los responmsables por nombre
        public function getResponsable_x_nombre($nombre_respon)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM responsable WHERE nombre_respon= ? AND est = 1;';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombre_respon);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }

?>