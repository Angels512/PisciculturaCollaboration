<?php 

    class Producto extends Conectar{

        // creamos el metodo getNombreProducto para obtener los nombres de los productos
        public function getNombreProducto(){

            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT id_produ, nombre_clase, num_lote, fech_venc FROM producto INNER JOIN claseproducto on producto.id_clase = claseproducto.id_clase WHERE producto.est = 1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }


        // creamos el metodo getNombreProveedor para obtener los nombres de proveedores
        public function getNombreProveedor(){

            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM proveedor WHERE est = 1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // creamos el metodo insertProducts para insertar los nuevos productos
        public function insertProducts($id_prove, $id_clase, $fech_venc, $num_lote){

            $conectar= parent::Conexion();
            parent::setnames();

            $sql="INSERT INTO producto (id_produ, id_prove, id_clase, fech_venc, num_lote, fecha, fecha_elim, est) VALUES (NULL,?,?,?,?,now(),NULL,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_prove);
            $sql->bindValue(2, $id_clase);
            $sql->bindValue(3, $fech_venc);
            $sql->bindValue(4, $num_lote);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>