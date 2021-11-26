<!DOCTYPE html>
<html>

<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Productos - A'ttia</title>
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
							<h2>Gestionar Productos</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="inicio">Inicio</a></li>
								<li class="active">Productos</li>
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
								Nuevo Producto
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#w-3-tab-3" role="tab">
								<i class="font-icon font-icon-eye"></i>
								Gestionar Producto
							</a>
						</li>
					</ul>
				</div>
				<div class="tab-content widget-tabs-content">
					<div class="tab-pane active" id="w-3-tab-2" role="tabpanel">
						<section class="box-typical box-typical-padding">
							<form method="post" id="product_form">
								<div>
									<h5>Ingrese los Datos</h5>
								</div>

								<div class="form-group">
										<label class="form-label semibold" for="id_clase">Nombre Porducto <span class="color-red">*</span></label>
										<select id="id_clase" name="id_clase" class="form-control">
										</select>
								</div>

								<div class="form-group">
									<label  class="form-label semibold" for="fech_venc">Fecha de Vencimiento <span class="color-red">*</span></label>
									<div class="form-group">
										<div class='input-group date'>
											<input id="fech_venc" name="fech_venc" type="text" class="form-control daterange3" value="2021-11-05">
											<span class="input-group-addon">
												<i class="font-icon font-icon-calend"></i>
											</span>
										</div>
										<small class="text-muted text-danger alerta" id="fech_venc_alert" hidden>La fecha de vencimiento debe ser posterior a hoy.</small>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label semibold"  for="num_lote">Número de Lote <span class="color-red">*</span></label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="num_lote" name="num_lote" placeholder="Ingrese Número" value="R">
										<i class="glyphicon glyphicon-barcode" id="num_lote_icon" aria-hidden="true"></i>
										<small class="text-muted text-danger alerta" id="num_lote_alert" hidden>El número de lote debe contener una R y números, máximo 16 caracteres.</small>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label semibold"  for="id_prove">Proveedor <span class="color-red">*</span></label>
									<select id="id_prove" name="id_prove" class="form-control">
									</select>
								</div>

								<div class="form-group">
									<button type="submit" name="action" class="btn azul btn-inline float-right btn-primary">Guardar</button>
								</div>

							</form>
						</section>
					</div>

					<div class="tab-pane" id="w-3-tab-3" role="tabpanel">
						<section>
							<h4>Consultar Producto</h4>

							<p><em>Elija el producto que desea consultar:</em></p>

							<div class="row">
								<fieldset>
									<div class="col-lg-12 form-group">
										<select id="id_produ" class="form-control" onchange="listarDatos()">
										</select>
									</div>
								</fieldset>
							</div>

							<div id="infoproducto">
								<section class="col-lg-12">
									<br>
									<h4 class="box-typical-header-sm bordered">Información</h4>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-3 col-xs-12">
												<section class="widget widget-simple-sm-fill azul2" style="width: 90%;">
													<div class="widget-simple-sm-icon">
														<i class="font-icon font-icon-cart"></i>
													</div>
													<div class="widget-simple-sm-fill-caption"><b style="font-size: 12pt;">Nombre Producto</b><br><span id="nombreprodu"></span></div>
												</section>
											</div><!--.widget-simple-sm-fill-->
											<div class="col-md-3 col-xs-12">
												<section class="widget widget-simple-sm-fill azul2" style="width: 90%;">
													<div class="widget-simple-sm-icon">
														<i class="font-icon glyphicon glyphicon-calendar"></i>
													</div>
													<div class="widget-simple-sm-fill-caption"><b style="font-size: 12pt;">Fecha de Vencimiento<br></b><span id="fechavenc"></div>
												</section>
											</div><!--.widget-simple-sm-fill-->
											<div class="col-md-3 col-xs-12">
												<section class="widget widget-simple-sm-fill azul2" style="width: 90%;">
													<div class="widget-simple-sm-icon">
														<i class="font-icon glyphicon glyphicon-barcode"></i>
													</div>
													<div class="widget-simple-sm-fill-caption"><b style="font-size: 12pt;">Número de Lote</b><br><span id="numeroLote"></span></div>
												</section><!--.widget-simple-sm-fill-->
											</div>
											<div class="col-md-3 col-xs-12">
												<section class="widget widget-simple-sm-fill azul2" style="width: 90%;">
													<div class="widget-simple-sm-icon">
														<i class="font-icon fa fa-bus"></i>
													</div>
													<div class="widget-simple-sm-fill-caption"><b style="font-size: 12pt;">Proveedor</b><br><span id="proveedor"></span></div>
												</section><!--.widget-simple-sm-fill-->
											</div>
										</div>
									</div>
								</section>

								<button type="button" name="action" id="modi_produ" class="btn btn-inline btn-inline btn-primary-outline btn-sm">Modificar</button>
								<button type="button" name="action" id="elim_produ" class="btn btn-inline btn-inline btn-primary-outline btn-sm">Eliminar</button>
							</div>
						</section>
					</div>
				</div>
     		</section>
		</div>
    </div>

	<?php require_once("../../public/templates/js.php"); ?>
	<?php require_once("modalproducto.php"); ?>

	<script src="view/MntProducto/mntproducto.js"></script>

</body>
</html>