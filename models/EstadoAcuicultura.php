<?php 

class EstadoAcuicultura extends Conectar
{
    // creamos el metodo insertEstacui para hacer un nuevo registro del Estado General del Modulo de Acuicultura
    public function insertEstacui($id_cultivo,$id_usu,$obser_gene)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="INSERT INTO  estacuicultura (
            id_est_acui, 
            id_cultivo, 
            id_usu, 
            obser_gene, 
            fecha, 
            fecha_elim, 
            est) 
            VALUES 
            (NULL,?,?,?,?,?,?,now(),NULL,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->bindValue(2, $id_usu);
            $sql->bindValue(3, $obser_gene);
            $sql->execute();
        
        return $resultado=$sql->fetchAll();
    }
}

?>