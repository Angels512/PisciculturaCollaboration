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

                    <li class="aquamarine with-sub">
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

                    <li class="blue-dirty">
                        <a href="consultar-chat">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            <span class="lbl">Consultar Chat's</span>
                        </a>
                    </li>

                    <li class="blue">
                        <a href="usuarios">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="lbl">Usuarios</span>
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

