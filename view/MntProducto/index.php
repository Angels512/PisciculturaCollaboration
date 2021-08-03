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

			<section class="box-typical box-typical-padding">
				<form method="post" id="product_form">
					<div>
						<h5><strong>Ingrese los Datos</strong></h5>
					</div>
					<br>
						<div class="form-group">
                    	    <label class="form-label semibold" for="fecha">Fecha de Creación</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control" id="fecha" name="fecha" disabled>
								<i class="font-icon font-icon-calend"></i>
							</div>
                    	</div>
						<div class="form-group">
							<label class="form-label semibold" for="id_clase">Nombre Producto</label>
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
					<div class="modal-footer">
						<button type="button" name="action" id="inser_produ" class="btn btn-rounded btn-primary">Guardar</button>
						<button type="button" name="action" id="consul_produ" value="add" class="btn btn-rounded btn-primary">Consultar</button>
						<button type="button" name="action" id="modi_produ" value="add" class="btn btn-rounded btn-primary">Modificar</button>
						<button type="button" name="action" id="elim_produ" value="add" class="btn btn-rounded btn-primary">Eliminar</button> 
					</div>
            	</form>
			</section>
        </div>
    </div>

	<?php require_once("../MntProveedor/modalproveedor.php");?>
	<?php require_once("../../public/templates/js.php"); ?>

	<script src="view/MntProducto/mntproducto.js"></script>
	<script src="view/MntProveedor/mntproveedor.js"></script>

</body>
</html>