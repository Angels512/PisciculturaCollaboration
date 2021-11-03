<?php

    require_once('../config/conexion.php');
    require_once('../models/Estanque.php');

    $estanque = new Estanque();
    $html = '';

    switch ($_GET['op'])
    {
        // Para llenar el select de estanques //
        case 'select':

            // Llamamos el metodo getEstanque del model
            $datos = $estanque->getEstanque();

            // verificamos si datos es un array y si sus datos no son igual a 0
            if (is_array($datos) == true AND count($datos)>0)
            {
                //llenamos el select con un option, por cada fila del arreglo
                foreach ($datos as $row)
                {
                    $html .= "<option value='".$row['id_tanque']."'>".$row['num_tanque']." ".$row['capacidad_tanque']."".$row['desc_tanque']."</option>";
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
                $estanque->updateEstanque($_POST["id_tanque"],$_POST["num_tanque"],$_POST["capacidad_tanque"],$_POST["desc_tanque"]);
            }
        break;

        //Para completar la tabla con los datos del estanque
        case 'listartanque':
            $datos = $estanque->listarTanque();

            foreach ($datos as $row) {
            ?>
					<tr>
                        <th><img src="public/img/estanque.png"  alt="foto usuario" style="width: 40px; height: 40px;"></th>
	    				<th><p class="user-card-row-name"><?php echo $row['num_tanque']; ?></p></th>
						<th><p class="user-card-row-name"><?php echo $row['capacidad_tanque']; ?></p></th>
						<th><p class="user-card-row-name"><?php echo $row['desc_tanque']; ?></p></th> 
						<th><button type="button" onClick="modalTanque(<?php echo $row['id_tanque'] ?>);" id="<?php echo $row['id_tanque'] ?>"  class="btn btn-inline btn-warning btn-sm ladda-button" style="margin-right: 10px;"><div><i class="fa fa-edit" style="padding: 0.3rem .45rem;"></i></div></button></th>
						<th><button type="button" onClick="deleteTanque(<?php echo $row['id_tanque'] ?>);" id="<?php echo $row['id_tanque'] ?>" class="btn btn-inline btn-danger btn-sm ladda-button"><div><i class="fa fa-trash" style="padding: 0.3rem .45rem;"></i></div></button></th>
					</tr>
        
            <?php
            }
        break;

        // Extrae todos los datos del Estanque para mostrarlos en el modal de modificación
        case 'listarDatosTanque':
            $datos = $estanque->getTanque_id($_POST['id_tanque']);

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
            $estanque->delete_tanque($_POST["id_tanque"]);
        break;


    }

?>
