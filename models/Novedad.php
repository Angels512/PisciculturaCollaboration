<?php 

class Novedad extends Conectar
{
    // creamos el metodo insertNovedad para hacer un nuevo registro de novedad
    public function insertNovedad($id_cultivo, $medidad_prev)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="INSERT INTO novedad (id_novedad, id_cultivo, medidad_prev, fecha) VALUES (NULL,?,?,now());";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->bindValue(2, $medidad_prev);
            $sql->execute();
        
        return $resultado=$sql->fetchAll();
    }
}

?>