<?php

    class Responsable extends Conectar
    {
        public function getResponsable()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM responsable WHERE est = 1;';
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }

?>