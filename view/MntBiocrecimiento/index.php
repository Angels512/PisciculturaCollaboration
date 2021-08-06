<!DOCTYPE html>
<html>
<head lang="es-419">
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>PCDCB</title>
	<?php require_once("../../public/templates/head.php"); ?>
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


			<section class="box-typical box-typical-padding">
				<div>
					<h5>Ingrese los Datos</h5>
				</div>

				<div class="row">
					<form method="post" id="biocre_form">

						<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

						<div class="col-md-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="num_organ">Número de Organismos</label>
								<div class="form-control-wrapper form-control-icon-right">

									<input type="text" class="form-control" id="num_organ" name="num_organ"  value="2000" readonly>	
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


						<!--slider-->
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
								<textarea id="obser_adic" name="obser_adic" rows="6" class="form-control" placeholder="Textarea"></textarea>
							</fieldset>
						</div><br>

						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-primary mt-10">Guardar</button>
						</div>
					</form>
				</div>
			</section>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once("../../public/templates/js.php"); ?>
	<script src="view/MntBiocrecimiento/mntbiocre.js"></script>

</body>
</html>