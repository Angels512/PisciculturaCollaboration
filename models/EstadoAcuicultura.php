<?php 

class Estacuicultura extends Conectar
{
    // creamos el metodo insertEstacui para hacer un nuevo registro de Estado Acuicultura
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
            (NULL,?,?,?,now(),NULL,1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cultivo);
            $sql->bindValue(2, $id_usu);
            $sql->bindValue(3, $obser_gene); 
            $sql->execute();
        
        return $resultado=$sql->fetchAll();
    }

    //para traer datos del formulario de Estado Acuicultura y llenar el Datatable
    public function listar_estacui_x_cult($id_cultivo)
    {
        $conectar = parent::Conexion();
        parent::setNames();
        $sql="SELECT
        id_est_acui,
        nombre_usu,
        apellido_usu,
        obser_gene,
        estacuicultura.fecha,
        estacuicultura.est
        FROM
        estacuicultura
        INNER join usuario on estacuicultura.id_usu = usuario.id_usu
        WHERE
        estacuicultura.est = 1
        AND id_cultivo=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    // Traemos los datos del Estado Acuicultura desde base de datos
    public function getEstacui_id($id_est_acui)
    {
        $conectar = parent::Conexion();
        parent::setNames();

        $sql = "SELECT
        id_est_acui,
        id_cultivo,
        id_usu,
        obser_gene,
        fecha,
        est
        FROM
        estacuicultura
        WHERE id_est_acui=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_est_acui);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Actualizamos el formato en base de datos
    public function updateEstacui( $id_est_acui,$id_cultivo,$id_usu,$obser_gene){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="UPDATE estacuicultura set
        id_cultivo=?,
        id_usu=?,
        obser_gene=?
        WHERE
        id_est_acui = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_cultivo);
        $sql->bindValue(2, $id_usu);
        $sql->bindValue(3, $obser_gene);
        $sql->bindValue(4, $id_est_acui);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }

    //para eliminar un formato en base de datos
    public function delete_estacui($id_est_acui){
        $conectar= parent::conexion();
        parent::setNames();
        $sql="UPDATE estacuicultura SET est=0, fecha_elim=now() where id_est_acui = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_est_acui);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>