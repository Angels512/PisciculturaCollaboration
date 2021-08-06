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
}

?>