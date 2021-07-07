<!DOCTYPE html>
<html>
<head lang="en">
	<?php require_once('../../public/templates/head.php'); ?>
</head>
<body class="with-side-menu">

    <?php require_once('../../public/templates/header.php'); ?>
	<?php require_once('../../public/templates/nav.php'); ?>

	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Consultar Formatos Piscicultura</h2>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Consultar Formatos</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			
			<section class="tabs-section">
				<div class="tabs-section-nav tabs-section-nav-icons">
					<div class="tbl">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#biometrias" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<i class="glyphicon glyphicon-scale"></i>
										Biocrecimiento
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tbl_alim" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										<span class="font-icon font-icon-notebook-bird"></span>
										Tabla Alimentación
									</span>
								</a>
							</li>
							
						</ul>
					</div>
				</div><!--.tabs-section-nav-->

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="biometrias">
					<section class="card">
						<div class="card-block">
							<table id="dt_biometrias" class="display table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nombre del Empleado</th>
										<th>Fecha de creación</th>
										<th>Cant_Siembra</th>
										<th>Ver</th>
										<th>Actualizar</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Andres Nixon</td>
										<td>2019/09/25</td>
										<td>2000</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Garrett Winters</td>
										<td>2019/07/13</td>
										<td>1995</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Ashton Cox</td>
										<td>2018/06/29</td>
										<td>1804</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									
									<tr>
										<td>Gavin Joyce</td>
										<td>2020/06/28</td>
										<td>2000</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>

									</tr>
									<tr>
										<td>Jennifer Chang</td>
										<td>2020/09/04</td>
										<td>1799</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Brenden Wagner</td>
										<td>2018/05/25</td>
										<td>2001</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Colleen Hurst</td>
										<td>2019/04/18</td>
										<td>2002</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Sonya Frost</td>
										<td>2020/03/30</td>
										<td>2006</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Jena Gaines</td>
										<td>2018/09/30</td>
										<td>1943</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Quinn Flynn</td>
										<td>2019/05/22</td>
										<td>1877</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Charde Marshall</td>
										<td>2018/11/05</td>
										<td>2003</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Haley Kennedy</td>
										<td>2019/10/12</td>
										<td>1500</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Tatyana Fitzpatrick</td>
										<td>2020/05/09</td>
										<td>1807</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Michael Silva</td>
										<td>2020/02/07</td>
										<td>2000</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Paul Byrd</td>
										<td>2017/12/05</td>
										<td>2001</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Gloria Little</td>
										<td>2018/05/01</td>
										<td>1959</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Bradley Greer</td>
										<td>2018/09/08</td>
										<td>1698</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Dai Rios</td>
										<td>2020/04/05</td>
										<td>1765</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
									<tr>
										<td>Jenette Caldwell</td>
										<td>2020/12/12</td>
										<td>1965</td>
										<td style="text-align: center;"><button type="button" id="consultarbio" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="editarbio" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
										<td style="text-align: center;"><button type="button" id="eliminarbio" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
					</div><!--.tab-pane-->
					<div role="tabpanel" class="tab-pane fade" id="tbl_alim">
						<section class="card">
							<div class="card-block">
								<table id="dt_tbl_alim" class="display table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nombre del Empleado</th>
											<th>Fecha de creación</th>
											<th>Cant_Siembra</th>
											<th>Ver</th>
											<th>Actualizar</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Andres Nixon</td>
											<td>2019/09/25</td>
											<td>2000</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Garrett Winters</td>
											<td>2019/07/13</td>
											<td>1995</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Ashton Cox</td>
											<td>2018/06/29</td>
											<td>1804</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										
										<tr>
											<td>Gavin Joyce</td>
											<td>2020/06/28</td>
											<td>2000</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>

										</tr>
										<tr>
											<td>Jennifer Chang</td>
											<td>2020/09/04</td>
											<td>1799</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Brenden Wagner</td>
											<td>2018/05/25</td>
											<td>2001</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Colleen Hurst</td>
											<td>2019/04/18</td>
											<td>2002</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Sonya Frost</td>
											<td>2020/03/30</td>
											<td>2006</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Jena Gaines</td>
											<td>2018/09/30</td>
											<td>1943</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Quinn Flynn</td>
											<td>2019/05/22</td>
											<td>1877</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Charde Marshall</td>
											<td>2018/11/05</td>
											<td>2003</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Haley Kennedy</td>
											<td>2019/10/12</td>
											<td>1500</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Tatyana Fitzpatrick</td>
											<td>2020/05/09</td>
											<td>1807</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Michael Silva</td>
											<td>2020/02/07</td>
											<td>2000</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Paul Byrd</td>
											<td>2017/12/05</td>
											<td>2001</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Gloria Little</td>
											<td>2018/05/01</td>
											<td>1959</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Bradley Greer</td>
											<td>2018/09/08</td>
											<td>1698</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Dai Rios</td>
											<td>2020/04/05</td>
											<td>1765</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
										<tr>
											<td>Jenette Caldwell</td>
											<td>2020/12/12</td>
											<td>1965</td>
											<td style="text-align: center;"><button type="button" id="consultar" class="btn btn-inline btn-primary btn-icon"><div><i class="font-icon font-icon-eye"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="editar" class="btn btn-inline btn-success btn-icon"><div><i class="fa fa-edit"></i></div></button></td>
											<td style="text-align: center;"><button type="button" id="eliminar" class="btn btn-inline btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button></td>
										</tr>
									</tbody>
								</table>
							</div>
						</section>
					</div><!--.tab-pane-->
				</div><!--.tab-content-->
			</section><!--.tabs-section-->

		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once('../../public/templates/js.php'); ?>

	<script src="view/ConsultarFormatos/consultarformatos.js"></script>
</body>
</html>