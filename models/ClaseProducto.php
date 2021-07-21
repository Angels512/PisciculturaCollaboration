<?php 
    class ClaseProducto extends Conectar
    {
        // creamos el metodo getClaseProducto para obtener las clases de producto
        public function getClaseProducto()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM claseproducto;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }
?>