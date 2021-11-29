<?php 

class Tempamb extends Conectar
{
    // creamos el metodo insertTempamb para hacer un nuevo registro de Temperatura Ambiente
    public function insertTempamb($id_cultivo,$id_usu,$num_dia,$grados1,$grados2,$grados3)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="CALL sp_insertTempamb(?,?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->bindValue(2, $id_usu);
            $sql->bindValue(3, $num_dia);
            $sql->bindValue(4, $grados1);
            $sql->bindValue(5, $grados2);
            $sql->bindValue(6, $grados3);
            $sql->execute();
        
        return $resultado=$sql->fetchAll();
    }

    //para traer datos del formulario de Temperatura Ambiente y llenar el Datatable
    public function listar_tempamb_x_cult($id_cultivo)
    {
        $conectar = parent::Conexion();
        parent::setNames();
        $sql="SELECT
        id_temp_amb,
        nombre_usu,
        apellido_usu,
        num_dia,
        tempambiente.fecha,
        tempambiente.est
        FROM
        tempambiente
        INNER join usuario on tempambiente.id_usu = usuario.id_usu
        WHERE
        tempambiente.est = 1
        AND id_cultivo=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    // Traemos los datos de la Temperatura Ambiente desde base de datos
    public function getTempamb_id($id_temp_amb)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql = "SELECT
        id_temp_amb,
        id_cultivo,
        id_usu,
        num_dia,
        grados1,
        grados2,
        grados3,
        fecha,
        est
        FROM
        tempambiente
        WHERE id_temp_amb=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_temp_amb);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Actualizamos el formato en base de datos
    public function updateTempamb($id_temp_amb,$id_cultivo,$id_usu,$num_dia,$grados1,$grados2,$grados3 ){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="CALL sp_updateTempamb(?,?,?,?,?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->bindValue(2, $id_usu);
        $sql->bindValue(3, $num_dia);
        $sql->bindValue(4, $grados1);
        $sql->bindValue(5, $grados2);
        $sql->bindValue(6, $grados3);
        $sql->bindValue(7, $id_temp_amb);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    //para eliminar un formato en base de datos
    public function delete_tempamb($id_temp_amb){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="CALL sp_delete_tempamb(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_temp_amb);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>