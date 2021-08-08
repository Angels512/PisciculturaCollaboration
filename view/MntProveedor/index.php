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
							<h2>Gestionar Proveedores</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Proveedores</li>
							</ol>
						</div>
					</div>
				</div>
			</header>


			<section class="widget top-tabs widget-tabs-compact">
				<div class="widget-tabs-nav bordered">
					<ul class="tbl-row" role="tablist">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#w-3-tab-2" role="tab">
								<i class="font-icon font-icon-users-two"></i>
								Nuevo Proveedor
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#w-3-tab-3" role="tab">
								<i class="font-icon font-icon-eye"></i>
								Gestionar Proveedor
							</a>
						</li>
					</ul>
				</div>
				<div class="tab-content widget-tabs-content">
					<div class="tab-pane" id="w-3-tab-2" role="tabpanel">
						<section class="box-typical box-typical-padding">
							<form method="post" id="proveedor_form"> 
									<div class="form-group"> 
										<label  class="form-label semibold" for="nombre_emp">Nombre Proveedor</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="nombre_emp" name="nombre_emp" placeholder="Ingrese Nombre" required>
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label semibold" for="direccion_emp">Dirección Proveedor</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="direccion_emp" name="direccion_emp" placeholder="Ingrese Dirección" required>
											<i class="fa fa-home"></i>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label semibold" for="telefono_emp">Teléfono Proveedor</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="telefono_emp" name="telefono_emp" placeholder="Ingrese Teléfono" required>
											<i class="fa fa-phone"></i>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label semibold" for="correo_emp">Correo Proveedor</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="correo_emp" name="correo_emp" placeholder="Ingrese Correo" required>
											<i class="fa fa-envelope"></i>
										</div>
									</div>
									<button type="button" name="action" id="inser_prove" class="btn btn-rounded btn-primary">Guardar</button>
								<div>								                  						
							</form>
						</section>
					</div>
					<div class="tab-pane" id="w-3-tab-3" role="tabpanel">
						<section>
							<h4>Consultar Proveedor</h4>

							<div class="row">
								<div class="col-lg-6">
									<label class="form-label semibold"  for="id_prove">Proveedor</label>
										<select id="id_prove" name="id_prove" class="form-control">
										</select>
								</div>
							</div>
							<br>
						</section>
					</div>
				</div>
      </section>
		
    </div>

	<?php require_once("../../public/templates/js.php"); ?>

	<script src="view/MntProveedor/mntproveedor.js"></script>

</body>
</html>