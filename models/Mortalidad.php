<?php 

class Mortalidad extends Conectar
{
    // creamos el metodo nsertMortalidad para hacer un nuevo registro de mortandad
    public function insertMortalidad($id_cultivo, $reg_mortandad)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql="INSERT INTO mortalidad (id_mortalidad, id_cultivo, reg_mortandad, fecha) VALUES (NULL,?,?,now());";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->bindValue(2, $reg_mortandad);
            $sql->execute();
        
        return $resultado=$sql->fetchAll();
    }
}

?>