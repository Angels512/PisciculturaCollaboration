<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Biocrecimiento - A'ttia</title>
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
							<h2>Formato Biometrías de crecimiento</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="inicio">Inicio</a></li>
								<li><a href="#">Formatos</a></li>
								<li class="active">Biocrecimiento</li>
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
						<form method="post" id="biocre_form">

							<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

							<input type="hidden" class="form-control" id="num_organ" name="num_organ" value="0">

							<div class="col-lg-6">
								<fieldset class="form-group">
									<label for="id_cultivo" class="form-label semibold">Cultivo</label>
									<div>
										<select id="id_cultivo" name="id_cultivo" class="form-control"  onchange="atributos_derv(this.value)">
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-6">
								<fieldset class="form-group">
									<label for="id_etapa" class="form-label semibold">Etápa Organismos</label>
									<div>
										<select id="id_etapa" name="id_etapa" class="form-control">
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-md-12">
								<fieldset class="form-group">
									<label for="peso_organ" class="form-label semibold">Peso del Organismo(g):</label>
									<div class="form-group">
										<input type="text" class="slider" id="peso_organ" name="peso_organ" value=""/>
									</div>
								</fieldset>
							</div>

							<input type="hidden" id="peso_biomasa" name="peso_biomasa" value="">
							<input type="hidden" id="edad_organ" name="edad_organ" value="">

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="color_organ" class="form-label semibold">Color de Cuerpo del Organismo</label>
									<select id="color_organ" name="color_organ" class="form-control">
										<option value="Naranja-Rojo">Naranja-Rojo</option>
										<option value="Blanco-Gris">Blanco-Gris</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="escamas_organ" class="form-label semibold">Escamas del Organismo</label>
									<select id="escamas_organ" name="escamas_organ" class="form-control">
										<option value="Manchadas">Manchadas</option>
										<option value="Limpias">Limpias</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="ojos_organ" class="form-label semibold">Ojos del Organismo</label>
									<select id="ojos_organ" name="ojos_organ" class="form-control">
										<option value="Sobresalidos">Sobresalidos</option>
										<option value="Normal">Normal</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="compor_organ" class="form-label semibold">Comportamiento Organismo</label>
									<select id="compor_organ" name="compor_organ" class="form-control">
										<option value="Enfermo">Enfermo</option>
										<option value="Sospechoso">Sospechoso</option>
										<option value="Normal">Normal</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label for="crecimiento_organ" class="form-label semibold">Crecimiento/Talla Organismo(cm):</label>
									<div class="form-group range-slider-orange">
										<input type="text" class="slider" id="crecimiento_organ" name="crecimiento_organ" value=""/>
									</div>
								</fieldset>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="obser_adic">Observaciones adicionales cultivo</label>
									<textarea id="obser_adic" name="obser_adic" rows="6" class="form-control" placeholder="Ingrese las observaciones adicionales del cultivo" maxlength="200"></textarea>
									<small class="text-muted text-danger alerta" id="obser_adic_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<button type="submit" name="action" value="add" class="btn btn-inline azul btn-primary float-right mt-10">Guardar</button>
							</div>
						</form>
					</div>
				</section>
			<?php
				} else if(isset($_GET['ID']) && !isset($_GET['EDIT'])) {
			?>
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Consultar Biocrecimiento</h5>
					</div>

					<div class="row">
						<form method="post">
							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="num_organ">Número de Organismos</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="num_organ" name="num_organ" readonly>
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
									<label for="id_etapa" class="form-label semibold">Etápa Organismos</label>
									<div>
										<select id="id_etapa" name="id_etapa" class="form-control" disabled>
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="peso_organ">Peso del Organismo(g):</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="peso_organ" name="peso_organ" readonly>
										<i class="font-icon glyphicon glyphicon-scale"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="peso_biomasa">Peso Biomasa(gm):</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="peso_biomasa" name="peso_biomasa" readonly>
										<i class="font-icon font-icon-notebook-bird"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="edad_organ">Edad Organismos(Semanas):</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="edad_organ" name="edad_organ" readonly>
										<i class="font-icon glyphicon glyphicon-hourglass"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="color_organ" class="form-label semibold">Color de Cuerpo del Organismo</label>
									<select id="color_organ" name="color_organ" class="form-control" disabled>
										<option value="Naranja-Rojo">Naranja-Rojo</option>
										<option value="Blanco-Gris">Blanco-Gris</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="escamas_organ" class="form-label semibold">Escamas del Organismo</label>
									<select id="escamas_organ" name="escamas_organ" class="form-control" disabled>
										<option value="Manchadas">Manchadas</option>
										<option value="Limpias">Limpias</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="ojos_organ" class="form-label semibold">Ojos del Organismo</label>
									<select id="ojos_organ" name="ojos_organ" class="form-control" disabled>
										<option value="Sobresalidos">Sobresalidos</option>
										<option value="Normal">Normal</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="compor_organ" class="form-label semibold">Comportamiento Organismo</label>
									<select id="compor_organ" name="compor_organ" class="form-control" disabled>
										<option value="Enfermo">Enfermo</option>
										<option value="Sospechoso">Sospechoso</option>
										<option value="Normal">Normal</option>
									</select>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="crecimiento_organ">Crecimiento/Talla Organismo(cm):</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="crecimiento_organ" name="crecimiento_organ" readonly>
										<i class="font-icon font-icon-pencil"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="obser_adic">Observaciones adicionales cultivo</label>
									<textarea id="obser_adic" name="obser_adic" rows="6" class="form-control" placeholder="Ingrese las observaciones adicionales del cultivo" readonly></textarea>
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
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Actualizar Biocrecimiento</h5>
					</div>

					<div class="row">
						<form method="post" id="biocre_form">
							<input type="hidden" name="id_biocre" id="id_biocre">
							<input type="hidden" name="id_usu" id="id_usu">

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="num_organ">Número de Organismos</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="num_organ" name="num_organ"  readonly>
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
									<label for="id_etapa" class="form-label semibold">Etápa Organismos</label>
									<div>
										<select id="id_etapa" name="id_etapa" class="form-control">
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="peso_organ">Peso del Organismo(g):</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="peso_organ" name="peso_organ">
										<i class="font-icon glyphicon glyphicon-scale"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="peso_biomasa">Peso Biomasa(gm):</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="peso_biomasa" name="peso_biomasa" readonly>
										<i class="font-icon font-icon-notebook-bird"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="edad_organ">Edad Organismos(Semanas):</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="edad_organ" name="edad_organ" readonly>
										<i class="font-icon glyphicon glyphicon-hourglass"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="color_organ" class="form-label semibold">Color de Cuerpo del Organismo</label>
									<select id="color_organ" name="color_organ" class="form-control">
										<option value="Naranja-Rojo">Naranja-Rojo</option>
										<option value="Blanco-Gris">Blanco-Gris</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="escamas_organ" class="form-label semibold">Escamas del Organismo</label>
									<select id="escamas_organ" name="escamas_organ" class="form-control">
										<option value="Manchadas">Manchadas</option>
										<option value="Limpias">Limpias</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="ojos_organ" class="form-label semibold">Ojos del Organismo</label>
									<select id="ojos_organ" name="ojos_organ" class="form-control">
										<option value="Sobresalidos">Sobresalidos</option>
										<option value="Normal">Normal</option>
									</select>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
									<label for="compor_organ" class="form-label semibold">Comportamiento Organismo</label>
									<select id="compor_organ" name="compor_organ" class="form-control">
										<option value="Enfermo">Enfermo</option>
										<option value="Sospechoso">Sospechoso</option>
										<option value="Normal">Normal</option>
									</select>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="crecimiento_organ">Crecimiento/Talla Organismo(cm):</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="crecimiento_organ" name="crecimiento_organ">
										<i class="font-icon font-icon-pencil"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="obser_adic">Observaciones adicionales cultivo</label>
									<textarea id="obser_adic" name="obser_adic" rows="6" class="form-control" placeholder="Ingrese las observaciones adicionales del cultivo" maxlength="200"></textarea>
									<small class="text-muted text-danger alerta" id="obser_adic_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
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
	<script src="view/MntBiocrecimiento/mntbiocre.js"></script>

</body>
</html>