<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Responsables - A'ttia</title>
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
									<h2>Gestionar Responsables</h2>
									<ol class="breadcrumb breadcrumb-simple">
										<li><a href="inicio">Inicio</a></li>
										<li class="active">Responsables</li>
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
							<a id="newrespon" class="btn btn-inline btn-primary azul float-right"><i class="fa fa-plus-circle"></i> &nbspNuevo Responsable</a>
						</div>
					</header>
					<div id="listaresponsables">
					</div>
				</section>
			</div>

        </div>
    </div>

	<?php require_once("modalresponsable.php"); ?>

	<?php require_once("../../public/templates/js.php"); ?>
	<script src="view/Responsables/responsables.js"></script>
</body>
</html>