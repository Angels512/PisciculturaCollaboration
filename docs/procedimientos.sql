
-- PROCEDIMIENTOS ALMACENADOS
-- Usuario
DROP PROCEDURE IF EXISTS login;
DELIMITER $$
CREATE PROCEDURE login (IN param_documento_usu VARCHAR(10), IN param_pass_usu VARCHAR(250))
BEGIN
	SELECT * FROM usuario WHERE documento_usu=param_documento_usu AND pass_usu=param_pass_usu AND est=1;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS seletUserReset;
DELIMITER $$
CREATE PROCEDURE seletUserReset (IN param_documento_usu VARCHAR(10), IN param_correo_usu VARCHAR(50))
BEGIN
	SELECT * FROM usuario WHERE documento_usu=param_documento_usu OR correo_usu=param_correo_usu AND est=1;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS verifyToken;
DELIMITER $$
CREATE PROCEDURE verifyToken (IN param_id_usu INT(11), IN param_codigo INT(4), IN param_token VARCHAR(200))
BEGIN
	SELECT * FROM password_rest WHERE id_usu=param_id_usu AND codigo=param_codigo AND token=param_token;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS restPassword;
DELIMITER $$
CREATE PROCEDURE restPassword (IN param_id_usu INT(11), IN param_pass_usu VARCHAR(250))
BEGIN
	UPDATE usuario SET pass_usu=param_id_usu WHERE id_usu=param_pass_usu;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS createUser;
DELIMITER $$
CREATE PROCEDURE createUser (
   IN param_id_rol INT(11),
   IN param_nombre_usu CHAR(50),
   IN param_apellido_usu CHAR(50),
   IN param_direccion_usu VARCHAR(50),
   IN param_telefono_usu VARCHAR(10),
   IN param_documento_usu VARCHAR(10),
   IN param_correo_usu VARCHAR(50),
   IN param_password VARCHAR(250)
)
BEGIN
	INSERT INTO usuario (id_usu, id_rol, nombre_usu, apellido_usu, direccion_usu, telefono_usu, documento_usu, correo_usu, pass_usu, fecha, est) VALUES (NULL, param_id_rol, param_nombre_usu, param_apellido_usu, param_direccion_usu, param_telefono_usu, param_documento_usu, param_correo_usu, param_password, now(), 1);
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS addDataUser;
DELIMITER $$
CREATE PROCEDURE addDataUser (
   IN param_direccion_usu VARCHAR(50),
   IN param_telefono_usu VARCHAR(10),
   IN param_pass_usu VARCHAR(250),
   IN param_documento_usu VARCHAR(10)
)
BEGIN
	UPDATE usuario SET direccion_usu=param_direccion_usu, telefono_usu=param_telefono_usu, pass_usu=param_pass_usu WHERE documento_usu=param_documento_usu;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS updateUser;
DELIMITER $$
CREATE PROCEDURE updateUser (
   IN param_id_rol INT(11),
   IN param_nombre_usu CHAR(50),
   IN param_apellido_usu CHAR(50),
   IN param_direccion_usu VARCHAR(50),
   IN param_telefono_usu VARCHAR(10),
   IN param_documento_usu VARCHAR(10),
   IN param_correo_usu VARCHAR(50),
   IN param_id_usu INT(11)
)
BEGIN
	UPDATE usuario SET id_rol=param_id_rol, nombre_usu=param_nombre_usu, apellido_usu=param_apellido_usu, direccion_usu=param_direccion_usu, telefono_usu=param_telefono_usu, documento_usu=param_documento_usu, correo_usu=param_correo_usu, fecha_edit=now() WHERE id_usu=param_id_usu;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS updatePerfil;
DELIMITER $$
CREATE PROCEDURE updatePerfil (
   IN param_direccion_usu VARCHAR(50),
   IN param_telefono_usu VARCHAR(10),
   IN param_pass_usu VARCHAR(250),
   IN param_id_usu INT(11)
)
BEGIN
	UPDATE usuario SET direccion_usu=param_direccion_usu, telefono_usu=param_telefono_usu, pass_usu=param_pass_usu, fecha_edit=now() WHERE id_usu=param_id_usu;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS updatePasswordPerfil;
