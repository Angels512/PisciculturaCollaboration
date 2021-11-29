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


-- Biocrecimiento
drop procedure if exists sp_insertBiocre;
delimiter //
 create procedure sp_insertBiocre(
   in id_etapa int(11),
   in id_cultivo int(11),
   in id_usu int(11),
   in num_organ int(11),
   in peso_organ int(11),
   in peso_biomasa int(11),
   in edad_organ int(11),
   in color_organ varchar(100),
   in escamas_organ varchar(100),
   in ojos_organ varchar(100),
   in compor_organ varchar(100),
   in crecimiento_organ int(11),
   in obser_adic varchar(200))
 begin
   INSERT INTO  biocrecimiento (id_biocre,id_etapa,id_cultivo, id_usu,num_organ,peso_organ,peso_biomasa,edad_organ,color_organ,escamas_organ,
				ojos_organ,compor_organ,crecimiento_organ,obser_adic,fecha,fecha_elim,est)
   VALUES  (NULL,id_etapa,id_cultivo,id_usu, num_organ,peso_organ,peso_biomasa,edad_organ,color_organ,escamas_organ,ojos_organ,compor_organ,
            crecimiento_organ,obser_adic,now(),NULL,1);
 end //
 delimiter ;


drop procedure if exists sp_updateBiocre;
delimiter //
 create procedure sp_updateBiocre(
   in vid_etapa int(11),
   in vid_cultivo int(11),
   in vid_usu int(11),
   in vnum_organ int(11),
   in vpeso_organ int(11),
   in vpeso_biomasa int(11),
   in vedad_organ int(11),
   in vcolor_organ varchar(100),
   in vescamas_organ varchar(100),
   in vojos_organ varchar(100),
   in vcompor_organ varchar(100),
   in vcrecimiento_organ int(11),
   in vobser_adic varchar(200),
   in vid_biocre int(11))
 begin
   UPDATE biocrecimiento SET id_etapa=vid_etapa,id_cultivo=vid_cultivo,id_usu=vid_usu,num_organ=vnum_organ,peso_organ=vpeso_organ,
        peso_biomasa=vpeso_biomasa,edad_organ=vedad_organ,color_organ=vcolor_organ,escamas_organ=vescamas_organ,ojos_organ=vojos_organ,
        compor_organ=vcompor_organ,crecimiento_organ=vcrecimiento_organ,obser_adic=vobser_adic
        WHERE id_biocre = vid_biocre;
 end //
 delimiter ;


drop procedure if exists sp_delete_biocre;
delimiter //
 create procedure sp_delete_biocre(
   in vid_biocre int(11))
 begin
   UPDATE biocrecimiento SET est=0, fecha_elim=now() where id_biocre = vid_biocre;
 end //
 delimiter ;


-- Mortalidad
drop procedure if exists sp_insertMortalidad;
delimiter //
 create procedure sp_insertMortalidad(
   in id_cultivo int(11),
   in reg_mortandad int(11))
 begin
   INSERT INTO mortalidad (id_mortalidad, id_cultivo, reg_mortandad, fecha) VALUES (NULL,id_cultivo,reg_mortandad,now());
 end //
 delimiter ;


-- Novedad
drop procedure if exists sp_insertNovedad;
delimiter //
 create procedure sp_insertNovedad(
   in id_cultivo int(11),
   in medidad_prev varchar(250))
 begin
   INSERT INTO novedad (id_novedad, id_cultivo, medidad_prev, fecha) VALUES (NULL,id_cultivo,medidad_prev,now());
 end //
 delimiter ;


-- Productos
drop procedure if exists sp_insertProducts;
delimiter //
 create procedure sp_insertProducts(
   in id_prove int(11),
   in id_clase int(11),
   in fech_venc date,
   in num_lote varchar(25))
 begin
   INSERT INTO producto (id_produ, id_prove, id_clase, fech_venc, num_lote, fecha, fecha_elim, est)
   VALUES (NULL,id_prove,id_clase,fech_venc,num_lote,now(),NULL,1);
 end //
 delimiter ;


drop procedure if exists sp_updateProducto;
delimiter //
 create procedure sp_updateProducto(
   in vid_clase int(11),
   in vfech_venc date,
   in vnum_lote varchar(25),
   in vid_prove int(11),
   in vid_produ int(11))
 begin
   UPDATE producto set id_clase = vid_clase, fech_venc = vfech_venc, num_lote = vnum_lote, id_prove =vid_prove
   WHERE id_produ = vid_produ;
 end //
 delimiter ;


