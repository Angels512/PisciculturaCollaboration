<?php

    class Estanque extends Conectar
    {
        // Obtenemos todos los estanques para mostrarlos en un SELECT
        public function getEstanque()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM estanque WHERE est=1;';
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }

?>