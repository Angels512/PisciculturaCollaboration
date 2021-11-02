<?php

    require_once('../config/conexion.php');
    require_once('../models/ChatDetalle.php');

    $chatDetalle = new ChatDetalle();
    $meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

    switch ($_GET['op'])
    {
        // Crear un nuevo CHAT (Muestra todos los articulos por codigo HTML)
        case 'listardetalle':
            $datos = $chatDetalle->listarChatDetalle_chat($_POST['id_chat']);

            foreach ($datos as $row) {
            ?>
                <article class="activity-line-item box-typical">
                    <div class="activity-line-date" style="left: -92px; font-weight: bold;">
                        <?php
                            $diaFecha = date('d', strtotime($row["fecha"]));
                            $mesFecha = date('m', strtotime($row["fecha"])) - 1;
                            $yearFecha = date('Y', strtotime($row["fecha"]));

                            echo "$diaFecha/$meses[$mesFecha]/$yearFecha";
                        ?>
                    </div>
                    <header class="activity-line-item-header">
                        <div class="activity-line-item-user">
                            <div class="activity-line-item-user-photo">
                                <a href="#">
                                    <img src="public/img/<?php echo $row['id_rol'];?>.jpg" alt="">
                                </a>
                            </div>
                            <div class="activity-line-item-user-name"><?php echo $row['nombre_usu'] . ' ' .  $row['apellido_usu']; ?></div>
                            <div class="activity-line-item-user-status">
                                <?php
                                    if ($row['id_rol'] == 1)
                                    {
                                        echo 'Jefe de producción';
                                    }else if ($row['id_rol'] == 2) {
                                        echo 'Piscicultor';
                                    }else {
                                        echo 'Acuicultor';
                                    }
                                ?>
                            </div>
                        </div>
                    </header>
                    <div class="activity-line-action-list">
                        <section class="activity-line-action">
                            <div class="time"><?php echo date("<b>H:i</b>", strtotime($row['fecha'])); ?>
                            </div>
                            <div class="cont">
                                <div class="cont-in">
                                    <p><?php echo $row['desc_chatd'];?></p>
                                </div>
                            </div>
                        </section>
                    </div>
                </article><!--Detalle del Chat-->
            <?php
            }
        break;

        // Extrae todos los datos del CHAT para mostrarlos (Titulo, Descripcion, Categoria, Estado, Etc)
        case 'mostrar':
            $datos = $chatDetalle->listarChatDetalle_id($_POST['id_chat']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_chat"] = $row["id_chat"];
                    $output["id_usu"] = $row["id_usu"];
                    $output["id_cat"] = $row["id_cat"];

                    $output["titulo_chat"] = $row["titulo_chat"];
                    $output["desc_chat"] = $row["desc_chat"];

                    if ($row["estado_chat"]=="Abierto"){
                        $output["estado_chat"] = '<span class="label label-pill label-success">Abierto</span>';
                    }else{
                        $output["estado_chat"] = '<span class="label label-pill label-danger">Cerrado</span>';
                    }

                    $output["estadoChatTexto"] = $row["estado_chat"];

                    $diaFecha = date('d', strtotime($row["fecha"]));
                    $mesFecha = date('m', strtotime($row["fecha"])) - 1;
                    $yearFecha = date('Y', strtotime($row["fecha"]));

                    $output["fecha"] = "$diaFecha/$meses[$mesFecha]/$yearFecha";

                    $output["nombre_usu"] = $row["nombre_usu"];
                    $output["apellido_usu"] = $row["apellido_usu"];
                    $output["nombre_cat"] = $row["nombre_cat"];
                }
                echo json_encode($output);
            }
        break;

        // Crear un nuevo CHAT
        case 'createdetalle':
            $chatDetalle->createChatDetalle($_POST['id_chat'], $_POST['id_usu'], $_POST['desc_chatd']);
        break;

        // Crear un nuevo MENSAJE de chat cerrado
        case 'createdetallecerrado':
            $chatDetalle->createChatDetalleCerrado($_POST['id_chat'], $_POST['id_usu']);
        break;
    }
?>