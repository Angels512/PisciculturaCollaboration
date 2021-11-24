<?php

    class Chat extends Conectar
    {
        // Crear nuevo chat
        public function createChat($id_usu, $id_cat, $titulo_chat, $desc_chat)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "CALL createChat(?, ?, ?, ?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_usu);
            $sql->bindValue(2, $id_cat);
            $sql->bindValue(3, $titulo_chat);
            $sql->bindValue(4, $desc_chat);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }


        // Terminar e inactivar un chat
        public function cerrarChat($id_chat)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "UPDATE chat SET estado_chat='Cerrado' WHERE id_chat=?";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_chat);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }


        // Obtener toda la lista de chats creados por un mismo usuario
        public function listarChat_usu($id_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT chat.id_chat, chat.id_usu, chat.id_cat, chat.titulo_chat, chat.desc_chat, chat.estado_chat, chat.fecha,
                    usuario.nombre_usu, usuario.apellido_usu,
                    categoria.nombre_cat FROM chat
                    INNER JOIN categoria ON chat.id_cat = categoria.id_cat
                    INNER JOIN usuario ON chat.id_usu = usuario.id_usu
                    WHERE chat.est = 1 AND usuario.id_usu = ?;";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }


        // Obtener toda la lista de chats creados por cualquier usuario
        public function listarChatTotal()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT chat.id_chat, chat.id_usu, chat.id_cat, chat.titulo_chat, chat.desc_chat, chat.estado_chat, chat.fecha,
                    usuario.nombre_usu, usuario.apellido_usu, usuario.id_rol,
                    categoria.nombre_cat FROM chat
                    INNER JOIN categoria ON chat.id_cat = categoria.id_cat
                    INNER JOIN usuario ON chat.id_usu = usuario.id_usu
                    WHERE chat.est = 1";

            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }

?>

