<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Biocrecimiento- A'ttia</title>
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
								<li><a href="#">Inicio</a></li>
								<li><a href="#">Formatos</a></li>
								<li class="active">Biocrecimiento</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<?php
				$url= $_SERVER["REQUEST_URI"];

			if ($url=='/PisciculturaProject/biocrecimiento'){
			?>
					<section class="box-typical box-typical-padding">
							<div>
								<h5>Ingrese los Datos</h5>
							</div>

							<div class="row">
								<form method="post" id="biocre_form">

									<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

									<input type="hidden" class="form-control" id="num_organ" name="num_organ"  value="2000" readonly>

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

									<div class="col-md-12">
										<fieldset class="form-group">
											<label for="peso_organ" class="form-label semibold">Peso del Organismo(g):</label>
											<div class="form-group">
												<input type="text" id="peso_organ" name="peso_organ" value=""/>
											</div>
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset class="form-group">
											<label for="peso_biomasa" class="form-label semibold">Peso Biomasa(gm):</label>
											<div class="form-group range-slider-green">
												<input type="text" id="peso_biomasa" name="peso_biomasa" value=""/>
											</div>
										</fieldset>
									</div>
									<div class="col-md-6">
										<fieldset class="form-group">
											<label for="edad_organ" class="form-label semibold">Edad Organismos(Semanas):</label>
											<div class="form-group range-slider-green">
												<input type="text" id="edad_organ" name="edad_organ" value=""/>
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

									<div class="col-md-12">
										<fieldset class="form-group">
											<label for="crecimiento_organ" class="form-label semibold">Crecimiento/Talla Organismo(cm):</label>
											<div class="form-group range-slider-orange">
												<input type="text" id="crecimiento_organ" name="crecimiento_organ" value=""/>
											</div>
										</fieldset>
									</div>

									<div class="col-sm-12">
										<fieldset class="form-group">
											<label class="form-label semibold" for="obser_adic">Observaciones adicionales cultivo</label>
											<textarea id="obser_adic" name="obser_adic" rows="6" class="form-control" placeholder="Ingrese las observaciones adicionales del cultivo"></textarea>
										</fieldset>
									</div>
									<div class="col-lg-12">
										<button type="submit" name="action" value="add" class="btn btn-rounded btn-primary float-right mt-10">Guardar</button>
									</div>
								</form>
							</div>
					</section>
			<?php
			}else{
			?>
					<section class="box-typical box-typical-padding">
							<div>
								<h5 id="titulobio">Consultar Biocrecimiento</h5>
							</div>

							<div class="row">
								<form method="post" id="biocre_edit">
									<input type="hidden" name="id_biocre" id="id_biocre1">
									<input type="hidden" name="id_usu" id="id_usu1">

									<div class="col-md-6">
										<fieldset class="form-group">
											<label class="form-label semibold" for="num_organ">Número de Organismos</label>
											<div class="form-control-wrapper form-control-icon-right">
												<input type="text" class="form-control" id="num_organ1" name="num_organ"  readonly>
												<i class="font-icon font-icon-archive"></i>
											</div>
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset class="form-group">
											<label class="form-label semibold" for="fecha">Fecha de Creación</label>
											<div class="form-control-wrapper form-control-icon-right">
												<input type="text" class="form-control" id="fecha1" name="fecha" readonly>
												<i class="font-icon font-icon-calend"></i>
											</div>
										</fieldset>
									</div>

									<div class="col-lg-6">
										<fieldset class="form-group">
											<label for="id_cultivo" class="form-label semibold">Cultivo</label>
											<div>
												<select id="id_cultivo1" name="id_cultivo" class="form-control">
												</select>
											</div>
										</fieldset>
									</div>

									<div class="col-lg-6">
										<fieldset class="form-group">
											<label for="id_etapa" class="form-label semibold">Etápa Organismos</label>
											<div>
												<select id="id_etapa1" name="id_etapa" class="form-control">
												</select>
											</div>
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset class="form-group">
											<label class="form-label semibold" for="peso_organ">Peso del Organismo(g):</label>
											<div class="form-control-wrapper form-control-icon-right">
												<input type="text" class="form-control" id="peso_organ1" name="peso_organ">
												<i class="font-icon glyphicon glyphicon-scale"></i>
											</div>
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset class="form-group">
											<label class="form-label semibold" for="peso_biomasa">Peso Biomasa(gm):</label>
											<div class="form-control-wrapper form-control-icon-right">
												<input type="text" class="form-control" id="peso_biomasa1" name="peso_biomasa">
												<i class="font-icon font-icon-notebook-bird"></i>
											</div>
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset class="form-group">
											<label class="form-label semibold" for="edad_organ">Edad Organismos(Semanas):</label>
											<div class="form-control-wrapper form-control-icon-right">
												<input type="text" class="form-control" id="edad_organ1" name="edad_organ">
												<i class="font-icon glyphicon glyphicon-hourglass"></i>
											</div>
										</fieldset>
									</div>

									<div class="col-sm-6">
										<fieldset class="form-group">
											<label for="color_organ" class="form-label semibold">Color de Cuerpo del Organismo</label>
											<select id="color_organ1" name="color_organ" class="form-control">
												<option value="Naranja-Rojo">Naranja-Rojo</option>
												<option value="Blanco-Gris">Blanco-Gris</option>
											</select>
										</fieldset>
									</div>

									<div class="col-sm-6">
										<fieldset class="form-group">
											<label for="escamas_organ" class="form-label semibold">Escamas del Organismo</label>
											<select id="escamas_organ1" name="escamas_organ" class="form-control">
												<option value="Manchadas">Manchadas</option>
												<option value="Limpias">Limpias</option>
											</select>
										</fieldset>
									</div>

									<div class="col-sm-6">
										<fieldset class="form-group">
											<label for="ojos_organ" class="form-label semibold">Ojos del Organismo</label>
											<select id="ojos_organ1" name="ojos_organ" class="form-control">
												<option value="Sobresalidos">Sobresalidos</option>
												<option value="Normal">Normal</option>
											</select>
										</fieldset>
									</div>

									<div class="col-sm-6">
										<fieldset class="form-group">
											<label for="compor_organ" class="form-label semibold">Comportamiento Organismo</label>
											<select id="compor_organ1" name="compor_organ" class="form-control">
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
												<input type="text" class="form-control" id="crecimiento_organ1" name="crecimiento_organ">
												<i class="font-icon font-icon-pencil"></i>
											</div>
										</fieldset>
									</div>

									<div class="col-sm-12">
										<fieldset class="form-group">
											<label class="form-label semibold" for="obser_adic">Observaciones adicionales cultivo</label>
											<textarea id="obser_adic1" name="obser_adic" rows="6" class="form-control" placeholder="Ingrese las observaciones adicionales del cultivo"></textarea>
										</fieldset>
									</div>
									<div class="col-lg-12">
										<a href="/PisciculturaProject/consultar-cultivo" class="btn btn-rounded btn-secondary float-right mt-10">Atrás</a>
										<button type="submit" name="action" value="add" id="guardar" class="btn btn-rounded btn-primary float-right mt-10" style="margin-right: 6px;">Guardar</button>
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