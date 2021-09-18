<?php

    require_once('../config/conexion.php');
    require_once('../models/Responsable.php');

    $responsable = new Responsable();
    $html = '';

    switch ($_GET['op'])
    {
        // Para llenar el select de responsables //
        case 'select':

            // Llamamos el metodo getResponsable del model
            $datos = $responsable->getResponsable();

            // verificamos si datos es un array y si sus datos no son igual a 0
            if (is_array($datos) == true AND count($datos)>0)
            {
                //llenamos el select con un option, por cada fila del arreglo
                foreach ($datos as $row)
                {
                    $html .= "<option value='".$row['id_respon']."'>".$row['nombre_respon']." ".$row['apellido_respon']."</option>";
                }
                echo $html;
            }
        break;

        // Para insertar y actulizar los responsables //
        case "guardaryeditar":

            if(empty($_POST["id_respon"])){
                $responsable->insertResponsable($_POST["nombre_respon"],$_POST["apellido_respon"]);
            }
            else {
                $responsable->updateResponsable($_POST["id_respon"],$_POST["nombre_respon"],$_POST["apellido_respon"]);
            }
        break;

        //Para completar la tabla con los datos del responsable
        case 'listarespon':
            $datos = $responsable->listarRespon();

            foreach ($datos as $row) {
            ?>
                <div class="widget-tasks-item">
                    <div class="user-card-row">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-photo">
                                <img src="public/img/responsable.jpg"  alt="foto usuario" style="width: 40px; height: 40px;">
                            </div>
                            <div class="tbl-cell">
                                <p class="user-card-row-name"><?php echo $row['nombre_respon'].' '.$row['apellido_respon']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group widget-menu" style="top: 40%;">
                        <div>
                            <button type="button" onClick="modalRespon(<?php echo $row['id_respon'] ?>);" id="<?php echo $row['id_respon'] ?>"  class="btn btn-inline btn-warning btn-sm ladda-button" style="margin-right: 10px;"><div><i class="fa fa-edit" style="padding: 0.3rem .45rem;"></i></div></button>
                            <button type="button" onClick="deleteRespon(<?php echo $row['id_respon'] ?>);" id="<?php echo $row['id_respon'] ?>" class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash" style="padding: 0.3rem .45rem;"></i></div></button>
                        </div>
                    </div>
                </div>
            <?php
            }
        break;

        // Extrae todos los datos del Responsable para mostrarlos en el modal de modificación
        case 'listarDatosRespon':
            $datos = $responsable->getRespon_id($_POST['id_respon']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_respon"] = $row["id_respon"];
                    $output["nombre_respon"] = $row["nombre_respon"];
                    $output["apellido_respon"] = $row["apellido_respon"];
                }
                echo json_encode($output);
            }
        break;

        //para eliminar un responsable por su id
        case "eliminar":
            $responsable->delete_respon($_POST["id_respon"]);
        break;


    }

?>