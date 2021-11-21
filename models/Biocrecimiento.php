<?php

class Biocrecimiento extends Conectar
{
    // creamos el metodo insertBiocre para hacer un nuevo registro de Biocrecimiento
    public function insertBiocre($id_etapa ,$id_cultivo,$id_usu,$num_organ,$peso_organ,$peso_biomasa,$edad_organ,$color_organ,$escamas_organ,$ojos_organ,$compor_organ,$crecimiento_organ,$obser_adic )
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="INSERT INTO  biocrecimiento (
            id_biocre,
            id_etapa,
            id_cultivo,
            id_usu,
            num_organ,
            peso_organ,
            peso_biomasa,
            edad_organ,
            color_organ,
            escamas_organ,
            ojos_organ,
            compor_organ,
            crecimiento_organ,
            obser_adic,
            fecha,
            fecha_elim,
            est)
            VALUES
            (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),NULL,1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_etapa);
            $sql->bindValue(2, $id_cultivo);
            $sql->bindValue(3, $id_usu);
            $sql->bindValue(4, $num_organ);
            $sql->bindValue(5, $peso_organ);
            $sql->bindValue(6, $peso_biomasa);
            $sql->bindValue(7, $edad_organ);
            $sql->bindValue(8, $color_organ);
            $sql->bindValue(9, $escamas_organ);
            $sql->bindValue(10, $ojos_organ);
            $sql->bindValue(11, $compor_organ);
            $sql->bindValue(12, $crecimiento_organ);
            $sql->bindValue(13, $obser_adic); 
            $sql->execute();
        
        return $resultado=$sql->fetchAll();
    }

    //para traer datos del formulario de Biocrecimiento y llenar el Datatable
    public function listar_biocre_x_cult($id_cultivo)
    {
        $conectar = parent::Conexion();
        parent::setNames();
        $sql="SELECT
        id_biocre,
        nombre_usu,
        apellido_usu,
        num_organ,
        compor_organ,
        biocrecimiento.fecha,
        biocrecimiento.est
        FROM
        biocrecimiento
        INNER join usuario on biocrecimiento.id_usu = usuario.id_usu
        WHERE
        biocrecimiento.est = 1
        AND id_cultivo=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    // Traemos los datos del Biocrecimiento desde base de datos
    public function getBiocre_id($id_biocre)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql = "SELECT
        id_biocre,
        id_etapa,
        id_cultivo,
        id_usu,
        num_organ,
        peso_organ,
        peso_biomasa,
        edad_organ,
        color_organ,
        escamas_organ,
        ojos_organ,
        compor_organ,
        crecimiento_organ,
        obser_adic,
        fecha,
        est
        FROM
        biocrecimiento
        WHERE id_biocre=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_biocre);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Actualizamos el formato en base de datos
    public function updateBiocre( $id_biocre,$id_etapa,$id_cultivo,$id_usu,$num_organ,$peso_organ,$peso_biomasa,$edad_organ,$color_organ,$escamas_organ,$ojos_organ,$compor_organ,$crecimiento_organ,$obser_adic){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="UPDATE biocrecimiento set
        id_etapa=?,
        id_cultivo=?,
        id_usu=?,
        num_organ=?,
        peso_organ=?,
        peso_biomasa=?,
        edad_organ=?,
        color_organ=?,
        escamas_organ=?,
        ojos_organ=?,
        compor_organ=?,
        crecimiento_organ=?,
        obser_adic=?
        WHERE
        id_biocre = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_etapa);
        $sql->bindValue(2, $id_cultivo);
        $sql->bindValue(3, $id_usu);
        $sql->bindValue(4, $num_organ);
        $sql->bindValue(5, $peso_organ);
        $sql->bindValue(6, $peso_biomasa);
        $sql->bindValue(7, $edad_organ);
        $sql->bindValue(8, $color_organ);
        $sql->bindValue(9, $escamas_organ);
        $sql->bindValue(10, $ojos_organ);
        $sql->bindValue(11, $compor_organ);
        $sql->bindValue(12, $crecimiento_organ);
        $sql->bindValue(13, $obser_adic);
        $sql->bindValue(14, $id_biocre);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    //para eliminar un formato en base de datos
    public function delete_biocre($id_biocre){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="UPDATE biocrecimiento SET est=0, fecha_elim=now() where id_biocre = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_biocre);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    //se consultan los atributos de los que sacaremos el numero de organismos para biocrecimiento
    public function atri_derivado1($id_cultivo){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="SELECT (SELECT SUM(reg_mortandad) FROM mortalidad WHERE id_cultivo=?) reg_mortandad,
        (SELECT cant_siembra FROM cultivo WHERE id_cultivo=?) cant_siembra;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->bindValue(2, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    //se consultan los atributos de los que sacaremos la edad de los organismos para biocrecimiento
    public function atri_derivado2($id_cultivo){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="SELECT COUNT(id_biocre) cant_fomatos
        FROM biocrecimiento
        WHERE id_cultivo=?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>