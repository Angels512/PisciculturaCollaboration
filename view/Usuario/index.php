<!DOCTYPE html>
<html>
    <head lang="es">
        <?php require_once('../../public/templates/head.php'); ?> <!-- HEAD -->
        <title>Usuarios - A'ttia</title>
    </head>

    <body class="with-side-menu">


        <?php require_once('../../public/templates/header.php'); ?> <!--HEADER-->
        <div class="mobile-menu-left-overlay"></div>
        <?php require_once('../../public/templates/nav.php') ?> <!--NAV-->



        <!-- CONTENIDO -->
        <div class="page-content">
            <div class="container-fluid">
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Usuarios</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="inicio">Inicio</a></li>
                                    <li class="active">Usuarios</li>
                                </ol>
                            </div>
                            <div class="tbl-cell tbl-cell-action">
							    <a id="btnAgregar" class="btn btn-inline btn-primary azul float-right mg-top">Agregar Usuario</a>
						    </div>
                        </div>
                    </div>
                </header> <!--BREADCRUMB-->

                <div class="box-typical box-typical-padding">
                    <table id="usuarioData" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Nombre</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Apellido</th>
                                <th class="d-none d-sm-table-cell" style="width: 10%;">Documento</th>
                                <th class="d-none d-sm-table-cell" style="width: 10%;">Teléfono</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Dirección</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Correo Electrónico</th>
                                <th class="d-none d-sm-table-cell" style="width: 10%;">Cargo</th>
                                <th class="text-center" style="width: 5%;"></th>
                                <th class="text-center" style="width: 5%;"></th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div><!--Contenedor Blanco-->
            </div><!--Contenedor-->
        </div><!--Contenido Principal-->


        <?php require_once('modalUsuarios.php'); ?> <!-- MODAL DE USUARIOS -->
        <?php require_once('../../public/templates/js.php'); ?> <!-- ARCHIVOS JS Y LIBS -->
        <script type="text/javascript" src="view/Usuario/usuario.js"></script>

    </body>
</html>
