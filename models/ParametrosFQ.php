<?php 

class Parametrosfq extends Conectar
{
    // creamos el metodo insertParafq para hacer un nuevo registro de ParametrosFQ

    public function insertParafq($id_cultivo,$id_usu,$rango_amonio,$rango_nitrito,$rango_nitrato,$rango_ph,$cant_melaza,$porc_agua,$observaciones)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="INSERT INTO  parametrosfq (
            id_par_fq,  
            id_cultivo, 
            id_usu, 
            rango_amonio, 
            rango_nitrito, 
            rango_nitrato, 
            rango_ph, 
            cant_melaza, 
            porc_agua, 
            observaciones, 
            fecha, 
            fecha_elim, 
            est) 
            VALUES 
            (NULL,?,?,?,?,?,?,?,?,?,now(),NULL,1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->bindValue(2, $id_usu);
            $sql->bindValue(3, $rango_amonio);
            $sql->bindValue(4, $rango_nitrito);
            $sql->bindValue(5, $rango_nitrato);
            $sql->bindValue(6, $rango_ph);
            $sql->bindValue(7, $cant_melaza);
            $sql->bindValue(8, $porc_agua);
            $sql->bindValue(9, $observaciones);
            $sql->execute();
        
        return $resultado=$sql->fetchAll();
    }

    //para traer datos del formulario de Parametros FQ y llenar el Datatable
    public function listar_parafq_x_cult($id_cultivo)
    {
        $conectar = parent::Conexion();
        parent::setNames();
        $sql="SELECT
        id_par_fq,
        nombre_usu,
        apellido_usu,
        observaciones,
        parametrosfq.fecha,
        parametrosfq.est
        FROM
        parametrosfq
        INNER join usuario on parametrosfq.id_usu = usuario.id_usu
        WHERE
        parametrosfq.est = 1
        AND id_cultivo=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    // Traemos los datos del Biocrecimiento desde base de datos
    public function getParafq_id($id_par_fq)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql = "SELECT
        id_par_fq,
        id_cultivo,
        id_usu,
        rango_amonio,
        rango_nitrito,
        rango_nitrato,
        rango_ph,
        cant_melaza,
        porc_agua,
        observaciones,
        fecha,
        est
        FROM
        parametrosfq
        WHERE id_par_fq=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_par_fq);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Actualizamos el formato en base de datos
    public function updateParafq($id_par_fq,$id_cultivo,$id_usu,$rango_amonio,$rango_nitrito,$rango_nitrato,$rango_ph,$cant_melaza,$porc_agua,$observaciones){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="UPDATE parametrosfq set
        id_cultivo=?,
        id_usu=?,
        rango_amonio=?,
        rango_nitrito=?,
        rango_nitrato=?,
        rango_ph=?,
        cant_melaza=?,
        porc_agua=?,
        observaciones=?,
        WHERE
        id_par_fq = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->bindValue(2, $id_usu);
        $sql->bindValue(3, $rango_amonio);
        $sql->bindValue(4, $rango_nitrito);
        $sql->bindValue(5, $rango_nitrato);
        $sql->bindValue(6, $rango_ph);
        $sql->bindValue(7, $cant_melaza);
        $sql->bindValue(8, $porc_agua);
        $sql->bindValue(9, $observaciones);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    //para eliminar un formato en base de datos
    public function delete_parafq($id_par_fq){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="UPDATE parametrosfq SET est=0, fecha_elim=now() where id_par_fq = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_par_fq);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>