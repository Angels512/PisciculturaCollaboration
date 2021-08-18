<?php 

class TemperaturaAgua extends Conectar
{
    // creamos el metodo insertTempagua para hacer un nuevo registro de Temperatura del Agua
    public function insertTempamb($id_cultivo,$id_usu,$num_dia,$grados1,$grados2,$grados3)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="INSERT INTO  tempagua (
            id_temp_agua, 
            id_cultivo, 
            id_usu, 
            num_dia, 
            grados1, 
            grados2, 
            grados3, 
            fecha, 
            fecha_elim, 
            est) 
            VALUES 
            (NULL,?,?,?,?,?,?,now(),NULL,'1');";
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
}

?>