drop procedure if exists sp_delete_producto;
delimiter //
 create procedure sp_delete_producto(
   in vid_produ int(11))
 begin
   UPDATE producto SET est=0, fecha_elim=now() where id_produ = vid_produ;
 end //
 delimiter ;


-- Proveedor
drop procedure if exists sp_insertProveedor;
delimiter //
 create procedure sp_insertProveedor(
   in nombre_emp varchar(50),
   in direccion_emp varchar(70),
   in telefono_emp varchar(10),
   in correo_emp varchar(70))
 begin
   INSERT INTO proveedor (id_prove, nombre_emp, direccion_emp, telefono_emp, correo_emp, fecha, fecha_elim, est)
   VALUES (NULL,nombre_emp,direccion_emp,telefono_emp,correo_emp,now(),NULL,'1');
 end //
 delimiter ;


drop procedure if exists sp_updateProveedor;
delimiter //
 create procedure sp_updateProveedor(
   in vnombre_emp varchar(50),
   in vdireccion_emp varchar(70),
   in vtelefono_emp varchar(10),
   in vcorreo_emp varchar(70),
   in vid_prove int(11))
 begin
   UPDATE proveedor set nombre_emp = vnombre_emp, direccion_emp = vdireccion_emp, telefono_emp = vtelefono_emp, correo_emp =vcorreo_emp
   WHERE id_prove = vid_prove;
 end //
 delimiter ;


drop procedure if exists sp_delete_proveedor;
delimiter //
 create procedure sp_delete_proveedor(
   in vid_prove int(11))
 begin
   UPDATE proveedor SET est='0', fecha_elim=now() where id_prove = vid_prove;
 end //
 delimiter ;


 -- Responsable
drop procedure if exists sp_insertResponsable;
delimiter //
 create procedure sp_insertResponsable(
   in nombre_respon text,
   in apellido_respon text)
 begin
   INSERT INTO responsable (id_respon, nombre_respon, apellido_respon, fecha_elim, fecha, est)
   VALUES (NULL,nombre_respon,apellido_respon,NULL,now(),'1');
 end //
 delimiter ;


drop procedure if exists sp_updateResponsable;
delimiter //
 create procedure sp_updateResponsable(
   in vnombre_respon text,
   in vapellido_respon text,
   in vid_respon int(11))
 begin
   UPDATE responsable set nombre_respon = vnombre_respon, apellido_respon = vapellido_respon
   WHERE id_respon = vid_respon;
 end //
 delimiter ;


drop procedure if exists sp_delete_respon;
delimiter //
 create procedure sp_delete_respon(
   in vid_respon int(11))
 begin
   UPDATE responsable SET est=0, fecha_elim=now() where id_respon = vid_respon;
 end //
 delimiter ;


-- Tabla de alimentacion
drop procedure if exists sp_insertTblalim;
delimiter //
 create procedure sp_insertTblalim(
   in id_produ int(11),
   in id_cultivo int(11),
   in id_usu int(11),
   in cant_siembra int(6),
   in porc_proteina int(11),
   in hora_sum_alim1 int(11),
   in hora_sum_alim2 int(11),
   in hora_sum_alim3 int(11),
   in obser_atmo varchar(200),
   in obser_gen_cult varchar(200))
 begin
   INSERT INTO tblalimentacion (id_tbl_alim, id_produ, id_cultivo, id_usu, cant_siembra, porc_proteina,hora_sum_alim1,
   hora_sum_alim2,hora_sum_alim3, obser_atmo,obser_gen_cult,fecha,fecha_elim,est)
   VALUES (NULL,id_produ,id_cultivo,id_usu,cant_siembra,porc_proteina,hora_sum_alim1,
           hora_sum_alim2,hora_sum_alim3,obser_atmo,obser_gen_cult,now(),NULL,1);
 end //
 delimiter ;


 drop procedure if exists sp_updateTblAlim;
