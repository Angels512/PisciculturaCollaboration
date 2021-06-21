<?php

    class ChatDetalle extends Conectar
    {
        // Lo usamos para listar la cantidad de articulos (Mensajes) que hayan en la BD
        public function listarChatDetalle_chat($id_chat)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT chatdetalle.id_chatd, chatdetalle.desc_chatd, chatdetalle.fecha,
                    usuario.nombre_usu, usuario.apellido_usu, usuario.id_rol
                    FROM chatdetalle
                    INNER JOIN usuario ON chatdetalle.id_usu = usuario.id_usu
                    WHERE id_chat = ? ORDER BY id_chatd ASC;";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_chat);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Lo usamos para extraer datos especificos del chat y mostrarlos en pantalla
        public function listarChatDetalle_id($id_chat)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT chat.id_chat, chat.id_usu, chat.id_cat, chat.titulo_chat, chat.desc_chat, chat.estado_chat, chat.fecha,
                    usuario.nombre_usu, usuario.apellido_usu,
                    categoria.nombre_cat
                    FROM chat
                    INNER JOIN usuario ON chat.id_usu = usuario.id_usu
                    INNER JOIN categoria ON chat.id_cat = categoria.id_cat
                    WHERE id_chat = ? AND chat.est = 1;";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_chat);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Vamos a hacer la insercion de nuevos mensajes que cree el usuario dentro de un chat
        public function createChatDetalle($id_chat, $id_usu, $desc_chatd)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "INSERT INTO chatdetalle (id_chatd, id_chat, id_usu, desc_chatd, fecha, est) VALUES (NULL, ?, ?, ?, now(), 1);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_chat);
            $sql->bindValue(2, $id_usu);
            $sql->bindValue(3, $desc_chatd);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // En el momento que el chat se cree va a registrar un mensaje que diga que se termino la conversacion
        public function createChatDetalleCerrado($id_chat, $id_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "INSERT INTO chatdetalle (id_chatd, id_chat, id_usu, desc_chatd, fecha, est) VALUES (NULL, ?, ?, '<b>¡Esta conversación ha finalizado!</b>', now(), 1);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_chat);
            $sql->bindValue(2, $id_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }

?>