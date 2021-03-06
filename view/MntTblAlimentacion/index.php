<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Tabla de Alimentación - A'ttia</title>
</head>
<body class="with-side-menu">

    <?php require_once("../../public/templates/header.php"); ?>

	<?php require_once("../../public/templates/nav.php"); ?>

	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-7">
					<header class="section-header">
						<div class="tbl">
							<div class="tbl-row">
								<div class="tbl-cell">
									<h2>Formato Tabla de Alimentación</h2>
									<ol class="breadcrumb breadcrumb-simple">
										<li><a href="inicio">Inicio</a></li>
										<li><a href="#">Formatos</a></li>
										<li class="active">Tabla de Alimentación</li>
									</ol>
								</div>
							</div>
						</div>
					</header>
				</div>

				<div>
					<button style="margin: 40px 15px 0 0" name="action" id="newmortalidad" class="btn azul float-right mg-top"><i class="fa fa-plus-circle"></i> &nbspMortalidad</button>
					<button style="margin: 40px 15px 0 0" name="action" id="newnovedad" class="btn azul float-right mg-top"><i class="fa fa-plus-circle"></i> &nbspNovedad</button>
				</div>
			</div>
			<?php
				if (!isset($_GET['ID']) && !isset($_GET['EDIT'])){
			?>
					<section class="box-typical box-typical-padding" style="margin-top: 8px">
						<div>
							<h5>Ingrese los Datos</h5>
						</div>

						<div class="row">
							<form method="post" id="tabla_alim">
								<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">
								<input type="hidden" class="form-control" id="cant_siembra" name="cant_siembra"  value=""/>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label for="id_cultivo" class="form-label semibold">Cultivo</label>
										<div>
											<select id="id_cultivo" name="id_cultivo" class="form-control" onchange="atributos_derv(this.value)">
											</select>
										</div>
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label for="porc_proteina" class="form-label semibold">Proteina Suministrada(%)</label>
										<div>
											<select id="porc_proteina" name="porc_proteina" class="form-control">
												<option value="10%">10%</option>
												<option value="24%">24%</option>
												<option value="30%">30%</option>
												<option value="36%">36%</option>
											</select>
										</div>
									</fieldset>
								</div>

								<div class="col-lg-12">
									<fieldset class="form-group">
										<label for="id_cultivo" class="form-label semibold">Producto Suministrado <span class="color-red">*</span></label>
										<div>
											<select id="id_produ" name="id_produ" class="form-control">
											</select>
										</div>
									</fieldset>
								</div>

								<div class="col-md-4">
									<div class="form-group">
									<label for="hora_sum_alim1" class="form-label semibold">Hora Suministro Alimento #1 <span class="color-red">*</span></label>
										<div class="input-group clockpicker" data-autoclose="true">
											<input type='text' class="form-control" id="hora_sum_alim1" name="hora_sum_alim1" value="9:15"/>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time font-icon"></span>
											</span>
										</div>
										<small class="text-muted text-danger alerta" id="hora_sum_alim1_alert" hidden>La hora 1 es de 6:00 am a 9:30 am</small>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
									<label for="hora_sum_alim2" class="form-label semibold">Hora Suministro Alimento #2 <span class="color-red">*</span></label>
										<div class="input-group clockpicker" data-autoclose="true">
											<input type='text' class="form-control" id="hora_sum_alim2" name="hora_sum_alim2" value="12:35"/>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time font-icon"></span>
											</span>
										</div>
										<small class="text-muted text-danger alerta" id="hora_sum_alim2_alert" hidden>La hora 2 es de 9:30 am a 1:00 pm.</small>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
									<label for="hora_sum_alim3" class="form-label semibold">Hora Suministro Alimento #3 <span class="color-red">*</span></label>
										<div class="input-group clockpicker" data-autoclose="true">
											<input type='text' class="form-control" id="hora_sum_alim3" name="hora_sum_alim3" value="15:35"/>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time font-icon"></span>
											</span>
										</div>
										<small class="text-muted text-danger alerta" id="hora_sum_alim3_alert" hidden>La hora 3 es de 1:00 pm a 6:00 pm.</small>
									</div>
								</div>


								<div class="col-sm-12">
									<fieldset class="form-group">
										<label for="obser_atmo" class="form-label semibold">Observaciones Atmosférica <span class="color-red">*</span></label>
										<textarea rows="6" id="obser_atmo" name="obser_atmo" class="form-control" placeholder="Ingrese las observaciones atmosféricas" maxlength="200"></textarea>
										<small class="text-muted text-danger alerta" id="obser_atmo_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
									</fieldset>
								</div>

								<div class="col-sm-12">
									<fieldset class="form-group">
										<label class="form-label semibold" for="obser_gen_cult">Observaciones Generales del Cultivo <span class="color-red">*</span></label>
										<textarea rows="6" class="form-control" id="obser_gen_cult" name="obser_gen_cult" placeholder="Ingrese las observaciones generales del cultivo" maxlength="200"></textarea>
										<small class="text-muted text-danger alerta" id="obser_gen_cult_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
									</fieldset>
								</div>

								<div class="col-lg-12">
									<button type="submit" name="action" value="add" class="btn azul btn-inline btn-primary float-right">Guardar</button>
								</div>
							</form>
						</div>
					</section>
			<?php
				} else if(isset($_GET['ID']) && !isset($_GET['EDIT'])) {
			?>
					<section class="box-typical box-typical-padding" style="margin-top: 8px">
						<div>
							<h5>Consultar Tabla Alimentación</h5>
						</div>

						<div class="row">
							<form method="post">

								<div class="col-md-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="cant_siembra">Número de Organismos</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="cant_siembra" name="cant_siembra" readonly>
											<i class="font-icon font-icon-archive"></i>
										</div>
									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="fecha">Fecha de Creación</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="fecha" name="fecha" readonly>
											<i class="font-icon font-icon-calend"></i>
										</div>
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label for="id_cultivo" class="form-label semibold">Cultivo</label>
										<div>
											<select id="id_cultivo" name="id_cultivo" class="form-control" disabled>
											</select>
										</div>
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label for="porc_proteina" class="form-label semibold">Proteina Suministrada(%)</label>
										<div>
											<select id="porc_proteina" name="porc_proteina" class="form-control" disabled>
												<option value="10">10%</option>
												<option value="24">24%</option>
												<option value="30">30%</option>
												<option value="36">36%</option>
											</select>
										</div>
									</fieldset>
								</div>

								<div class="col-md-4">
									<div class="form-group">
									<label for="hora_sum_alim1" class="form-label semibold">Hora Suministro Alimento #1</label>
										<div class="input-group clockpicker" data-autoclose="true">
											<input type='text' class="form-control" id="hora_sum_alim1" name="hora_sum_alim1" value="9:35" disabled/>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time font-icon"></span>
											</span>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
									<label for="hora_sum_alim2" class="form-label semibold">Hora Suministro Alimento #2</label>
										<div class="input-group clockpicker" data-autoclose="true">
											<input type='text' class="form-control" id="hora_sum_alim2" name="hora_sum_alim2" value="12:35" disabled/>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time font-icon"></span>
											</span>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
									<label for="hora_sum_alim3" class="form-label semibold">Hora Suministro Alimento #3</label>
										<div class="input-group clockpicker" data-autoclose="true">
											<input type='text' class="form-control" id="hora_sum_alim3" name="hora_sum_alim3" value="15:35" disabled/>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time font-icon"></span>
											</span>
										</div>
									</div>
								</div>

								<div class="col-lg-12">
									<fieldset class="form-group">
										<label for="id_produ" class="form-label semibold">Producto Suministrado</label>
										<div>
											<select id="id_produ" name="id_produ" class="form-control" disabled>
											</select>
										</div>
									</fieldset>
								</div>

								<div class="col-sm-12">
									<fieldset class="form-group">
										<label for="obser_atmo" class="form-label semibold">Observaciones Atmosférica</label>
										<textarea rows="6" id="obser_atmo" name="obser_atmo" class="form-control" placeholder="Ingrese las observaciones atmosféricas" readonly></textarea>
									</fieldset>
								</div>

								<div class="col-sm-12">
									<fieldset class="form-group">
										<label class="form-label semibold" for="obser_gen_cult">Observaciones Generales del Cultivo</label>
										<textarea rows="6" class="form-control" id="obser_gen_cult" name="obser_gen_cult" placeholder="Ingrese las observaciones generales del cultivo" readonly></textarea>
									</fieldset>
								</div>

								<div class="col-lg-12">
									<button type="button" class="btn btn-inline azul btn-secondary float-right mt-10" id="btnAtras">Atrás</button>
								</div>
							</form>
						</div>
					</section>
			<?php
				} else if(isset($_GET['ID']) && isset($_GET['EDIT'])) {
			?>
					<section class="box-typical box-typical-padding" style="margin-top: 8px">
						<div>
							<h5>Actualizar Tabla Alimentación</h5>
						</div>

						<div class="row">
							<form method="post" id="tabla_alim">
								<input type="hidden" name="id_tbl_alim" id="id_tbl_alim">
								<input type="hidden" name="id_usu" id="id_usu">

								<div class="col-md-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="cant_siembra">Número de Organismos</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="cant_siembra" name="cant_siembra" readonly>
											<i class="font-icon font-icon-archive"></i>
										</div>
									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="fecha">Fecha de Creación</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="fecha" name="fecha" readonly>
											<i class="font-icon font-icon-calend"></i>
										</div>
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label for="id_cultivo" class="form-label semibold">Cultivo</label>
										<div>
											<select id="id_cultivo" name="id_cultivo" class="form-control">
											</select>
										</div>
									</fieldset>
								</div>

								<div class="col-lg-6">
									<fieldset class="form-group">
										<label for="porc_proteina" class="form-label semibold">Proteina Suministrada(%)</label>
										<div>
											<select id="porc_proteina" name="porc_proteina" class="form-control">
												<option value="10">10%</option>
												<option value="24">24%</option>
												<option value="30">30%</option>
												<option value="36">36%</option>
											</select>
										</div>
									</fieldset>
								</div>

								<div class="col-md-4">
									<div class="form-group">
									<label for="hora_sum_alim1" class="form-label semibold">Hora Suministro Alimento #1 <span class="color-red">*</span></label>
										<div class="input-group clockpicker" data-autoclose="true">
											<input type='text' class="form-control" id="hora_sum_alim1" name="hora_sum_alim1" value="9:15"/>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time font-icon"></span>
											</span>
										</div>
										<small class="text-muted text-danger alerta" id="hora_sum_alim1_alert" hidden>La hora 1 es de 6:00 am a 9:30 am</small>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
									<label for="hora_sum_alim2" class="form-label semibold">Hora Suministro Alimento #2 <span class="color-red">*</span></label>
										<div class="input-group clockpicker" data-autoclose="true">
											<input type='text' class="form-control" id="hora_sum_alim2" name="hora_sum_alim2" value="12:35"/>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time font-icon"></span>
											</span>
										</div>
										<small class="text-muted text-danger alerta" id="hora_sum_alim2_alert" hidden>La hora 2 es de 9:30 am a 1:00 pm.</small>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
									<label for="hora_sum_alim3" class="form-label semibold">Hora Suministro Alimento #3 <span class="color-red">*</span></label>
										<div class="input-group clockpicker" data-autoclose="true">
											<input type='text' class="form-control" id="hora_sum_alim3" name="hora_sum_alim3" value="15:35"/>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time font-icon"></span>
											</span>
										</div>
										<small class="text-muted text-danger alerta" id="hora_sum_alim3_alert" hidden>La hora 3 es de 1:00 pm a 6:00 pm.</small>
									</div>
								</div>


								<div class="col-lg-12">
									<fieldset class="form-group">
										<label for="id_produ" class="form-label semibold">Producto Suministrado <span class="color-red">*</span></label>
										<div>
											<select id="id_produ" name="id_produ" class="form-control">
											</select>
										</div>
									</fieldset>
								</div>

								<div class="col-sm-12">
									<fieldset class="form-group">
										<label for="obser_atmo" class="form-label semibold">Observaciones Atmosférica <span class="color-red">*</span></label>
										<textarea rows="6" id="obser_atmo" name="obser_atmo" class="form-control" placeholder="Ingrese las observaciones atmosféricas" maxlength="200"></textarea>
										<small class="text-muted text-danger alerta" id="obser_atmo_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
									</fieldset>
								</div>

								<div class="col-sm-12">
									<fieldset class="form-group">
										<label class="form-label semibold" for="obser_gen_cult">Observaciones Generales del Cultivo <span class="color-red">*</span></label>
										<textarea rows="6" class="form-control" id="obser_gen_cult" name="obser_gen_cult" placeholder="Ingrese las observaciones generales del cultivo" maxlength="200"></textarea>
										<small class="text-muted text-danger alerta" id="obser_gen_cult_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
									</fieldset>
								</div>

								<div class="col-lg-12">
									<button type="submit" name="action" value="add" id="guardar" class="btn btn-inline azul btn-primary float-right mt-10">Guardar</button>
									<button type="button" class="btn btn-inline btn-secondary float-right mt-10" id="btnAtras" style="margin-right: 6px;">Atrás</button>
								</div>
							</form>
						</div>
					</section>
			<?php
			}
			?>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once("../../public/templates/js.php"); ?>

	<?php require_once("../NovedadesMortalidad/modalmortalidad.php"); ?>
	<?php require_once("../NovedadesMortalidad/modalnovedad.php"); ?>

	<script src="view/MntTblAlimentacion/tbl_alim.js"></script>
	<script src="view/NovedadesMortalidad/novedadesmortalidad.js"></script>
</body>
</html>