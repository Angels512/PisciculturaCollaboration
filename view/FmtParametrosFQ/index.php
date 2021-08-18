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
							<h2>Formato Parametros Fisico-Quimicos</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="inicio">Inicio</a></li>
								<li><a href="#">Crear Formatos</a></li>
								<li class="active">Parametros FQ</li>
							</ol>
						</div>
					</div>
				</div>
			</header>


			<section class="box-typical box-typical-padding">
				<div>
					<h5><strong>Ingrese los Datos</strong></h5>
				</div>

				<div class="row">
					<form method="post" id="parafq_form">

						<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

						<div class="col-md-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="fecha">Fecha de Creación</label>
								<div class="form-control-wrapper form-control-icon-right">
									<input type="text" class="form-control" id="fecha" name="fecha" disabled>
									<i class="font-icon font-icon-calend"></i>
								</div>
							</fieldset>
						</div>

                        <div class="col-lg-12">
							<label for="id_cultivo" class="form-label semibold">Cultivo</label>
							<div>
								<select id="id_cultivo" name="id_cultivo" class="form-control">
								</select>
							</div>
						</div>

                        <br>

                        <!--Sliders-->

						<div class="col-md-6">
							<div class="form-group">
								<label for="rango_amonio" class="form-label semibold">Rango de Amonio:</label>
								<div class="form-group range-slider-red">
									<input type="text" id="rango_amonio" name="rango_amonio" value=""/>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<label for="rango_nitrito" class="form-label semibold">Rango de Nitrito:</label>
								<div class="form-group range-slider-blue">
									<input type="text" id="rango_nitrito" name="rango_nitrito" value=""/>
								</div>
						</div>

						<div class="col-md-6">
							<label for="rango_nitrato" class="form-label semibold">Rango de Nitrato:</label>
								<div class="form-group range-slider-blue">
									<input type="text" id="rango_nitrato" name="rango_nitrato" value=""/>
								</div>
						</div>

						<div class="col-md-6">
							<label for="rango_ph" class="form-label semibold">Rango de PH:</label>
							<div class="form-group range-slider-red">
								<input type="text" id="rango_ph" name="rango_ph" value=""/>
							</div>
						</div>

                        <div class="col-md-6">
							<label for="cant_melaza" class="form-label semibold">Cantidad de Melaza:</label>
							<div class="form-group range-slider-red">
								<input type="text" id="cant_melaza" name="cant_melaza" value=""/>
							</div>
						</div>

                        <div class="col-md-6">
							<label for="porc_agua" class="form-label semibold">Porcentaje de Agua (%):</label>
							<div class="form-group range-slider-blue">
								<input type="text" id="porc_agua" name="porc_agua" value=""/>
							</div>
						</div>

						<div class="col-sm-12">
							<label class="form-label semibold" for="obser_adic">Observaciones de los Parámetros</label>
							<textarea id="obser_parafq" name="obser_pfq" rows="6" class="form-control" placeholder="Añada las observaciones que tenga acerca de los parametros"></textarea>
						</div>

						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>

	<?php require_once("../../public/templates/js.php") ?>
    <script src="view/FmtParametrosFQ/fmtparafq.js"></script>
	

</body>
</html>