delimiter //
 create procedure sp_updateTblAlim(
   in vid_produ int(11),
   in vid_cultivo int(11),
   in vid_usu int(11),
   in vcant_siembra int(6),
   in vporc_proteina int(11),
   in vhora_sum_alim1 int(11),
   in vhora_sum_alim2 int(11),
   in vhora_sum_alim3 int(11),
   in vobser_atmo varchar(200),
   in vobser_gen_cult varchar(200),
   in vid_tbl_alim int(11))
 begin
   UPDATE tblalimentacion set id_produ=vid_produ,id_cultivo=vid_cultivo,id_usu=vid_usu,cant_siembra=vcant_siembra,porc_proteina=vporc_proteina,
   hora_sum_alim1=vhora_sum_alim1,hora_sum_alim2=vhora_sum_alim2,hora_sum_alim3=vhora_sum_alim3,obser_atmo=vobser_atmo,obser_gen_cult=vobser_gen_cult
   WHERE id_tbl_alim = vid_tbl_alim;
 end //
 delimiter ;


drop procedure if exists sp_delete_tblalm;
delimiter //
 create procedure sp_delete_tblalm(
   in vid_tbl_alim int(11))
 begin
   UPDATE tblalimentacion SET est=0, fecha_elim=now() where id_tbl_alim = vid_tbl_alim;
 end //
 delimiter ;
 
 
 -- Parametros Fisico-Quimicos
 drop procedure if exists sp_insertParafq;
delimiter //
 create procedure sp_insertParafq(
   in id_cultivo int(11),
   in id_usu int(11),
   in rango_amonio int(11),
   in rango_nitrito int(11),
   in rango_nitrato int(11),
   in rango_ph int(11),
   in cant_melaza varchar(100),
   in porc_agua varchar(100),
   in observaciones varchar(200))
 begin
   INSERT INTO  parametrosfq (id_par_fq, id_cultivo, id_usu, rango_amonio, rango_nitrito, rango_nitrato, rango_ph, cant_melaza, porc_agua, observaciones, fecha, fecha_elim, est)
   VALUES  (NULL,id_cultivo, id_usu, rango_amonio, rango_nitrito, rango_nitrato, rango_ph, cant_melaza, porc_agua, observaciones,now(),NULL,1);
 end //
 delimiter ;


drop procedure if exists sp_updateParafq;
delimiter //
 create procedure sp_updateParafq(
   in vid_cultivo int(11),
   in vid_usu int(11),
   in vrango_amonio int(11),
   in vrango_nitrito int(11),
   in vrango_nitrato int(11),
   in vrango_ph int(11),
   in vcant_melaza varchar(100),
   in vporc_agua varchar(100),
   in vobservaciones varchar(200),
   in vid_par_fq int(11))
 begin
   UPDATE parametrosfq SET id_cultivo=vid_cultivo,id_usu=vid_usu,rango_amonio=vrango_amonio,rango_nitrito=vrango_nitrito,
   rango_nitrato=vrango_nitrato,rango_ph=vrango_ph,cant_melaza=vcant_melaza,porc_agua=vporc_agua,observaciones=vobservaciones
        WHERE id_par_fq = vid_par_fq;
 end //
 delimiter ;


drop procedure if exists sp_delete_parafq;
delimiter //
 create procedure sp_delete_parafq(
   in vid_par_fq int(11))
 begin
   UPDATE parametrosfq SET est=0, fecha_elim=now() where id_par_fq = vid_par_fq;
 end //
 delimiter ;


-- Temperatura Agua
drop procedure if exists sp_insertTempagua;
delimiter //
 create procedure sp_insertTempagua(
   in id_cultivo int(11),
   in id_usu int(11),
   in num_dia int(11),
   in grados1 int(11),
   in grados2 int(11),
   in grados3 int(11))
 begin
   INSERT INTO  tempagua (id_temp_agua, id_cultivo, id_usu, num_dia, grados1, grados2, grados3, fecha, fecha_elim, est)
   VALUES  (NULL,id_cultivo, id_usu, num_dia, grados1, grados2, grados3,now(),NULL,1);
 end //
 delimiter ;


drop procedure if exists sp_updateTempagua;
delimiter //
 create procedure sp_updateTempagua(
   in vid_cultivo int(11),
   in vid_usu int(11),
   in vnum_dia int(11),
   in vgrados1 int(11),
   in vgrados2 int(11),
   in vgrados3 int(11),
   in vid_temp_agua int(11))
 begin
   UPDATE tempagua SET id_cultivo=vid_cultivo,id_usu=vid_usu,num_dia=vnum_dia,grados1=vgrados1,grados2=vgrados2,grados3=vgrados3
        WHERE id_temp_agua = vid_temp_agua;
 end //
 delimiter ;


