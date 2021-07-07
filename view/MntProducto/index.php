<!DOCTYPE html>
<html>
<head lang="en">
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
			<div class="row">
				<div class="col-lg-10">
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
				</div>
				<div class="col-lg-2">
					<div>
						<input type="button" name="action" id="newproveedor" value="Nuevo Proveedor" class="btn btn-inline btn-primary float-right mg-top">
					</div>
				</div>
			</div>
			<section class="box-typical box-typical-padding" style="margin-top: 8px">
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
							<label class="form-label semibold" for="prod_nom">Nombre Porducto</label>
							<select id="nom_tip_produ" class="form-control">
									<option>Mojarra 34% - Polvo</option>
									<option>Mojarra 24% - Granulado</option>
									<option>Mojarra 14% - Pepa</option>
							</select>
						</div>
						<div class="form-group">
							<label  class="form-label semibold" for="fech_venc">Fecha de Vencimiento</label>
							<div class="form-group">
							<div class='input-group date'>
								<input id="daterange3" type="text" value="10/24/2020" class="form-control">
								<span class="input-group-addon">
									<i class="font-icon font-icon-calend"></i>
								</span>
							</div>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label semibold"  for="prod_numl">Número de Lote</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control" id="prod_numl" name="prod_numl" placeholder="Ingrese Número" required>
                        		<i class="glyphicon glyphicon-barcode"></i>
                        	</div>
						</div>
						<div class="form-group">
							<label class="form-label semibold"  for="prove">Proveedor</label>
							<select id="prove" class="form-control">
									<option>Carlos S.A</option>
									<option>FishFood</option>
									<option>Tilapia Company</option>
							</select>
						</div>
					<div class="modal-footer">
						<button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
						<button type="button" name="action" id="consul_produ" value="add" class="btn btn-rounded btn-primary">Consultar</button>
						<button type="button" name="action" id="modi_produ" value="add" class="btn btn-rounded btn-primary">Modificar</button>
						<button type="button" name="action" id="elim_produ" value="add" class="btn btn-rounded btn-primary">Eliminar</button> 
					</div>                   						</div>
            	</form>
			</section>
        </div>
    </div>

	<?php require_once("../MntProveedor/modalproveedor.php");?>
	<?php require_once("../../public/templates/js.php"); ?>

	<script src="view/MntProducto/mntproducto.js"></script>

</body>
</html>