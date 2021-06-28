<!DOCTYPE html>
<html>
<head lang="en">
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
							<h2>Formato Biometrías de crecimiento</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li><a href="#">Crear Formatos</a></li>
								<li class="active">Biocrecimiento</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
		<section class="box-typical box-typical-padding">
			<form method="" id="">
				<div>
                    <h5><strong>Ingrese los Datos</strong></h5>
				</div>
				<div class="row">
					<div class="col-lg-7">
						<label for="exampleSelect" class="form-label semibold">Etapa Organismos</label>
						<div class="col-sm-10">
							<select id="exampleSelect" class="form-control">
								<option>Alevin</option>
								<option>Cria</option>
								<option>Juvenil</option>
								<option>Ceba</option>
								<option>Engorde</option>
							</select>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-11">
						<label for="peso_organ" class="form-label semibold">Peso del Organismo(g):</label>
						<div class="form-group">
							<input type="text" id="peso_organ" name="peso_organ" value=""/>
						</div>
				</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6">
					<label for="peso_biomasa" class="form-label semibold">Peso Biomasa(gm):</label>
						<div class="form-group range-slider-green">
							<input type="text" id="peso_biomasa" name="peso_biomasa" value=""/>
						</div>
					</div>
					<div class="col-md-6">
					<label for="edad_organismo" class="form-label semibold">Edad Organismos(Semanas):</label>
						<div class="form-group range-slider-green">
							<input type="text" id="edad_organismo" name="edad_organismo" value=""/>
						</div>
					</div>
				</div>
				<br>
				<div class="form-group row">
						<div class="col-sm-6">
						<label for="color_organismo" class="form-label semibold">Color de Cuerpo del Organismo</label>
							<select id="color_organismo" class="form-control">
								<option>Naranja-Rojo</option>
								<option>Blanco-Gris</option>
							</select>
						</div>
						<div class="col-sm-6">
						<label for="ojos_organismo" class="form-label semibold">Ojos del Organismo</label>
							<select id="ojos_organismo" class="form-control">
								<option>Sobresalidos</option>
								<option>Normal</option>
							</select>
						</div>
				</div>
				<br>
				<div class="form-group row">
						<div class="col-sm-6">
						<label for="escama_organismo" class="form-label semibold">Escamas del Organismo</label>
							<select id="escama_organismo" class="form-control">
								<option>Manchadas</option>
								<option>Limpias</option>
							</select>
						</div>
						<div class="col-sm-6">
						<label for="compor_organismo" class="form-label semibold">Comportamiento Organismo</label>
							<select id="compor_organismo" class="form-control">
								<option>Enfermo</option>
								<option>Sospechoso</option>
								<option>Normal</option>
							</select>
						</div>
				</div>
				<br>
				<!--slider-->
				<div class="row">
				<div class="col-md-8">
					<label for="talla_organismo" class="form-label semibold">Crecimiento/Talla Organismo(cm):</label>
						<div class="form-group range-slider-orange">
							<input type="text" id="talla_organismo" name="talla_organismo" value=""/>
						</div>
				</div>
				</div>
				<br>
				<div class="form-group row">
						<div class="col-sm-8">
							<label class="form-label semibold" for="exampleSelect">Observaciones adicionales cultivo</label>
							<textarea rows="6" class="form-control" placeholder="Textarea"></textarea>
						</div>
				</div>
				<br>
				<div>
            	    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
            	    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
            	</div>
            </form>
		</section>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once("../../public/templates/js.php"); ?>
	<script src="view/MntBiocrecimiento/mntbiocre.js"></script>

</body>
</html>