drop procedure if exists sp_delete_tempagua;
delimiter //
 create procedure sp_delete_tempagua(
   in vid_temp_agua int(11))
 begin
   UPDATE tempagua SET est=0, fecha_elim=now() where id_temp_agua = vid_temp_agua;
 end //
 delimiter ;
 
 -- Temperatura Ambiente
 drop procedure if exists sp_insertTempamb;
delimiter //
 create procedure sp_insertTempamb(
   in id_cultivo int(11),
   in id_usu int(11),
   in num_dia int(11),
   in grados1 int(11),
   in grados2 int(11),
   in grados3 int(11))
 begin
   INSERT INTO  tempambiente (id_temp_amb, id_cultivo, id_usu, num_dia, grados1, grados2, grados3, fecha, fecha_elim, est)
   VALUES  (NULL,id_cultivo, id_usu, num_dia, grados1, grados2, grados3,now(),NULL,1);
 end //
 delimiter ;


drop procedure if exists sp_updateTempamb;
delimiter //
 create procedure sp_updateTempamb(
   in vid_cultivo int(11),
   in vid_usu int(11),
   in vnum_dia int(11),
   in vgrados1 int(11),
   in vgrados2 int(11),
   in vgrados3 int(11),
   in vid_temp_amb int(11))
 begin
   UPDATE tempambiente SET id_cultivo=vid_cultivo,id_usu=vid_usu,num_dia=vnum_dia,grados1=vgrados1,grados2=vgrados2,grados3=vgrados3
        WHERE id_temp_amb = vid_temp_amb;
 end //
 delimiter ;


drop procedure if exists sp_delete_tempamb;
delimiter //
 create procedure sp_delete_tempamb(
   in vid_temp_amb int(11))
 begin
   UPDATE tempambiente SET est=0, fecha_elim=now() where id_temp_amb = vid_temp_amb;
 end //
 delimiter ;
 
 
 -- Estado Acuicultura
  drop procedure if exists sp_insertEstacui;
delimiter //
 create procedure sp_insertEstacui(
   in id_cultivo int(11),
   in id_usu int(11),
   in obser_gene varchar(200))
 begin
   INSERT INTO  estacuicultura (id_est_acui, id_cultivo, id_usu, obser_gene, fecha, fecha_elim, est)
   VALUES  (NULL,id_cultivo, id_usu, obser_gene,now(),NULL,1);
 end //
 delimiter ;


drop procedure if exists sp_updateEstacui;
delimiter //
 create procedure sp_updateEstacui(
   in vid_cultivo int(11),
   in vid_usu int(11),
   in vobser_gene varchar(200),
   in vid_est_acui int(11))
 begin
   UPDATE estacuicultura SET id_cultivo=vid_cultivo,id_usu=vid_usu,obser_gene=vobser_gene
        WHERE id_est_acui = vid_est_acui;
 end //
 delimiter ;


drop procedure if exists sp_delete_estacui;
delimiter //
 create procedure sp_delete_estacui(
   in vid_est_acui int(11))
 begin
   UPDATE estacuicultura SET est=0, fecha_elim=now() where id_est_acui = vid_est_acui;
 end //
 delimiter ;


 -- Estanques
  drop procedure if exists sp_insertEstanque;
delimiter //
 create procedure sp_insertEstanque(
   in num_tanque int(11),
   in capacidad_tanque int(11),
   in desc_tanque varchar(200))
 begin
   INSERT INTO  estanque (id_tanque, num_tanque, capacidad_tanque, desc_tanque, fecha, fehca_elim, est)
   VALUES  (NULL, num_tanque, capacidad_tanque, desc_tanque,now(),NULL,1);
 end //
 delimiter ;


drop procedure if exists sp_updateEstanque;
delimiter //
 create procedure sp_updateEstanque(
   in vnum_tanque int(11),
   in vcapacidad_tanque int(11),
   in vdesc_tanque varchar(200),
   in vid_tanque int(11))
 begin
   UPDATE estanque SET num_tanque=vnum_tanque,capacidad_tanque=capacidad_tanque,desc_tanque=vdesc_tanque
        WHERE id_tanque = vid_tanque;
 end //
 delimiter ;


drop procedure if exists sp_delete_estanque;
delimiter //
 create procedure sp_delete_estanque(
   in vid_tanque int(11))
 begin
   UPDATE estanque SET est=0, fehca_elim=now() where id_tanque = vid_tanque;
 end //
 delimiter ;
