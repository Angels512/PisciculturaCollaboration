<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Parametros FQ - A'ttia</title>
</head>
<body class="with-side-menu">

    <?php require_once("../../public/templates/header.php"); ?>
	<?php require_once("../../public/templates/nav.php"); ?>

	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Formato Parámetros Físico Químicos</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="inicio">Inicio</a></li>
								<li><a href="#">Formatos</a></li>
								<li class="active">Parámetros Físico Químicos</li>
							</ol>
						</div>
					</div>
				</div>
			</header>


			<?php
				if (!isset($_GET['ID']) && !isset($_GET['EDIT'])){
			?>
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Ingrese los Datos</h5>
					</div>

					<div class="row">
						<form method="post" id="parafq_form">

							<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

							<input type="hidden" class="form-control" id="num_organ" name="num_organ"  value="2000" readonly>

							<div class="col-lg-12">
								<fieldset class="form-group">
									<label for="id_cultivo" class="form-label semibold">Cultivo</label>
									<div>
										<select id="id_cultivo" name="id_cultivo" class="form-control">
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="rango_amonio" class="form-label semibold">Rango de Amonio:</label>
									<div class="form-group range-slider-red">
										<input type="text" class="slider" id="rango_amonio" name="rango_amonio" value=""/>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="rango_nitrito" class="form-label semibold">Rango de Nitrito:</label>
									<div class="form-group range-slider-orange">
										<input type="text" class="slider" id="rango_nitrito" name="rango_nitrito" value=""/>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="rango_nitrato" class="form-label semibold">Rango de Nitrato:</label>
									<div class="form-group range-slider-orange">
										<input type="text" class="slider" id="rango_nitrato" name="rango_nitrato" value=""/>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="rango_ph" class="form-label semibold">Rango de PH:</label>
									<div class="form-group range-slider-red">
										<input type="text" class="slider" id="rango_ph" name="rango_ph" value=""/>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="cant_melaza" class="form-label semibold">Cantidad de Melaza:</label>
									<div class="form-group range-slider-red">
										<input type="text" class="slider" id="cant_melaza" name="cant_melaza" value=""/>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="porc_agua" class="form-label semibold">Porcentaje de Agua (%):</label>
									<div class="form-group range-slider-orange">
										<input type="text" class="slider" id="porc_agua" name="porc_agua" value=""/>
									</div>
								</fieldset>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="observaciones">Observaciones de los Parámetros</label>
									<textarea id="observaciones" name="observaciones" rows="6" class="form-control" placeholder="Añada las observaciones de los parámetros" maxlength="200"></textarea>
									<small class="text-muted text-danger alerta" id="observaciones_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
								</fieldset>
							</div>

							<div class="col-lg-12">
								<button type="submit" name="action" value="add" class="btn azul btn-inline btn-primary float-right mt-10">Guardar</button>
							</div>
						</form>
					</div>
				</section>
			<?php
				} else if(isset($_GET['ID']) && !isset($_GET['EDIT'])) {
			?>
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Consultar Parametros Fisico-Quimicos</h5>
					</div>

					<div class="row">
						<form method="post">

							<div class="col-md-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="fecha">Fecha de Creación</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="fecha" name="fecha" readonly>
										<i class="font-icon font-icon-calend"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-12">
								<fieldset class="form-group">
									<label for="id_cultivo" class="form-label semibold">Cultivo</label>
									<div>
										<select id="id_cultivo" name="id_cultivo" class="form-control" disabled>
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="rango_amonio">Rango de Amonio</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="rango_amonio" name="rango_amonio" placeholder="Ingrese Número" readonly>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="rango_nitrito">Rango de Nitrito</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="rango_nitrito" name="rrango_nitrito" placeholder="Ingrese Número" readonly>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="rango_nitrato">Rango de Nitrato</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="rango_nitrato" name="rango_nitrato" placeholder="Ingrese Número" readonly>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="rango_ph">Rango de PH</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="rango_ph" name="rango_ph" placeholder="Ingrese Número" readonly>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="cant_melaza">Cantidad de Melaza</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="cant_melaza" name="cant_melaza" placeholder="Ingrese Número" readonly>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="porc_agua">Porcentaje de Agua (%)</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="porc_agua" name="porc_agua" placeholder="Ingrese Número" readonly>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="observaciones">Observaciones de los Parametros</label>
									<textarea id="observaciones" name="observaciones" rows="6" class="form-control" placeholder="Ingrese las observaciones adicionales del cultivo" readonly></textarea>
								</fieldset>
							</div>

							<div class="col-lg-12">
								<button type="button" class="btn azul btn-inline btn-secondary float-right mt-10" id="btnAtras" style="margin-right: 6px;">Atrás</button>
							</div>
						</form>
					</div>
				</section>
			<?php
				} else if(isset($_GET['ID']) && isset($_GET['EDIT'])) {
			?>
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Actualizar Parametros Fisico-Quimicos</h5>
					</div>

					<div class="row">
						<form method="post" id="parafq_form">
							<input type="hidden" name="id_par_fq" id="id_par_fq">
							<input type="hidden" name="id_usu" id="id_usu">

							<div class="col-md-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="fecha">Fecha de Creación</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="fecha" name="fecha" readonly>
										<i class="font-icon font-icon-calend"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-12">
								<fieldset class="form-group">
									<label for="id_cultivo" class="form-label semibold">Cultivo</label>
									<div>
										<select id="id_cultivo" name="id_cultivo" class="form-control" required>
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="rango_amonio">Rango de Amonio</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="rango_amonio" name="rango_amonio" placeholder="Ingrese Número" required>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="rango_nitrito">Rango de Nitrito</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="rango_nitrito" name="rango_nitrito" placeholder="Ingrese Número" required>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="rango_nitrato">Rango de Nitrato</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="rango_nitrato" name="rango_nitrato" placeholder="Ingrese Número" required>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="rango_ph">Rango de PH</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="rango_ph" name="rango_ph" placeholder="Ingrese Número" required>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="cant_melaza">Cantidad de Melaza</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="cant_melaza" name="cant_melaza" placeholder="Ingrese Número" required>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="porc_agua">Porcentaje de Agua (%)</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="porc_agua" name="porc_agua" placeholder="Ingrese Número" required>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="observaciones">Observaciones de los Parametros</label>
									<textarea id="observaciones" name="observaciones" rows="6" class="form-control" placeholder="Añada las observaciones de los parámetros" maxlength="200"></textarea>
									<small class="text-muted text-danger alerta" id="observaciones_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
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
	<script src="view/FmtParametrosFQ/fmtparafq.js"></script>

</body>
</html>