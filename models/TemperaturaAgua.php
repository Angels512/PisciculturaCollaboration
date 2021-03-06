<?php 

class Tempagua extends Conectar
{
    // creamos el metodo insertTempagua para hacer un nuevo registro de Temperatura Agua
    public function insertTempagua($id_cultivo,$id_usu,$num_dia,$grados1,$grados2,$grados3)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="CALL sp_insertTempagua(?,?,?,?,?,?)";
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

    //para traer datos del formulario de Temperatura Agua y llenar el Datatable
    public function listar_tempagua_x_cult($id_cultivo)
    {
        $conectar = parent::Conexion();
        parent::setNames();
        $sql="SELECT
        id_temp_agua,
        nombre_usu,
        apellido_usu,
        num_dia,
        tempagua.fecha,
        tempagua.est
        FROM
        tempagua
        INNER join usuario on tempagua.id_usu = usuario.id_usu
        WHERE
        tempagua.est = 1
        AND id_cultivo=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    // Traemos los datos de la Temperatura Agua desde base de datos
    public function getTempagua_id($id_temp_agua)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql = "SELECT
        id_temp_agua,
        id_cultivo,
        id_usu,
        num_dia,
        grados1,
        grados2,
        grados3,
        fecha,
        est
        FROM
        tempagua
        WHERE id_temp_agua=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_temp_agua);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Actualizamos el formato en base de datos
    public function updateTempagua($id_temp_agua,$id_cultivo,$id_usu,$num_dia,$grados1,$grados2,$grados3 ){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="CALL sp_updateTempagua(?,?,?,?,?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->bindValue(2, $id_usu);
        $sql->bindValue(3, $num_dia);
        $sql->bindValue(4, $grados1);
        $sql->bindValue(5, $grados2);
        $sql->bindValue(6, $grados3);
        $sql->bindValue(7, $id_temp_agua);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    //para eliminar un formato en base de datos
    public function delete_tempagua($id_temp_agua){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="CALL sp_delete_tempagua(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_temp_agua);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    //se consultan los atributos de los que sacaremos el numero de organismos para biocrecimiento
    public function atri_derivado1($id_cultivo){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="SELECT fecha FROM cultivo WHERE id_cultivo=?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>