<?php

    class Estanque extends Conectar
    {
        // Obtenemos todos los estanques para mostrarlos en un SELECT
        public function getEstanque()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM estanque WHERE est=1 ORDER BY id_tanque ASC;';
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
        
        // creamos el metodo insertEstanque para insertar los nuevos estanques
        public function insertEstanque($num_tanque,$capacidad_tanque,$desc_tanque){

            $conectar= parent::Conexion();
            parent::setnames();

            $sql="INSERT INTO estanque (id_tanque, num_tanque, capacidad_tanque, desc_tanque, fecha, est) VALUES (NULL,?,?,?,NULL,now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $num_tanque);
            $sql->bindValue(2, $capacidad_tanque);
            $sql->bindValue(3, $desc_tanque);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        // Extrae los datos para completar la tabla con cada estanque y mostrarlos en la vista
        public function listarEstanque()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM estanque
                    WHERE est = 1;";

            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Traemos los datos del estanque desde base de datos segun su id
        public function getEstanque_id($id_tanque)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM estanque WHERE id_tanque=?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_tanque);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        //Actualizamos el estanque en base de datos
        public function updateEstanque($num_tanque,$capacidad_tanque,$desc_tanque,$id_tanque){
            $conectar= parent::conexion();
            parent::setNames();
            $sql="UPDATE estanque set
            num_tanque = ?,
            capacidad_tanque = ?,
            desc_tanque = ?
            WHERE
            id_tanque = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $num_tanque);
            $sql->bindValue(2, $capacidad_tanque);
            $sql->bindValue(2, $desc_tanque);
            $sql->bindValue(4, $id_tanque); 
            $sql->execute();

            return $resultado=$sql->fetchAll();
        }

        //para eliminar un estanque en base de datos
        public function delete_estanque($id_tanque){
            $conectar= parent::conexion();
            parent::setNames();

            $sql="UPDATE estanque SET est=0, fecha_elim=now() where id_tanque = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_tanque);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }

?>