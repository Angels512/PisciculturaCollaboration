<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Estanques y Responsables - A'ttia</title>
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
									<h2>Gestionar Estanques</h2>
									<ol class="breadcrumb breadcrumb-simple">
										<li><a href="#">Inicio</a></li>
										<li class="active">Estanques</li>
									</ol>
								</div>
							</div>
						</div>
					</header>
				</div>
			</div>
			<div>
				<section class="widget widget-tasks">
					<header class="widget-header">
						<div class="tbl-cell tbl-cell-action" style="display: flex; justify-content: flex-end;">
							<a id="newestanque" class="btn btn-inline azul" style="color: #fff;"><i class="fa fa-plus-circle"></i> &nbspNuevo Estanque</a>
						</div>
					</header>
					<div id="listarestanques" >

					</div>
				</section>
			</div>
        </div>
    </div>

	<?php require_once("modalestanque.php"); ?>

	<?php require_once("../../public/templates/js.php"); ?>
	<script src="view/Estanques/estanques.js"></script>
</body>
</html>