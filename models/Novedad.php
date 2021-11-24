<?php

class Novedad extends Conectar
{
    // creamos el metodo insertNovedad para hacer un nuevo registro de novedad
    public function insertNovedad($id_cultivo, $medidad_prev)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="CALL sp_insertNovedad(?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->bindValue(2, $medidad_prev);
            $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    //para llenar el datatable de novedades por cultivo
    public function listar_novedad_x_cult($id_cultivo)
    {
        $conectar = parent::Conexion();
        parent::setNames();
        $sql="SELECT
        id_novedad,
        medidad_prev,
        fecha
        FROM
        novedad
        WHERE
        id_cultivo=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

}

?>