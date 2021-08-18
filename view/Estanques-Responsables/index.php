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
			<div class="row">
				<div class="col-lg-10">
					<header class="section-header">
						<div class="tbl">
							<div class="tbl-row">
								<div class="tbl-cell">
									<h2>Gestionar Estanques y Responsables</h2>
									<ol class="breadcrumb breadcrumb-simple">
										<li><a href="#">Inicio</a></li>
										<li class="active">Estanques/Responsables</li>
									</ol>
								</div>
							</div>
						</div>
					</header>
				</div>
			</div>
			<section class="tabs-section">
				<div class="tabs-section-nav tabs-section-nav-icons">
					<div class="tbl">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#estanques" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="glyphicon glyphicon-oil"></i>
										Estanques
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#responsables" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="font-icon font-icon-users"></span>
										Responsables
									</span>
								</a>
							</li>
							
						</ul>
					</div>
				</div><!--.tabs-section-nav-->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="estanques">
					<form method="post" id="responsable_form">
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
								<label class="form-label semibold" for="num_lote">Número del Estanque</label>
								<div class="form-control-wrapper form-control-icon-right">
									<input type="text" class="form-control" id="num_tanque" name="num_tanque" placeholder="Ingrese número de Estanque" required>
                        			<i class="glyphicon glyphicon-barcode"></i>
                        		</div>
							</div>

							<div class="form-group">
								<label class="form-label semibold" for="num_lote">Capacidad del Estanque (L)</label>
								<div class="form-control-wrapper form-control-icon-right">
									<input type="text" class="form-control" id="capacidad_tanque" name="capacidad_tanque" placeholder="Ingrese la capacidad del Estanque en Litros" required>
                        			<i class="glyphicon glyphicon-barcode"></i>
                        		</div>
							</div>

							<div class="form-group">
								<label class="form-label semibold" for="apellido_respon">Descripción del Estanque</label>
								<div class="form-control-wrapper form-control-icon-right">
									<input type="text" class="form-control" id="desc_tanque" name="desc_tanque" placeholder="Ingrese una descripción del Estanque" required>
                            		<i class="fa fa-user-o"></i>
                        		</div>
							</div>

							<br>

							<div>
								<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
								<button type="button" name="action" id="consul_respon" value="add" class="btn btn-rounded btn-primary">Consultar</button>
								<button type="button" name="action" id="modi_respon" value="add" class="btn btn-rounded btn-primary">Modificar</button>
								<button type="button" name="action" id="elim_respon" value="add" class="btn btn-rounded btn-primary">Eliminar</button> 
							</div>

						</form>

					</div><!--.tab-pane-->

					<div role="tabpanel" class="tab-pane fade" id="responsables">
						<form method="post" id="responsable_form">
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
								<label class="form-label semibold" for="nombre_respon">Nombre Responsable</label>
								<div class="form-control-wrapper form-control-icon-right">
									<input type="text" class="form-control" id="nombre_respon" name="nombre_respon" placeholder="Ingrese Nombre" required>
                            		<i class="fa fa-user"></i>
                        		</div>
							</div>			
							<div class="form-group">
								<label class="form-label semibold" for="apellido_respon">Apellido Responsable</label>
								<div class="form-control-wrapper form-control-icon-right">
									<input type="text" class="form-control" id="apellido_respon" name="apellido_respon" placeholder="Ingrese Apellido" required>
                            		<i class="fa fa-user-o"></i>
                        		</div>
							</div>
							<br>
							<div>
								<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
								<button type="button" name="action" id="consul_respon" value="add" class="btn btn-rounded btn-primary">Consultar</button>
								<button type="button" name="action" id="modi_respon" value="add" class="btn btn-rounded btn-primary">Modificar</button>
								<button type="button" name="action" id="elim_respon" value="add" class="btn btn-rounded btn-primary">Eliminar</button> 
							</div>
						</form>
					</div><!--.tab-pane-->
					
				</div><!--.tab-content-->

			</section><!--.tabs-section-->
        </div>
    </div>

	<?php require_once("../../public/templates/js.php"); ?>

	<script src="view/Estanques-Responsables/responsables.js"></script>

</body>
</html>