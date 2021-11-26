<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Reportes - A'ttia</title>
</head>
<body class="with-side-menu">

    <?php require_once("../../public/templates/header.php"); ?>
	<?php require_once("../../public/templates/nav.php"); ?>

	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-10">
					<header class="section-header">
						<div class="tbl">
							<div class="tbl-row">
								<div class="tbl-cell">
									<h2>Bienvenido a la sección de Reportes</h2>
									<ol class="breadcrumb breadcrumb-simple">
										<li><a href="inicio">Inicio</a></li>
										<li class="active">Reportes</li>
									</ol>
								</div>
							</div>
						</div>
					</header>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<section class="box-typical box-typical-padding">
						<div>
							<h5>Reporte General</h5>
							<p>Elija el cultivo y el formato del que desea tener un reporte.</p>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<form method="post" id="reporte_general" action="reporte">
									<div class="col-lg-12">
										<fieldset class="form-group">
											<label for="id_cultivo" class="form-label semibold">Cultivo</label>
											<div>
												<select id="id_cultivo" name="id_cultivo" class="form-control">
												</select>
											</div>
										</fieldset>
									</div>
									<div class="col-lg-12">
										<fieldset class="form-group">
											<label for="id_formato" class="form-label semibold">Formato</label>
											<div>
												<select id="id_formato" name="id_formato" class="form-control">
													<option value="1">Biometrías de crecimiento</option>
													<option value="2">Tabla de Alimentación</option>
													<option value="3">Temperatura del Agua</option>
													<option value="4">Temperatura del Ambiente</option>
													<option value="5">Parámetros Físico Químicos</option>
												</select>
											</div>
										</fieldset>
									</div>
									<div class="col-lg-12">
										<input type="submit" value="Generar" class="btn btn-inline azul float-right mt-10" formtarget="_blank">
									</div>
								</form>
							</div>
						</div>
					</section>
				</div>
				<div class="col-lg-6">
					<section class="box-typical box-typical-padding ">
						<div>
							<h5>Reporte de Productos o Proveedores</h5>
							<p>Elija el reporte que desea obtener, Productos o Proveedores.</p>
						</div>
						<br>
						<div class="row">
							<div class="col-lg-12">
								<div class="col-xs-6">
									<section class="widget widget-simple-sm">
										<div class="widget-simple-sm-icon">
											<i class="font-icon glyphicon glyphicon-shopping-cart color-purple"></i>
										</div>
										<div class="widget-simple-sm-bottom">
											<a href="reporteprodu">Productos</a>
										</div>
									</section>
								</div>
								<div class="col-xs-6">
									<section class="widget widget-simple-sm">
										<div class="widget-simple-sm-icon">
											<i class="font-icon fa fa-bus color-purple"></i>
										</div>
										<div class="widget-simple-sm-bottom">
											<a href="reporteprove">Proveedores</a>
										</div>
									</section>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
        </div>
    </div>

	<?php require_once("../../public/templates/js.php"); ?>
	<script src="view/Reportes/reportes.js"></script>

</body>
</html>