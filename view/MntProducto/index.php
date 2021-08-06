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
							<h2>Gestionar Productos</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Productos</li>
							</ol>
						</div>
						<div class="tbl-cell tbl-cell-action">
					   	 	<a id="newproveedor" class="btn btn-inline btn-primary float-right mg-top">Nuevo Proveedor</a>
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
								
								<div>
									<button type="button" name="action" id="inser_produ" class="btn btn-rounded btn-primary">Guardar</button>
								</div>                   						
							</form>
						</section>
					</div>
					<div class="tab-pane" id="w-3-tab-3" role="tabpanel">
						<section>
							<h4>Consultar Producto</h4>

							<div class="row">
								<div class="col-lg-7">
									<label for="id_produ" class="form-label semibold">Producto</label>
									<div class="col-sm-10">
										<select id="id_produ" name="id_produ" class="form-control">
										</select>
									</div>
								</div>
							</div>
							<br>
						</section>
					</div>
				</div>
      </section>
		
    </div>

	<?php require_once("../MntProveedor/modalproveedor.php");?>
	<?php require_once("../../public/templates/js.php"); ?>

	<script src="view/MntProducto/mntproducto.js"></script>
	<script src="view/MntProveedor/mntproveedor.js"></script>

</body>
</html>