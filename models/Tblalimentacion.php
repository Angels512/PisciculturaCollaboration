<?php 

class Tblalimentacion extends Conectar
{
    // creamos el metodo insertTblalim para hacer un nuevo registro de Tabla de Alimentación
    public function insertTblalim($id_produ ,$id_cultivo, $id_usu, $cant_siembra, $porc_proteina, $hora_sum_alim1, $hora_sum_alim2,$hora_sum_alim3, $obser_atmo, $obser_gen_cult )
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="INSERT INTO tblalimentacion (
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
            fecha_elim, 
            est) VALUES
            (NULL,?,?,?,?,?,?,?,?,?,?,now(),NULL,1);";
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
}

?>