<?php

class Mortalidad extends Conectar
{
    // creamos el metodo nsertMortalidad para hacer un nuevo registro de mortandad
    public function insertMortalidad($id_cultivo, $reg_mortandad)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="CALL sp_insertMortalidad(?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->bindValue(2, $reg_mortandad);
            $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    //para llenar el datatable de mortalidad por cultivo
    public function listar_mortalidad_x_cult($id_cultivo)
    {
        $conectar = parent::Conexion();
        parent::setNames();
        $sql="SELECT
        id_mortalidad,
        reg_mortandad,
        fecha
        FROM
        mortalidad
        WHERE
        id_cultivo=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>