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
								<li><a href="inicio">Inicio</a></li>
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
										<label  class="form-label semibold" for="nombre_emp">Nombre Proveedor <span class="color-red">*</span></label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="nombre_emp" name="nombre_emp" placeholder="Ingrese Nombre">
											<i class="fa fa-user" id="nombre_icon" aria-hidden="true"></i>
											<small class="text-muted text-danger alerta" id="nombre_alert" hidden>El nombre debe contener letras y espacios, máximo 30 caracteres.</small>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label semibold" for="direccion_emp">Dirección Proveedor <span class="color-red">*</span></label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="direccion_emp" name="direccion_emp" placeholder="Ingrese Dirección">
											<i class="fa fa-home" id="direccion_icon" aria-hidden="true"></i>
											<small class="text-muted text-danger alerta" id="direccion_alert" hidden>La dirección debe contener letras, números, caracteres como (#, - ,espacios).</small>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label semibold" for="telefono_emp">Teléfono Proveedor <span class="color-red">*</span></label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="telefono_emp" name="telefono_emp" placeholder="Ingrese Teléfono">
											<i class="fa fa-phone" id="telefono_icon" aria-hidden="true"></i>
											<small class="text-muted text-danger alerta" id="telefono_alert" hidden>El teléfono debe contener solo números, min 7 - max 10.</small>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label semibold" for="correo_emp">Correo Proveedor <span class="color-red">*</span></label>
										<div class="form-control-wrapper form-control-icon-right">
											<input type="text" class="form-control" id="correo_emp" name="correo_emp" placeholder="Ingrese Correo">
											<i class="fa fa-envelope" id="correo_icon" aria-hidden="true"></i>
											<small class="text-muted text-danger alerta" id="correo_alert" hidden>El correo debe tener un @ y un dominio(.com).</small>
										</div>
									</div>
									<button type="submit" class="btn azul btn-inline btn-primary float-right">Guardar</button>
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
									<div class="col-lg-12">
										<select id="id_prove" class="form-control" onchange="listarDatos()"></select>
									</div>
								</fieldset>
							</div>

							<div id="infoproveedor">
								<br>
								<h4 class="box-typical-header-sm bordered">Información</h4>
								<div class="col-md-12">
									<div class="row">
											<div class="col-md-3 col-xs-12">
												<section class="widget widget-simple-sm-fill azul2" style="width: 90%;">
													<div class="widget-simple-sm-icon">
														<i class="font-icon fa fa-user"></i>
													</div>
													<div class="widget-simple-sm-fill-caption"><b style="font-size: 12pt;">Nombre</b><br><span id="nombre"></span></div>
												</section>
											</div><!--.widget-simple-sm-fill-->
											<div class="col-md-3 col-xs-12">
												<section class="widget widget-simple-sm-fill azul2" style="width: 90%;">
													<div class="widget-simple-sm-icon">
														<i class="font-icon fa fa-home"></i>
													</div>
													<div class="widget-simple-sm-fill-caption"><b style="font-size: 12pt;">Dirección:&nbsp&nbsp</b><span id="direccion"></div>
												</section>
											</div><!--.widget-simple-sm-fill-->
											<div class="col-md-3 col-xs-12">
												<section class="widget widget-simple-sm-fill azul2" style="width: 90%;">
													<div class="widget-simple-sm-icon">
														<i class="font-icon fa fa-phone"></i>
													</div>
													<div class="widget-simple-sm-fill-caption"><b style="font-size: 12pt;">Teléfono</b><br><span id="numeroTelefono"></span></div>
												</section><!--.widget-simple-sm-fill-->
											</div>
											<div class="col-md-3 col-xs-12">
												<section class="widget widget-simple-sm-fill azul2" style="width: 90%;">
													<div class="widget-simple-sm-icon">
														<i class="font-icon fa fa-envelope"></i>
													</div>
													<div class="widget-simple-sm-fill-caption"><b style="font-size: 12pt;">Correo</b><br><span id="email"></span></div>
												</section><!--.widget-simple-sm-fill-->
											</div>
									</div>
								</div>
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