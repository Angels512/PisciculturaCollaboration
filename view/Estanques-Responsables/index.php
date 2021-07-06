<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Estanques y Responsables</title>

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
										<li class="active">Estanques y Responsables</li>
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
								<a class="nav-link active" href="#biometrias" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="glyphicon glyphicon-oil"></i>
										Estanques
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tbl_alim" role="tab" data-toggle="tab">
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
					<div role="tabpanel" class="tab-pane fade in active" id="biometrias">

						<!--Aqui va el Formato de Responsables-->

					</div><!--.tab-pane-->

					<div role="tabpanel" class="tab-pane fade" id="tbl_alim">
						<form method="post" id="responsable_form">
							<div>
								<h5><strong>Ingrese los Datos</strong></h5>
							</div>
							<br>
							<div class="form-group">
								<label class="form-label" for="nombre_respon">Nombre Responsable</label>
								<input type="text" class="form-control" id="nombre_respon" name="nombre_respon" placeholder="Ingrese Nombre" required>
							</div>
							<div class="form-group">
								<label class="form-label" for="prod_numl">Apellido Responsable</label>
								<input type="text" class="form-control" id="prod_numl" name="prod_numl" placeholder="Ingrese Apellido" required>
							</div>
							<br>
							<div>
								<button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
								<button type="button" name="action" id="consul_respon" value="add" class="btn btn-rounded btn-primary">Consultar</button>
								<button type="button" name="action" id="modi_respon" value="add" class="btn btn-rounded btn-primary">Modificar</button>
								<button type="button" name="action" id="elim_respon" value="add" class="btn btn-rounded btn-primary">Eliminar</button> 
							</div>
						</form>
					</div><!--.tab-pane-->
				</div><!--.tab-content-->

			</section><!--.tabs-section-->
        </div>
    </div>

	<?php require_once("../../public/templates/js.php"); ?>

	<script src="view/Estanques-Responsables/responsables.js"></script>

</body>
</html>