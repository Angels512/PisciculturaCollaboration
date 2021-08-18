<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Consultar cultivo - A'ttia</title>
</head>
<body class="with-side-menu">

    <?php require_once('../../public/templates/header.php'); ?>
	<?php require_once('../../public/templates/nav.php'); ?>

	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Consultar Formatos Piscicultura</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Consultar Formatos</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<section class="tabs-section">
				<div class="tabs-section-nav tabs-section-nav-icons">
					<div class="tbl">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#biometrias" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="glyphicon glyphicon-scale"></i>
										Biocrecimiento
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="#tbl_alim" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="font-icon font-icon-notebook-bird"></span>
										Tabla Alimentación
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="#tbl_alim" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="font-icon font-icon-notebook-bird"></span>
										Parametros FQ
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="#tbl_alim" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="font-icon font-icon-notebook-bird"></span>
										Temperatura Agua
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="#tbl_alim" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="font-icon font-icon-notebook-bird"></span>
										Temperatura Ambiente
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="#tbl_alim" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="font-icon font-icon-notebook-bird"></span>
										Estado Acuicultura
									</span>
								</a>
							</li>

						</ul>
					</div>
				</div><!--.tabs-section-nav-->

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="biometrias">
					<section class="card">
						<div class="card-block">
							<table id="dt_biometrias" class="display table table-striped table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre del Empleado</th>
										<th>Fecha de creación</th>
										<th>Comportamiento</th>
										<th>Cant_Siembra</th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</section>
					</div><!--.tab-pane-->
					<div role="tabpanel" class="tab-pane fade" id="tbl_alim">
						<section class="card">
							<div class="card-block">
								<table id="dt_tbl_alim" class="display table table-striped table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre del Empleado</th>
										<th>Fecha de creación</th>
										<th>Observación</th>
										<th>Cant_Siembra</th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
								</table>
							</div>
						</section>
					</div><!--.tab-pane-->
				</div><!--.tab-content-->
			</section><!--.tabs-section-->

		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once('../../public/templates/js.php'); ?>

	<script src="view/ConsultarFormatos/consultarformatos.js"></script>
</body>
</html>