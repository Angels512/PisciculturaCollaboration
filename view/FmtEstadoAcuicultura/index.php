<!DOCTYPE html>
<html>
<head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Estado General de Acuicultura - A'ttia</title>
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
							<h2>Formato Estado General de Acuicultura</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="inicio">Inicio</a></li>
								<li><a href="#">Formatos</a></li>
								<li class="active">Estado General de Acuicultura</li>
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
						<form method="post" id="estacui_form">

							<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

							<input type="hidden" class="form-control" id="num_organ" name="num_organ"  value="2000" readonly>

							<div class="col-lg-12">
								<fieldset class="form-group">
									<label for="id_cultivo" class="form-label semibold">Cultivo</label>
									<div>
										<select id="id_cultivo" name="id_cultivo" class="form-control">
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="obser_gene">Observaciones Generales</label>
									<textarea id="obser_gene" name="obser_gene" rows="6" class="form-control" placeholder="Ingrese las observaciones" maxlength="200"></textarea>
									<small class="text-muted text-danger alerta" id="obser_gene_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<button type="submit" name="action" value="add" class="btn azul btn-inline btn-primary float-right mt-10">Guardar</button>
							</div>
						</form>
					</div>
				</section>
			<?php
				} else if(isset($_GET['ID']) && !isset($_GET['EDIT'])) {
			?>
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Consultar Estado de Acuicultura</h5>
						<section class="box-typical box-typical-padding">


					<div class="row">

						<form method="post">
							<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"]; ?>">

							<input type="hidden" class="form-control" id="num_organ" name="num_organ"  value="2000" readonly>

							<div class="col-lg-12">
								<fieldset class="form-group">
									<label for="id_cultivo" class="form-label semibold">Cultivo</label>
									<div>
										<select id="id_cultivo" name="id_cultivo" class="form-control" disabled>
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="obser_gene">Observaciones Generales</label>
									<textarea id="obser_gene" name="obser_gene" rows="6" class="form-control" readonly></textarea>
								</fieldset>
							</div>

							<div class="col-lg-12">
								<button type="button" class="btn azul btn-inline btn-secondary float-right mt-10" id="btnAtras" style="margin-right: 6px;">Atrás</button>
							</div>

						</form>

					</div>
				</section>
				</section>
			<?php
				} else if(isset($_GET['ID']) && isset($_GET['EDIT'])) {
			?>
				<section class="box-typical box-typical-padding">
					<div>
						<h5>Actualizar Estado de Acuicultura</h5>
					</div>

					<div class="row">
						<form method="post" id="estacui_form">
							<input type="hidden" name="id_est_acui" id="id_est_acui">
							<input type="hidden" name="id_usu" id="id_usu">

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
										<select id="id_cultivo" name="id_cultivo" class="form-control">
										</select>
									</div>
								</fieldset>
							</div>

							<div class="col-sm-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="obser_gene">Observaciones del Estado General de la Acuicultura</label>
									<textarea id="obser_gene" name="obser_gene" rows="6" class="form-control" placeholder="Ingrese las observaciones" maxlength="200"></textarea>
									<small class="text-muted text-danger alerta" id="obser_gene_alert" hidden>Las observaciones son mínimo de 20 y max de 200 caracteres.</small>
								</fieldset>
							</div>

							<div class="col-lg-12">
								<button type="submit" name="action" value="add" id="guardar" class="btn btn-inline azul btn-primary float-right mt-10">Guardar</button>
								<button type="button" class="btn btn-inline btn-secondary float-right mt-10" id="btnAtras" style="margin-right: 6px;">Atrás</button>
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
	<script src="view/FmtEstadoAcuicultura/fmtestacui.js"></script>

</body>
</html>