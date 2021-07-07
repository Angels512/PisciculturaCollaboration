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
				<div class="col-lg-7">
				<header class="section-header">
					<div class="tbl">
						<div class="tbl-row">
							<div class="tbl-cell">
								<h2>Formato Tabla de Alimentación</h2>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Inicio</a></li>
									<li><a href="#">Crear Formatos</a></li>
									<li class="active">Tabla de Alimentación</li>
								</ol>
							</div>
						</div>
					</div>
				</header>
				</div>

				<div>
					<input style="margin: 3px" type="button" name="action" id="newmortandad" value="Agregar Mortandad" class="btn btn-inline btn-primary float-right mg-top ">	
					<input style="margin: 3px" type="button" name="action" id="newnovedad" value="Agregar Novedad" class="btn btn-inline btn-primary float-right mg-top">
				</div>
			</div>

		<section class="box-typical box-typical-padding" style="margin-top: 8px">
			<form method="post" id="tabla_alim">
				<div>
                    <h5><strong>Ingrese los Datos</strong></h5>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6">
						<label class="form-label semibold" for="cant_siembra">Número de Organismos</label>
						<div class="form-control-wrapper form-control-icon-right">
							<input type="text" class="form-control" id="cant_siembra" name="cant_siembra" disabled>	
                            <i class="font-icon font-icon-archive"></i>
                        </div>
					</div>
					<div class="col-md-6">
						<label class="form-label semibold" for="fecha">Fecha de Creación</label>
						<div class="form-control-wrapper form-control-icon-right">
							<input type="text" class="form-control" id="fecha" name="fecha" disabled>
                            <i class="font-icon font-icon-calend"></i>
                        </div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-7">
						<label for="porc_proteina" class="form-label semibold">Proteina Suministrada(%)</label>
						<div class="col-sm-10">
							<select id="porc_proteina" class="form-control">
								<option>10%</option>
								<option>24%</option>
								<option>30%</option>
								<option>36%</option>
							</select>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
						<div class="col-md-4">
							<label for="" class="form-label semibold">Hora Suministro Alimento #1</label>
								<div class='input-group date hora'>
									<input type='text' class="form-control" />
								<span class="input-group-addon">
									<i class="font-icon font-icon-clock"></i>
								</span>
								</div>
						</div>
						<div class="col-md-4">
							<label for="" class="form-label semibold">Hora Suministro Alimento #2</label>
								<div class='input-group date hora'>
									<input type='text' class="form-control" disabled/>
								<span class="input-group-addon">
									<i class="font-icon font-icon-clock"></i>
								</span>
								</div>
						</div>
						<div class="col-md-4">
							<label for="" class="form-label semibold">Hora Suministro Alimento #3</label>
								<div class='input-group date hora'>
									<input type='text' class="form-control" disabled/>
								<span class="input-group-addon">
									<i class="font-icon font-icon-clock"></i>
								</span>
								</div>
						</div>
				</div><!--.row-->
				<br>
				<div class="row">
					<div class="col-lg-7">
						<label for="produc_sumin" class="form-label semibold">Producto Suministrado</label>
						<div class="col-sm-10">
							<select id="produc_sumin" class="form-control">
								<option>Mojarra 34% - Polvo</option>
								<option>Mojarra 24% - Granulado</option>
								<option>Mojarra 14% - Pepa</option>
							</select>
						</div>
					</div>
				</div>
				<br>
				
				<div class="form-group row">
						<div class="col-sm-10">
							<label for="obser_atmo" class="form-label semibold">Observaciones atmosférisa</label>
							<textarea rows="6" id="obser_atmo" name="obser_atmo" class="form-control" placeholder="Textarea"></textarea>
						</div>
				</div>
				<br>
				<div class="form-group row">
						<div class="col-sm-10">
							<label class="form-label semibold" for="obser_gene">Observaciones generales cultivo</label>
							<textarea rows="6" class="form-control" id="obser_gene" name="obser_gene" placeholder="Textarea"></textarea>
						</div>
				</div>
				<br>
				<div>
            	    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
            	</div>
            </form>
		</section>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once("../../public/templates/js.php"); ?>

	<?php require_once("modalmortandad.php"); ?>
	<?php require_once("modalnovedad.php"); ?>

	<script src="view/MntTblAlimentacion/tbl_alim.js"></script>
	
</body>
</html>