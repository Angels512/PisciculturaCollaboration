<?php

    class Categoria extends Conectar
    {
        // Obtener categorias mostradas en el chat
        public function getCategoria()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM categoria;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }

?>