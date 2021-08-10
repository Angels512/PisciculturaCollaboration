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
			<div class="row">
				<div class="col-lg-10">
					<header class="section-header">
						<div class="tbl">
							<div class="tbl-row">
								<div class="tbl-cell">
									<h2>Gestionar Estanques y Responsables</h2>
									<ol class="breadcrumb breadcrumb-simple">
										<li><a href="#">Inicio</a></li>
										<li class="active">Estanques/Responsables</li>
									</ol>
								</div>
							</div>
						</div>
					</header>
				</div>
			</div>
			<section class="tabs-section">
				<div class="tabs-section-nav tabs-section-nav-icons">
					<div class="tbl">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#estanques" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="glyphicon glyphicon-oil"></i>
										Estanques
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#responsables" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="font-icon font-icon-users"></span>
										Responsables
									</span>
								</a>
							</li>
							
						</ul>
					</div>
				</div><!--.tabs-section-nav-->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="estanques">
					
						<!--Aqui va el Formato de Estanques-->

					</div><!--.tab-pane-->

					<div role="tabpanel" class="tab-pane fade" id="responsables">
						<section class="widget widget-tasks">
							<header class="widget-header">
								<div class="tbl-cell tbl-cell-action">
									<a id="newrespon" class="btn btn-inline btn-primary float-right mg-top">Nuevo Responsable</a>
								</div>
							</header>
							<div id="listaresponsables" >
								
							</div>
						</section>
					</div><!--.tab-pane-->
					
				</div><!--.tab-content-->

			</section><!--.tabs-section-->
        </div>
    </div>

	<?php require_once("../../public/templates/js.php"); ?>
	<?php require_once("modalresponsable.php"); ?>

	<script src="view/Estanques-Responsables/responsables.js"></script>

</body>
</html>