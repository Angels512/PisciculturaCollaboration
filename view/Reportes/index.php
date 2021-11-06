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
			<div>
				<section class="widget widget-tasks">
					<div>
						<a href="reporteprueba">Reporte de prueba</a>
					</div>
				</section>
			</div>

        </div>
    </div>

	<?php require_once("../../public/templates/js.php"); ?>

</body>
</html>