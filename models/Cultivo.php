<?php

    class Cultivo extends Conectar
    {
        // Extrae los datos para completar los articulos de cada cultivo y mostrarlos en la vista
        public function listarCultivo()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT cultivo.id_cultivo, cultivo.num_lote, cultivo.cant_siembra, cultivo.fecha, cultivo.fecha_cierre,
                    estanque.num_tanque,
                    responsable.nombre_respon, responsable.apellido_respon
                    FROM cultivo
                    INNER JOIN estanque ON cultivo.id_tanque = estanque.id_tanque
                    INNER JOIN responsable ON cultivo.id_respon = responsable.id_respon
                    WHERE cultivo.est = 1 ORDER BY id_cultivo ASC;";

            $sql = $conectar->prepare($sql);
            // $sql->bindValue(1, $id_cultivo);
            // $sql->bindValue(2, $id_cultivo);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Obtiene todos los datos especificos de un cultivo para mostrarlos en la vista
        public function getCultivo_id($id_cultivo)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM cultivo WHERE id_cultivo = ?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Crear un nuevo cultivo
        public function createCultivo($id_respon, $id_tanque, $num_lote, $cant_siembra)
        {
            $fechaActual = date("Y-m-d");
            $fechaFinal = date("Y-m-d", strtotime($fechaActual."+ 182 days"));

            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'INSERT INTO cultivo(id_cultivo, id_respon, id_tanque, num_lote, cant_siembra, fecha_cierre, fecha, est) VALUES (NULL, ?, ?, ?, ?, ?, now(), 1);';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_respon);
            $sql->bindValue(2, $id_tanque);
            $sql->bindValue(3, $num_lote);
            $sql->bindValue(4, $cant_siembra);
            $sql->bindValue(5, $fechaFinal);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Actualizar un cultivo ya existente
        public function updateCultivo($id_respon, $id_tanque, $num_lote, $cant_siembra, $id_cultivo)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'UPDATE cultivo SET id_respon=?, id_tanque=?, num_lote=?, cant_siembra=? WHERE id_cultivo=?';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_respon);
            $sql->bindValue(2, $id_tanque);
            $sql->bindValue(3, $num_lote);
            $sql->bindValue(4, $cant_siembra);
            $sql->bindValue(5, $id_cultivo);
            $sql->execute();
        }

        // Eliminar un cultivo (INACTIVAR)
        public function deleteCultivo($id_cultivo)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'UPDATE cultivo SET est=0 WHERE id_cultivo=?';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }




        // Selecciona un cultivo que ya cumplio su tiempo de 6 meses
        public function getCultivoVencido()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $fecha = date("Y-m-d");
            // $fechaActual = date("Y-m-d", strtotime($fecha."- 1 days"));

            $sql = "SELECT * FROM cultivo WHERE fecha_cierre <= CURDATE() AND est=1;";
            $sql = $conectar->prepare($sql);
            // $sql->bindValue(1, $fecha);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Inactiva el cultivo que que ya cumplio su tiempo de 6 meses
        public function deleteCultivoVencido($id_cultivo)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'UPDATE cultivo SET est=0 WHERE id_cultivo=?';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }



        // creamos el metodo getCultivo para obtener los cultivos que estan activos y llenar los select
        public function getCultivo(){

            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT id_cultivo, num_tanque, num_lote FROM cultivo INNER JOIN estanque on cultivo.id_tanque = estanque.id_tanque WHERE cultivo.est = 1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }

?>