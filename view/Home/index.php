<!DOCTYPE html>
<html>
    <head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Inicio - A'ttia</title>
    </head>

    <body class="with-side-menu">

        <div class="mainContainer">
            <?php require_once('../../public/templates/header.php'); ?> <!--HEADER-->
            <div class="mobile-menu-left-overlay"></div>
            <?php require_once('../../public/templates/nav.php') ?> <!--NAV-->



            <!-- CONTENIDO -->
            <div class="page-content">
               <div class="container-fluid">
                	<div class="row">
							<div class="col-xl-7" style="margin-top: 10px;">
								<div class="box-typical box-typical-padding">
									<header class="card-header">
											Grafico Estadistico
									</header>
									<div class="card-block">
											<div id="grafico"></div>
									</div>
								</div>
							</div><!--.col-->

							<div class="col-xl-5">
								<div class="row">
									<?php
										if ($_SESSION['id_rol'] == 1)
										{
											?>
												<div class="col-sm-6">
														<article class="statistic-box red">
															<div>
																<div class="number" id="totalUsuarios"></div>
																<div class="caption"><div>Usuarios totales</div></div>
															</div>
														</article>
												</div><!--.col-->

												<div class="col-sm-6">
													<article class="statistic-box purple">
														<div>
															<div class="number" id="totalPiscicultores"></div>
															<div class="caption"><div>Piscicultores totales</div></div>
														</div>
													</article>
												</div><!--.col-->

												<div class="col-sm-6">
													<article class="statistic-box green">
														<div>
															<div class="number" id="totalAcuicultores"></div>
															<div class="caption"><div>Acuicultores totales</div></div>
														</div>
													</article>
												</div><!--.col-->
											<?php
										}
									?>

									<div class="col-sm-6">
										<article class="statistic-box yellow">
											<div>
												<div class="number" id="totalFormatos"></div>
												<div class="caption"><div>Cantidad de formatos</div></div>
											</div>
										</article>
									</div><!--.col-->

									<div class="col-sm-6">
										<article class="statistic-box purple">
											<div>
												<div class="number" id="totalMortandad"></div>
												<div class="caption"><div>Mortandad total</div></div>
											</div>
										</article>
									</div><!--.col-->

									<div class="col-sm-6">
										<article class="statistic-box red">
											<div>
												<div class="number" id="chatsAbiertos"></div>
												<div class="caption"><div>Chats abiertos</div></div>
											</div>
										</article>
									</div><!--.col-->

									<?php
										if ($_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3)
										{
											?>
												<div class="col-sm-6">
													<article class="statistic-box green">
														<div>
															<div class="number" id="chatsCerrados"></div>
															<div class="caption"><div>Chats cerrados</div></div>
														</div>
													</article>
												</div><!--.col-->
											<?php
										}
									?>
								</div><!--.row-->
							</div><!--.col-->
						</div>
                </div><!--Contenedor-->
            </div><!--Contenido Principal-->



            <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
            <script src="view/Home/home.js"></script>
        </div>

    </body>
</html>
