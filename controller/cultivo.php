<?php

    require_once('../config/conexion.php');
    require_once('../models/Cultivo.php');
    $html = '';
    $meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

    $cultivo = new Cultivo();

    switch ($_GET['op'])
    {
        // Muestra la lista de cultivos en la lista
        case 'listarcultivo':
            $datos = $cultivo->listarCultivo();

            foreach ($datos as $row) {
            ?>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <article class="card-user box-typical">
                        <div class="card-user-action float-right">
                            <div class="dropdown dropdown-user-menu">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="glyphicon glyphicon-option-vertical"></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button onClick="verNovedades(<?php echo $row['id_cultivo']; ?>);" id="<?php echo $row['id_cultivo']; ?>"><a class="dropdown-item" href="#"><i class="fa fa-tasks" aria-hidden="true"></i> &nbsp Novedades</a></button>
                                    <button onClick="modalUpdateCultivo(<?php echo $row['id_cultivo']; ?>);" id="<?php echo $row['id_cultivo']; ?>" class="editBtn"><a class="dropdown-item" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp Editar</a></button>
                                    <button onClick="deleteCultivo(<?php echo $row['id_cultivo']; ?>);" id="<?php echo $row['id_cultivo']; ?>" class="deleBtn"><a class="dropdown-item" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp Eliminar</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-user-photo">
                            <img src="public/img/fish<?php echo $row['num_tanque']; ?>.jpg" alt="">
                        </div>
                        <div class="card-user-name">Cultivo <?php echo $row['num_lote']; ?></div>
                        <div class="card-user-status">Estanque #<?php echo $row['num_tanque']; ?></div>
                        <button type="button" onClick="ver(<?php echo $row['id_cultivo']; ?>);" id="<?php echo $row['id_cultivo']; ?>" class="btn btn-inline azul" style="padding: 8px 25px;"><i class="fa fa-eye"></i> &nbspConsultar</button>
                        <div class="card-user-social">
                            <div class="card-user-mortalidad">Siembra: <?php echo $row['cant_siembra']; ?></div>
                            <div class="card-user-respon"><?php echo $row['nombre_respon']; ?> <?php echo $row['apellido_respon']; ?><hr class="lineCards"></div>
                            <?php
                                $diaFecha = date('d', strtotime($row["fecha"]));
                                $mesFecha = date('m', strtotime($row["fecha"])) - 1;
                                $yearFecha = date('Y', strtotime($row["fecha"]));

                                $diaFechaCierre = date('d', strtotime($row["fecha_cierre"]));
                                $mesFechaCierre = date('m', strtotime($row["fecha_cierre"])) - 1;
                                $yearFechaCierre = date('Y', strtotime($row["fecha_cierre"]));
                            ?>
                            <div class="card-user-respon">Fecha de siembra: <?php echo "$diaFecha/$meses[$mesFecha]/$yearFecha"; ?></div>
                            <div class="card-user-fecha">Fecha de cierre: <?php echo "$diaFechaCierre/$meses[$mesFechaCierre]/$yearFechaCierre"; ?></div>
                        </div>
                    </article><!--.card-user-->
                </div>
            <?php
            }
        break;

        case 'listarDatosCultivo':
            $datos = $cultivo->getCultivo_id($_POST['id_cultivo']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_cultivo"] = $row["id_cultivo"];
                    $output["id_respon"] = $row["id_respon"];
                    $output["id_tanque"] = $row["id_tanque"];
                    $output["num_lote"] = $row["num_lote"];
                    $output["cant_siembra"] = $row["cant_siembra"];
                }
                echo json_encode($output);
            }
        break;

        case 'create_update':
            if (empty($_POST['id_cultivo'])) {
                $cultivo->createCultivo($_POST['id_respon'], $_POST['id_tanque'], $_POST['num_lote'], $_POST['cant_siembra']);
            }else {
                $cultivo->updateCultivo($_POST['id_respon'], $_POST['id_tanque'], $_POST['num_lote'], $_POST['cant_siembra'], $_POST['id_cultivo']);
            }

        break;

        case 'delete':
            $cultivo->deleteCultivo($_POST['id_cultivo']);
        break;



        case 'cultivoExistente':
            $data = $cultivo->validarEstanque($_POST['num_lote']);
            echo json_encode($data);
        break;

        case 'validateEstanque':
            $data = $cultivo->validarEstanque($_POST['id_tanque']);
            echo json_encode($data);
        break;

        case 'validateResponsable':
            $data = $cultivo->validarResponsable($_POST['id_respon']);
            echo json_encode($data);
        break;



        case 'getCultivoVencido':
            $datos = $cultivo->getCultivoVencido();

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_cultivo"] = $row["id_cultivo"];
                    $output["fecha_cierre"] = $row["fecha_cierre"];
                    $output["fechaActual"] = date("Y-m-d");
                }
                echo json_encode($datos);
            }
        break;

        case 'deleteVencido':
            $cultivo->deleteCultivoVencido($_POST['id_cultivo']);
        break;


        // Para llenar los select con los cultivos activos
        case "cultivoselect":

            // Llamamos el metodo getCultivo del model
            $datos = $cultivo->getCultivo();

            // verificamos si datos es un array y si sus datos no son igual a 0
            if(is_array($datos)==true and count($datos)>0){

                //llenamos el select con un option, por cada fila del arreglo
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_cultivo']."'>Lote:  ".$row['num_lote']."</option>";
                }
                echo $html;
            }
    }
?>