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
							<h2>Formato Estado General de Acuicultura</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="inicio">Inicio</a></li>
								<li><a href="#">Crear Formatos</a></li>
								<li class="active">Estado Acuicultura</li>
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
					<form method="post" id="estacui_form">

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

						<div class="col-sm-12">
							<label class="form-label semibold" for="obser_adic">Observaciones Generales</label>
							<textarea id="obser_gene" name="obser_gene" rows="6" class="form-control" placeholder="Añada las observaciones pertinentes"></textarea>
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
    <script src="view/FmtEstadoAcuicultura/fmtestacui.js"></script>
	

</body>
</html>