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
							<h2>Formato Temperatura Agua</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="inicio">Inicio</a></li>
								<li><a href="#">Crear Formatos</a></li>
								<li class="active">Temperatura Agua</li>
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
					<form method="post" id="tempagua_form">

						<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

						<div class="col-md-12">
							<label class="form-label semibold" for="fecha">Fecha de Creación</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control" id="fecha" name="fecha" disabled>
                            	<i class="font-icon font-icon-calend"></i>
                        	</div>
						</div>

                        <div class="col-lg-12">
							<label for="id_cultivo" class="form-label semibold">Cultivo</label>
							<div>
								<select id="id_cultivo" name="id_cultivo" class="form-control">
								</select>
							</div>
						</div>

						<div class="col-md-12">
							<label class="form-label semibold" for="num_lote">Número de Día</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control" id="num_lote" name="num_lote" placeholder="Ingrese Número" required>
                        		<i class="glyphicon glyphicon-barcode"></i>
                        	</div>
						</div>

                        <!--Sliders-->

						<div class="col-md-6">
							<label for="grados1" class="form-label semibold">Grados 1:</label>
								<div class="form-group range-slider-blue">
									<input type="text" id="grados1" name="grados1" value=""/>
								</div>
						</div>

						<div class="col-md-6">
							<label for="grados2" class="form-label semibold">Grados 2:</label>
								<div class="form-group range-slider-blue">
									<input type="text" id="grados2" name="grados2" value=""/>
								</div>
						</div>

						<div class="col-md-6">
							<label for="grados3" class="form-label semibold">Grados 3:</label>
							<div class="form-group range-slider-red">
								<input type="text" id="grados3" name="grados3" value=""/>
							</div>
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
    <script src="view/FmtTemperaturaAgua/fmttempagua.js"></script>
	

</body>
</html>