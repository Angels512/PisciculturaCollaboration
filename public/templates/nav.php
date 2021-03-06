<?php

    if ($_SESSION['id_rol'] == 1)
    {
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">

                    <li class="grey with-sub">
                        <a href="inicio">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>

                    <li class="brown with-sub">
                        <span>
                            <i class="fa fa-anchor" aria-hidden="true"></i>
                            <span class="lbl">Cultivos</span>
                        </span>
                        <ul>
                            <li><a href="nuevo-cultivo"><span class="lbl">Añadir Nuevo</span></a></li>
                            <li><a href="consultar-cultivo"><span class="lbl">Consultar</span></a></li>
                            <li class="with-sub">
                            </li>
                        </ul>
                    </li>

                    <!-- <li class="blue-dirty">
                        <a href="consultar-formatos">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <span class="lbl">Consultar Formatos</span>
                        </a>
                    </li> -->

                    <li class="magenta with-sub">
                        <span>
                            <i class="font-icon font-icon-notebook"></i>
                            <span class="lbl">Formatos</span>
                        </span>
                        <ul>
                            <li><a href="biocrecimiento"><span class="lbl">Biocrecimiento</span></a></li>
                            <li><a href="tbl-alimentacion"><span class="lbl">Tabla de Alimentación</span></a></li>
                            <li><a href="parafq"><span class="lbl">Parametros FQ</span></a></li>
                            <li><a href="tempagua"><span class="lbl">Temperatura Agua</span></a></li>
                            <li><a href="tempamb"><span class="lbl">Temperatura Ambiente</span></a></li>
                            <li><a href="estacui"><span class="lbl">Estado Acuicultura</span></a></li>
                        </ul>
                    </li>

                    <li class="red">
                        <a href="estanques">
                            <i class="font-icon font-icon-contacts" aria-hidden="true"></i>
                            <span class="lbl">Estanques</span>
                        </a>
                    </li>

                    <li class="blue">
                        <a href="responsables">
                            <i class="font-icon font-icon-contacts" aria-hidden="true"></i>
                            <span class="lbl">Responsables</span>
                        </a>
                    </li>

                    <li class="gold">
                        <a href="producto">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            <span class="lbl">Productos</span>
                        </a>
                    </li>

                    <li class="blue-dirty">
                        <a href="proveedor">
                            <span class="fa fa-bus"></span>
                            <span class="lbl">Proveedores</span>
                        </a>
                    </li>

                    <li class="purple">
                        <a href="consultar-chat">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <span class="lbl">Consultar Chat's</span>
                        </a>
                    </li>

                    <li class="aquamarine">
                        <a href="usuarios">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="lbl">Usuarios</span>
                        </a>
                    </li>

                    <li class="blue">
                        <a href="reportes">
                            <i class="font-icon font-icon-post" aria-hidden="true"></i>
                            <span class="lbl">Reportes</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
    }else if($_SESSION['id_rol'] == 2) {
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">

                    <li class="grey">
                        <a href="inicio">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>

                    <li class="aquamarine">
                        <a href="consultar-cultivo">
                            <i class="fa fa-anchor" aria-hidden="true"></i>
                            <span class="lbl">Cultivos</span>
                        </a>
                    </li>

                    <li class="magenta with-sub">
                        <span>
                            <i class="font-icon font-icon-notebook"></i>
                            <span class="lbl">Formatos</span>
                        </span>
                        <ul>
                            <li><a href="biocrecimiento"><span class="lbl">Biocrecimiento</span></a></li>
                            <li><a href="tbl-alimentacion"><span class="lbl">Tabla de Alimentación</span></a></li>
                        </ul>
                    </li>

                    <div class="consultarChat">
                        <li class="blue-dirty">
                            <a href="crear-chat">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                <span class="lbl">Nuevo Chat</span>
                            </a>
                        </li>
                    </div>
                    <li class="blue-dirty">
                        <a href="consultar-chat">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <span class="lbl">Consultar Chat's</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
    }else {
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">

                    <li class="grey">
                        <a href="inicio">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>

                    <li class="aquamarine">
                        <a href="consultar-cultivo">
                            <i class="fa fa-anchor" aria-hidden="true"></i>
                            <span class="lbl">Cultivos</span>
                        </a>
                    </li>

                    <li class="magenta with-sub">
                        <span>
                            <i class="font-icon font-icon-notebook"></i>
                            <span class="lbl">Formatos</span>
                        </span>
                        <ul>
                            <li><a href="parafq"><span class="lbl">Parametros FQ</span></a></li>
                            <li><a href="tempagua"><span class="lbl">Temperatura Agua</span></a></li>
                            <li><a href="tempamb"><span class="lbl">Temperatura Ambiente</span></a></li>
                            <li><a href="estacui"><span class="lbl">Estado Acuicultura</span></a></li>
                        </ul>
                    </li>

                    <div class="consultarChat">
                        <li class="blue-dirty">
                            <a href="crear-chat">
                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                <span class="lbl">Nuevo Chat</span>
                            </a>
                        </li>
                    </div>

                    <li class="blue-dirty">
                        <a href="consultar-chat">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <span class="lbl">Consultar Chat's</span>
                        </a>
                    </li>

                </ul>
            </nav>
        <?php
    }
?>

