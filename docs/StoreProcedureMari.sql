-- PROCEDIMIENTOS ALMACENADOS

drop procedure if exists sp_insertBiocre
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


drop procedure if exists sp_updateBiocre
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


drop procedure if exists sp_delete_biocre
delimiter //
 create procedure sp_delete_biocre(
   in vid_biocre int(11))
 begin
   UPDATE biocrecimiento SET est=0, fecha_elim=now() where id_biocre = vid_biocre;
 end //
 delimiter ;

 drop procedure if exists sp_insertMortalidad
delimiter //
 create procedure sp_insertMortalidad(
   in id_cultivo int(11),
   in reg_mortandad int(11))
 begin
   INSERT INTO mortalidad (id_mortalidad, id_cultivo, reg_mortandad, fecha) VALUES (NULL,id_cultivo,reg_mortandad,now());
 end //
 delimiter;


drop procedure if exists sp_insertNovedad
delimiter //
 create procedure sp_insertNovedad(
   in id_cultivo int(11),
   in medidad_prev varchar(250))
 begin
   INSERT INTO novedad (id_novedad, id_cultivo, medidad_prev, fecha) VALUES (NULL,id_cultivo,medidad_prev,now());
 end //
 delimiter ;

drop procedure if exists sp_insertProducts
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


drop procedure if exists sp_updateProducto
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

 drop procedure if exists sp_delete_producto
delimiter //
 create procedure sp_delete_producto(
   in vid_produ int(11))
 begin
   UPDATE producto SET est=0, fecha_elim=now() where id_produ = vid_produ;
 end //
 delimiter ;

drop procedure if exists sp_insertProveedor
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


drop procedure if exists sp_updateProveedor
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

  drop procedure if exists sp_delete_proveedor
delimiter //
 create procedure sp_delete_proveedor(
   in vid_prove int(11))
 begin
   UPDATE proveedor SET est='0', fecha_elim=now() where id_prove = vid_prove;
 end //
 delimiter ;


 drop procedure if exists sp_insertResponsable
delimiter //
 create procedure sp_insertResponsable(
   in nombre_respon text,
   in apellido_respon text)
 begin
   INSERT INTO responsable (id_respon, nombre_respon, apellido_respon, fecha_elim, fecha, est)
   VALUES (NULL,nombre_respon,apellido_respon,NULL,now(),'1');
 end //
 delimiter ;

  drop procedure if exists sp_updateResponsable
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


drop procedure if exists sp_delete_respon
delimiter //
 create procedure sp_delete_respon(
   in vid_respon int(11))
 begin
   UPDATE responsable SET est=0, fecha_elim=now() where id_respon = vid_respon;
 end //
 delimiter ;

drop procedure if exists sp_insertTblalim
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


 drop procedure if exists sp_updateTblAlim
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

drop procedure if exists sp_delete_tblalm
delimiter //
 create procedure sp_delete_tblalm(
   in vid_tbl_alim int(11))
 begin
   UPDATE tblalimentacion SET est=0, fecha_elim=now() where id_tbl_alim = vid_tbl_alim;
 end //
 delimiter ;