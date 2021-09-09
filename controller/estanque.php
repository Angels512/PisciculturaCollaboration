<?php

    require_once('../config/conexion.php');
    require_once('../models/Estanque.php');

    $estanque = new Estanque();
    $html = '';

    switch ($_GET['op'])
    {
        // Con la opcion select vamos a recorrer la tabla Categoria para mostrarla en el chat
        case 'select':

            // Llamamos el metodo getCategoria del model
            $datos = $estanque->getEstanque();

            // Miramos que si hayan datos dentro de la tabla Categoria
            if (is_array($datos) == true AND count($datos)>0)
            {
                // Llenamos todos los option del select que esta en la vista del chat
                foreach ($datos as $row)
                {
                    $html .= "<option value='".$row['id_tanque']."'>Estanque #".$row['num_tanque']."</option>";
                }
                echo $html;
            }
        break;

        // Para insertar y actulizar los estanques //
        case "guardaryeditar":

            if(empty($_POST["id_tanque"])){
                $estanque->insertEstanque($_POST["num_tanque"],$_POST["capacidad_tanque"],$_POST["desc_tanque"]);
            }
            else {
                $data = $estanque->updateEstanque($_POST["id_tanque"],$_POST["num_tanque"],$_POST["capacidad_tanque"],$_POST["desc_tanque"]);
                echo $data;
            }
        break;

        //Para completar la tabla con los datos del estanque
        case 'listarestanque':
            $datos = $estanque->listarEstanque();

            foreach ($datos as $row) {
            ?>
                <div class="widget-tasks-item">
                    <div class="user-card-row">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-photo">
                                <img src="public/img/4.png"  alt="foto estanque">
                            </div>
                            <div class="tbl-cell">
                                <p class="user-card-row-name"><?php echo 'Estanque #' . $row['num_tanque']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group widget-menu">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="font-icon glyphicon glyphicon-option-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" onClick="modalEstanque(<?php echo $row['id_tanque']; ?>);" id="<?php echo $row['id_tanque']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizar</a>
                            <a class="dropdown-item" onClick="deleteEstanque(<?php echo $row['id_tanque']; ?>);" id="<?php echo $row['id_tanque']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php
            }
        break;

        // Extrae todos los datos del Estanque para mostrarlos en el modal de modificación
        case 'listarDatosEstanque':
            $datos = $estanque->getEstanque_id($_POST['id_tanque']);

            if (is_array($datos) == true AND count($datos)>0)
            {
                foreach ($datos as $row)
                {
                    $output["id_tanque"] = $row["id_tanque"];
                    $output["num_tanque"] = $row["num_tanque"];
                    $output["capacidad_tanque"] = $row["capacidad_tanque"];
                    $output["desc_tanque"] = $row["desc_tanque"];
                }
                echo json_encode($output);
            }
        break;

        //para eliminar un estanque por su id
        case "eliminar":
            $estanque->delete_estanque($_POST["id_tanque"]);
        break;


    }

?>