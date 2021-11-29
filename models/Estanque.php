<?php

    class Estanque extends Conectar
    {
        // creamos el metodo getEstanque para obtener los estanques
        public function getEstanque()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM estanque WHERE est = 1;';
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // creamos el metodo insertEstanque para insertar los nuevos estanques
        public function insertEstanque($num_tanque,$capacidad_tanque,$desc_tanque){

            $conectar= parent::Conexion();
            parent::setnames();

            $sql="CALL sp_insertEstanque(?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $num_tanque);
            $sql->bindValue(2, $capacidad_tanque);
            $sql->bindValue(3, $desc_tanque);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        // Extrae los datos para completar la tabla con cada estanque y mostrarlos en la vista
        public function listarTanque()
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
        public function getTanque_id($id_tanque)
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
        public function updateEstanque($id_tanque,$num_tanque,$capacidad_tanque,$desc_tanque){
            $conectar= parent::conexion();
            parent::setNames();
            $sql="CALL sp_updateEstanque(?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $num_tanque);
            $sql->bindValue(2, $capacidad_tanque);
            $sql->bindValue(3, $desc_tanque);
            $sql->bindValue(4, $id_tanque);
            $sql->execute();

        return $resultado=$sql->fetchAll();
        }

        //para eliminar un estanque en base de datos
        public function delete_tanque($id_tanque){
            $conectar= parent::conexion();
            parent::setNames();

            $sql="CALL sp_delete_estanque(?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_tanque);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        // Verifica que no se repita el numero de tanque
        public function validarNum($id_tanque)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM estanque WHERE num_tanque=? AND est=1;';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_tanque);
            $sql->execute();

            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>