DELIMITER $$
CREATE PROCEDURE updatePasswordPerfil (
   IN param_id_rol INT(11),
   IN param_nombre_usu CHAR(50),
   IN param_apellido_usu CHAR(50),
   IN param_direccion_usu VARCHAR(50),
   IN param_telefono_usu VARCHAR(10),
   IN param_documento_usu VARCHAR(10),
   IN param_correo_usu VARCHAR(50),
   IN param_id_usu INT(11)
)
BEGIN
	UPDATE usuario SET id_rol=param_id_rol, nombre_usu=param_nombre_usu, apellido_usu=param_apellido_usu, direccion_usu=param_direccion_usu, telefono_usu=param_telefono_usu, documento_usu=param_documento_usu, correo_usu=param_correo_usu, fecha_edit=now() WHERE id_usu=param_id_usu;
END $$
DELIMITER ;






-- Cultivo
DROP PROCEDURE IF EXISTS createCultivo;
DELIMITER $$
CREATE PROCEDURE createCultivo (
   IN param_id_respon INT(11),
   IN param_id_tanque INT(11),
   IN param_num_lote VARCHAR(50),
   IN param_cant_siembra INT(11),
   IN param_fechaFinal DATE
)
BEGIN
	INSERT INTO cultivo(id_cultivo, id_respon, id_tanque, num_lote, cant_siembra, fecha_cierre, fecha, est) VALUES (NULL, param_id_respon, param_id_tanque, param_num_lote, param_cant_siembra, param_fechaFinal, now(), 1);
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS updateCultivo;
DELIMITER $$
CREATE PROCEDURE updateCultivo (
   IN param_id_respon INT(11),
   IN param_id_tanque INT(11),
   IN param_num_lote VARCHAR(50),
   IN param_cant_siembra INT(11),
   IN param_id_cultivo INT(11)
)
BEGIN
	UPDATE cultivo SET id_respon=param_id_respon, id_tanque=param_id_tanque, num_lote=param_num_lote, cant_siembra=param_cant_siembra WHERE id_cultivo=param_id_cultivo;
END $$
DELIMITER ;






-- Chat
DROP PROCEDURE IF EXISTS createChat;
DELIMITER $$
CREATE PROCEDURE createChat (
   IN param_id_usu INT(11),
   IN param_id_cat INT(11),
   IN param_titulo_chat VARCHAR(50),
   IN param_desc_chat MEDIUMTEXT
)
BEGIN
	INSERT INTO chat (id_chat, id_usu, id_cat, titulo_chat, desc_chat, estado_chat, fecha, est) VALUES (NULL, param_id_usu, param_id_cat, param_titulo_chat, param_desc_chat, 'Abierto', now(), 1);
END $$
DELIMITER ;






-- Chat Detalle
DROP PROCEDURE IF EXISTS createChatDetalle;
DELIMITER $$
CREATE PROCEDURE createChatDetalle (
   IN param_id_chat INT(11),
   IN param_id_usu INT(11),
   IN param_desc_chatd TEXT
)
BEGIN
	INSERT INTO chatdetalle (id_chatd, id_chat, id_usu, desc_chatd, fecha, est) VALUES (NULL, param_id_chat, param_id_usu, param_desc_chatd, now(), 1);
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS createChatDetalleCerrado;
DELIMITER $$
CREATE PROCEDURE createChatDetalleCerrado (
   IN param_id_chat INT(11),
   IN param_id_usu INT(11)
)
BEGIN
	INSERT INTO chatdetalle (id_chatd, id_chat, id_usu, desc_chatd, fecha, est) VALUES (NULL, param_id_chat, param_id_usu, '<b>¡Esta conversación ha finalizado!</b>', now(), 1);
END $$
DELIMITER ;
