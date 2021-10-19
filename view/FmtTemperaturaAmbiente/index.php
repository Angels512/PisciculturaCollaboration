<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Temperatura del Ambiente - A'ttia</title>
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
							<h2>Formato Temperatura del Ambiente</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="inicio">Inicio</a></li>
								<li><a href="#">Formatos</a></li>
								<li class="active">Temperatura Ambiente</li>
							</ol>
						</div>
					</div>
				</div>
			</header>


			<?php
				if (!isset($_GET['ID']) && !isset($_GET['EDIT'])){
			?>
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Ingrese los Datos</h5>
					</div>

					<div class="row">
						<form method="post" id="tempamb_form">

							<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

							<input type="hidden" class="form-control" id="num_organ" name="num_organ"  value="2000" readonly>


							<div class="col-lg-6">
								<fieldset class="form-group">
									<label for="id_cultivo" class="form-label semibold">Cultivo</label>
									<div>
										<select id="id_cultivo" name="id_cultivo" class="form-control">
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="num_dia">Número de Día</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="num_dia" name="num_dia" placeholder="Ingrese Número" required>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-md-12">
								<fieldset class="form-group">
									<label for="grados1" class="form-label semibold">Grados 1:</label>
									<div class="form-group range-slider-green">
										<input type="text" class="slider" id="grados1" name="grados1" value=""/>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="grados2" class="form-label semibold">Grados 2:</label>
									<div class="form-group range-slider-green">
										<input type="text" class="slider" id="grados2" name="grados2" value=""/>
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="grados3" class="form-label semibold">Grados 3:</label>
									<div class="form-group range-slider-green">
										<input type="text" class="slider" id="grados3" name="grados3" value=""/>
									</div>
								</fieldset>
							</div>

							</div>

							<div class="col-lg-12">
								<button type="submit" name="action" value="add" class="btn btn-inline btn-primary float-right mt-10">Guardar</button>
							</div>

							<br>
							<br>

						</form>
					</div>
				</section>
			<?php
				} else if(isset($_GET['ID']) && !isset($_GET['EDIT'])) {
			?>
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Consultar Temperatura del Ambiente</h5>
					</div>

					<div class="row">
						<form method="post">

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="fecha">Fecha de Creación</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="fecha" name="fecha" readonly>
										<i class="font-icon font-icon-calend"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-6">
								<fieldset class="form-group">
									<label for="id_cultivo" class="form-label semibold">Cultivo</label>
									<div>
										<select id="id_cultivo" name="id_cultivo" class="form-control" disabled>
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="num_dia">Número de Día</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="num_dia" name="num_dia" placeholder="Ingrese Número" readonly>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="grados1">Grados 1:</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="grados1" name="grados1" readonly>
										<i class="glyphicon glyphicon-barcode"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="grados2">Grados 2:</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="grados2" name="grados2" readonly>
										<i class="glyphicon glyphicon-barcode"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="grados3">Grados 3:</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="grados3" name="grados3" readonly>
										<i class="glyphicon glyphicon-barcode"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-12">
								<a href="/PisciculturaProject/consultar-cultivo" class="btn btn-inline btn-secondary float-right mt-10">Atrás</a>
							</div>
						</form>
					</div>
				</section>
			<?php
				} else if(isset($_GET['ID']) && isset($_GET['EDIT'])) {
			?>
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Actualizar Temperatura Ambiente</h5>
					</div>

					<div class="row">
						<form method="post" id="tempamb_form">
							<input type="hidden" name="id_temp_amb" id="id_temp_amb">
							<input type="hidden" name="id_usu" id="id_usu">

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="fecha">Fecha de Creación</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="fecha" name="fecha">
										<i class="font-icon font-icon-calend"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-6">
								<fieldset class="form-group">
									<label for="id_cultivo" class="form-label semibold">Cultivo</label>
									<div>
										<select id="id_cultivo" name="id_cultivo" class="form-control">
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-6">
								<label class="form-label semibold" for="num_dia">Número de Día</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="num_dia" name="num_dia" placeholder="Ingrese Número" required>
                        				<i class="glyphicon glyphicon-barcode"></i>
                        			</div>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="grados1">Grados 1:</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="grados1" name="grados1" required>
										<i class="glyphicon glyphicon-barcode"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="grados2">Grados 2:</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="grados2" name="grados2" required>
										<i class="glyphicon glyphicon-barcode"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-md-6">
								<fieldset class="form-group">
									<label class="form-label semibold" for="grados3">Grados 3:</label>
									<div class="form-control-wrapper form-control-icon-right">
										<input type="text" class="form-control" id="grados3" name="grados3" required>
										<i class="glyphicon glyphicon-barcode"></i>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-12">
								<a href="/PisciculturaProject/consultar-cultivo" class="btn btn-inline btn-secondary float-right mt-10">Atrás</a>
								<button type="submit" name="action" value="add" id="guardar" class="btn btn-inline btn-primary float-right mt-10" style="margin-right: 6px;">Guardar</button>
							</div>
						</form>
					</div>
				</section>
			<?php
				}
			?>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once("../../public/templates/js.php"); ?>
	<script src="view/FmtTemperaturaAmbiente/fmttempamb.js"></script>

</body>
</html>