<?php

class Home extends Conectar
{
   // Jefe de produccion
   public function totalFormatos_grafico()
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT
               (SELECT COUNT(*) FROM biocrecimiento INNER JOIN cultivo ON biocrecimiento.id_cultivo = cultivo.id_cultivo WHERE cultivo.est=1) "biocrecimiento",
               (SELECT COUNT(*) FROM tblalimentacion INNER JOIN cultivo ON tblalimentacion.id_cultivo = cultivo.id_cultivo WHERE cultivo.est=1) "tbl_alimentacion",
               (SELECT COUNT(*) FROM parametrosfq INNER JOIN cultivo ON parametrosfq.id_cultivo = cultivo.id_cultivo WHERE cultivo.est=1) "parametros_FQ",
               (SELECT COUNT(*) FROM tempagua INNER JOIN cultivo ON tempagua.id_cultivo = cultivo.id_cultivo WHERE cultivo.est=1) "temp_gua",
               (SELECT COUNT(*) FROM tempambiente INNER JOIN cultivo ON tempambiente.id_cultivo = cultivo.id_cultivo WHERE cultivo.est=1) "temp_ambiente",
               (SELECT COUNT(*) FROM estacuicultura INNER JOIN cultivo ON estacuicultura.id_cultivo = cultivo.id_cultivo WHERE cultivo.est=1) "est_Acuicultura";';

      $sql = $conectar->prepare($sql);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function totalUsuarios()
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT COUNT(*) AS total FROM usuario WHERE est=1;';
      $sql = $conectar->prepare($sql);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function totalPiscicultores()
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT COUNT(*) AS total FROM usuario WHERE id_rol=2 AND est=1;';
      $sql = $conectar->prepare($sql);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function totalAcuicultores()
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT COUNT(*) AS total FROM usuario WHERE id_rol=3 AND est=1;';
      $sql = $conectar->prepare($sql);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function totalChatsAbiertos()
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT COUNT(*) AS total FROM chat WHERE estado_chat LIKE "%Abierto%" AND est=1;';
      $sql = $conectar->prepare($sql);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function totalMortalidad()
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT (SELECT SUM(reg_mortandad) FROM mortalidad INNER JOIN cultivo ON mortalidad.id_cultivo = cultivo.id_cultivo WHERE cultivo.est=1) total;';
      $sql = $conectar->prepare($sql);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }



   // Empleados
   public function totalFormatos_acuicultor($id_usu)
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT
      (SELECT COUNT(*) FROM parametrosfq INNER JOIN cultivo ON parametrosfq.id_cultivo = cultivo.id_cultivo
      INNER JOIN usuario ON parametrosfq.id_usu = usuario.id_usu WHERE usuario.id_usu=? AND cultivo.est=1) "parametros_FQ",
      (SELECT COUNT(*) FROM tempagua INNER JOIN cultivo ON tempagua.id_cultivo = cultivo.id_cultivo
      INNER JOIN usuario ON tempagua.id_usu = usuario.id_usu WHERE usuario.id_usu=? AND cultivo.est=1) "temp_gua",
      (SELECT COUNT(*) FROM tempambiente INNER JOIN cultivo ON tempambiente.id_cultivo = cultivo.id_cultivo
      INNER JOIN usuario ON tempambiente.id_usu = usuario.id_usu WHERE usuario.id_usu=? AND cultivo.est=1) "temp_ambiente",
      (SELECT COUNT(*) FROM estacuicultura INNER JOIN cultivo ON estacuicultura.id_cultivo = cultivo.id_cultivo
      INNER JOIN usuario ON estacuicultura.id_usu = usuario.id_usu WHERE usuario.id_usu=? AND cultivo.est=1) "est_Acuicultura";';

      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $id_usu);
      $sql->bindValue(2, $id_usu);
      $sql->bindValue(3, $id_usu);
      $sql->bindValue(4, $id_usu);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function totalFormatos_piscicultor($id_usu)
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT
      (SELECT COUNT(*) FROM biocrecimiento INNER JOIN cultivo ON biocrecimiento.id_cultivo = cultivo.id_cultivo
      INNER JOIN usuario ON biocrecimiento.id_usu = usuario.id_usu WHERE usuario.id_usu=? AND cultivo.est=1) "biocrecimiento",
      (SELECT COUNT(*) FROM tblalimentacion INNER JOIN cultivo ON tblalimentacion.id_cultivo = cultivo.id_cultivo
      INNER JOIN usuario ON tblalimentacion.id_usu = usuario.id_usu WHERE usuario.id_usu=? AND cultivo.est=1) "tbl_alimentacion";';

      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $id_usu);
      $sql->bindValue(2, $id_usu);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function totalChatsAbiertos_empleados($id_usu)
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT COUNT(*) AS total FROM chat WHERE id_usu=? AND estado_chat LIKE "%Abierto%" AND est=1;';
      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $id_usu);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function totalChatsCerrados($id_usu)
   {
      $conectar = parent::Conexion();
      parent::setNames();

      $sql = 'SELECT COUNT(*) AS total FROM chat WHERE id_usu=? AND estado_chat LIKE "%Cerrado%" AND est=1;';
      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $id_usu);
      $sql->execute();

      return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
   }
}