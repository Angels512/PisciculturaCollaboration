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
								<li><a href="#">Inicio</a></li>
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
							<a class="nav-link" data-toggle="tab" href="#w-3-tab-2" role="tab">
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
					<div class="tab-pane" id="w-3-tab-2" role="tabpanel">
						<section class="box-typical box-typical-padding">
							<form method="post" id="product_form">
								<div>
									<h5>Ingrese los Datos</h5>
								</div>

								<div class="form-group">
										<label class="form-label semibold" for="id_clase">Nombre Porducto</label>
										<select id="id_clase" name="id_clase" class="form-control">
										</select>
								</div>

								<div class="form-group">
									<label  class="form-label semibold" for="fech_venc">Fecha de Vencimiento</label>
									<div class="form-group">
										<div class='input-group date'>
											<input id="fech_venc" name="fech_venc" type="text" class="form-control daterange3">
											<span class="input-group-addon">
												<i class="font-icon font-icon-calend"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label semibold"  for="num_lote">Número de Lote</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="num_lote" name="num_lote" placeholder="Ingrese Número" required>
										<i class="glyphicon glyphicon-barcode"></i>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label semibold"  for="id_prove">Proveedor</label>
									<select id="id_prove" name="id_prove" class="form-control">
									</select>
								</div>

								<div class="form-group">
									<button type="submit" name="action" class="btn btn-rounded float-right btn-primary">Guardar</button>
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
									<div class="col-lg-10 form-group">
										<select id="id_produ" class="form-control">
										</select>
									</div>

									<div class="col-lg-1 form-group">
										<button type="button" name="action" id="consul_produ" class="btn btn-rounded btn-inline btn-primary-outline btn-sm" style="margin-top: 6px;">Consultar</button>
									</div>
								</fieldset>
							</div>

							<div id="infoproducto">
								<section class="box-typical col-lg-12">
									<header class="box-typical-header-sm bordered">Información</header>
									<div class="box-typical-inner">
										<ul class="profile-links-list">
											<li class="nowrap">
												<p><i class="font-icon-cart" aria-hidden="true"></i><b>&nbsp&nbsp Nombre Producto:</b> <span id="nombreprodu"></span></p>
											</li>
											<li class="nowrap">
												<p><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i><b>&nbsp&nbsp Fecha de Vencimiento:</b> <span id="fechavenc"></span></p>
											</li>
											<li class="nowrap">
												<p><i class="glyphicon glyphicon-barcode"></i><b>&nbsp&nbsp Número de Lote:</b> <span id="numeroLote"></span></p>
											</li>
											<li class="nowrap">
												<p><i class="fa fa-bus"></i><b>&nbsp&nbsp Proveedor:</b> <span id="proveedor"></span></p>
											</li>
										</ul>
									</div>
								</section>

								<button type="button" name="action" id="modi_produ" class="btn btn-rounded btn-inline btn-primary-outline btn-sm">Modificar</button>
								<button type="button" name="action" id="elim_produ" class="btn btn-rounded btn-inline btn-primary-outline btn-sm">Eliminar</button>
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