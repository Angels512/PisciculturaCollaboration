<?php 

class ParametrosFQ extends Conectar
{
    // creamos el metodo insertParafq para hacer un nuevo registro de Parametros FQ
    public function insertParafq($id_cultivo,$id_usu,$rango_amonio,$rango_nitrito,$rango_nitrato,$rango_ph,$cant_melaza,$porc_agua,$observaciones)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="INSERT INTO  parametrosfq (
            id_para_fq, 
            id_cultivo, 
            id_usu, 
            rango_amonio, 
            rango_nitrito, 
            rango_nitrato, 
            rango_ph, 
            cant_melaza, 
            porc_agua, 
            observaiciones, 
            fecha, 
            fecha_elim, 
            est) 
            VALUES 
            (NULL,?,?,?,?,?,?,?,?,?,now(),NULL,'1');";
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
}

?>