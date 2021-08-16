<?php
    class Etapa extends Conectar
    {
        // creamos el metodo getEtapa para obtener las etapas
        public function getEtapa()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM etapa ORDER BY id_etapa ASC;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }
?>