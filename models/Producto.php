<?php

    class Producto extends Conectar{

        // creamos el metodo getNombreProducto para obtener los nombres de los productos
        public function getNombreProducto(){

            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT id_produ, nombre_clase, num_lote, fech_venc FROM producto INNER JOIN claseproducto on producto.id_clase = claseproducto.id_clase WHERE producto.est = 1 ORDER BY id_produ ASC;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }


        // creamos el metodo getNombreProveedor para obtener los nombres de proveedores
        public function getNombreProveedor(){

            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM proveedor WHERE est = 1 ORDER BY id_prove ASC;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Traemos los datos del producto desde base de datos
        public function getProdu_id($id_produ)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT
            id_produ,
            producto.id_clase,
            producto.id_prove,
            nombre_clase,
            fech_venc,
            num_lote,
            nombre_emp
            FROM
            producto
            INNER JOIN claseproducto ON producto.id_clase=claseproducto.id_clase
            INNER JOIN proveedor ON producto.id_prove=proveedor.id_prove
            WHERE
            id_produ=?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_produ);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // creamos el metodo insertProducts para insertar los nuevos productos
        public function insertProducts($id_prove, $id_clase, $fech_venc, $num_lote){

            $conectar= parent::Conexion();
            parent::setnames();

            $sql="CALL sp_insertProducts(?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_prove);
            $sql->bindValue(2, $id_clase);
            $sql->bindValue(3, $fech_venc);
            $sql->bindValue(4, $num_lote);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        //Actualizamos el producto en base de datos
        public function updateProducto( $id_produ , $id_clase ,$fech_venc, $num_lote, $id_prove){
            $conectar= parent::conexion();
            parent::setNames();
            $sql="CALL sp_updateProducto(?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_clase);
            $sql->bindValue(2, $fech_venc);
            $sql->bindValue(3, $num_lote);
            $sql->bindValue(4, $id_prove);
            $sql->bindValue(5, $id_produ);
            $sql->execute();

            return $resultado=$sql->fetchAll();
        }

        //para eliminar un proveedor en base de datos
        public function delete_producto($id_produ){
            $conectar= parent::conexion();
            parent::setNames();
            $sql="CALL sp_delete_producto(?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_produ);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>