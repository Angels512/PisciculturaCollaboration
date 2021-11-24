<?php

class Tblalimentacion extends Conectar
{
    // creamos el metodo insertTblalim para hacer un nuevo registro de Tabla de Alimentación
    public function insertTblalim($id_produ ,$id_cultivo, $id_usu, $cant_siembra, $porc_proteina, $hora_sum_alim1, $hora_sum_alim2,$hora_sum_alim3, $obser_atmo, $obser_gen_cult )
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="CALL sp_insertTblalim(?,?,?,?,?,?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_produ);
            $sql->bindValue(2, $id_cultivo);
            $sql->bindValue(3, $id_usu);
            $sql->bindValue(4, $cant_siembra);
            $sql->bindValue(5, $porc_proteina);
            $sql->bindValue(6, $hora_sum_alim1);
            $sql->bindValue(7, $hora_sum_alim2);
            $sql->bindValue(8, $hora_sum_alim3);
            $sql->bindValue(9, $obser_atmo);
            $sql->bindValue(10, $obser_gen_cult);
            $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    //listar datos del formato para llenar el Datatable
    public function listar_tblalim_x_cult($id_cultivo)
    {
        $conectar = parent::Conexion();
        parent::setNames();
        $sql="SELECT
        id_tbl_alim,
        nombre_usu,
        apellido_usu,
        cant_siembra,
        obser_gen_cult,
        tblalimentacion.fecha,
        tblalimentacion.est
        FROM
        tblalimentacion
        INNER join usuario on tblalimentacion.id_usu = usuario.id_usu
        WHERE
        tblalimentacion.est = 1
        AND id_cultivo=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    // Traemos los datos del formulario tbl alimentacion desde base de datos
    public function getAlim_id($id_tbl_alim)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql = "SELECT
        id_tbl_alim,
        id_produ,
        id_cultivo,
        id_usu,
        cant_siembra,
        porc_proteina,
        hora_sum_alim1,
        hora_sum_alim2,
        hora_sum_alim3,
        obser_atmo,
        obser_gen_cult,
        fecha,
        est
        FROM
        tblalimentacion
        WHERE id_tbl_alim=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_tbl_alim);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Actualizamos el formato en base de datos
    public function updateTblAlim($id_tbl_alim, $id_produ ,$id_cultivo, $id_usu, $cant_siembra, $porc_proteina, $hora_sum_alim1, $hora_sum_alim2,$hora_sum_alim3, $obser_atmo, $obser_gen_cult ){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="CALL sp_updateTblAlim(?,?,?,?,?,?,?,?,?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_produ);
        $sql->bindValue(2, $id_cultivo);
        $sql->bindValue(3, $id_usu);
        $sql->bindValue(4, $cant_siembra);
        $sql->bindValue(5, $porc_proteina);
        $sql->bindValue(6, $hora_sum_alim1);
        $sql->bindValue(7, $hora_sum_alim2);
        $sql->bindValue(8, $hora_sum_alim3);
        $sql->bindValue(9, $obser_atmo);
        $sql->bindValue(10, $obser_gen_cult);
        $sql->bindValue(11, $id_tbl_alim);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    //para eliminar un formato en base de datos
    public function delete_tblalm($id_tbl_alim){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="CALL sp_delete_tblalm(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_tbl_alim);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    //se consultan los atributos de los que sacaremos el numero de organismos para tblalimentacion
    public function atri_deri($id_cultivo){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="SELECT (SELECT SUM(reg_mortandad) FROM mortalidad WHERE id_cultivo=?) reg_mortanda,
        (SELECT cant_siembra FROM cultivo WHERE id_cultivo=?) num_siembra;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->bindValue(2, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>