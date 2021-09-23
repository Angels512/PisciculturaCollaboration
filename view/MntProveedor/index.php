<!DOCTYPE html>
<html>

<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Proveedores - A'ttia</title>
      <style>
        .box-typical.box-typical-padding{padding: 20px 15px 50px;};
      </style>
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
							<a class="nav-link active" data-toggle="tab" href="#w-3-tab-2" role="tab">
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
					<div class="tab-pane active" id="w-3-tab-2" role="tabpanel">
						<section class="box-typical box-typical-padding">
							<form method="post" id="proveedor_form">
									<div class="form-group">
										<label  class="form-label semibold" for="nombre_emp">Nombre Proveedor</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="nombre_emp" name="nombre_emp" placeholder="Ingrese Nombre" autofocus>
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label semibold" for="direccion_emp">Dirección Proveedor</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="direccion_emp" name="direccion_emp" placeholder="Ingrese Dirección">
											<i class="fa fa-home"></i>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label semibold" for="telefono_emp">Teléfono Proveedor</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="telefono_emp" name="telefono_emp" placeholder="Ingrese Teléfono">
											<i class="fa fa-phone"></i>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label semibold" for="correo_emp">Correo Proveedor</label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="correo_emp" name="correo_emp" placeholder="Ingrese Correo">
											<i class="fa fa-envelope"></i>
										</div>
									</div>
									<button type="submit" class="btn btn-inline btn-primary float-right">Guardar</button>
								<div>
							</form>
						</section>
					</div>
					<div class="tab-pane" id="w-3-tab-3" role="tabpanel">
						<section>
							<h4>Consultar Proveedor</h4>

							<p><em>Elija el proveedor que desea consultar:</em></p>

							<div class="row">
								<fieldset class="form-group">
									<div class="col-lg-10">
										<select id="id_prove" class="form-control"></select>
									</div>
									<div class="col-lg-1">
										<button type="button" name="action" id="consul_prove" class="btn btn-inline btn-inline btn-primary-outline btn-sm" style="margin-top: 6px;">Consultar</button>
									</div>
								</fieldset>
							</div>

							<div id="infoproveedor">
								<section class="box-typical col-lg-12">
										<header class="box-typical-header-sm bordered">Información</header>
										<div class="box-typical-inner">
											<ul class="profile-links-list">
												<li class="nowrap">
													<p><i class="fa fa-user" aria-hidden="true"></i><b>&nbsp&nbsp Nombre:</b> <span id="nombre"></span></p>
												</li>
												<li class="nowrap">
													<p><i class="fa fa-home" aria-hidden="true"></i><b>&nbsp&nbsp Dirección:</b> <span id="direccion"></span></p>
												</li>
												<li class="nowrap">
													<p><i class="fa fa-phone"></i><b>&nbsp&nbsp Teléfono:</b> <span id="numeroTelefono"></span></p>
												</li>
												<li class="nowrap">
													<p><i class="fa fa-envelope"></i><b>&nbsp&nbsp Correo:</b> <span id="email"></span></p>
												</li>
											</ul>
										</div>
								</section>
								<button type="button" name="action" id="modi_prove" class="btn btn-inline btn-inline btn-primary-outline btn-sm">Modificar</button>
								<button type="button" name="action" id="elim_prove" class="btn btn-inline btn-inline btn-primary-outline btn-sm">Eliminar</button>
							</div>
						</section>
					</div>
				</div>
      		</section>
		</div>
    </div>

	<?php require_once("../../public/templates/js.php"); ?>
	<?php require_once("modalproveedor.php"); ?>

	<script src="view/MntProveedor/mntproveedor.js"></script>

</body>
</html>