<?php

require_once('../config/conexion.php');
require_once('../models/Home.php');

$home = new Home;

switch ($_GET['op'])
{
   // Jefe de produccion
   case 'total_formatos_grafico':
      $datos = $home->totalFormatos_grafico();
      echo json_encode($datos);
   break;

   case 'total_usuarios':
      $datos = $home->totalUsuarios();
      echo json_encode($datos);
   break;

   case 'total_piscicultores':
      $datos = $home->totalPiscicultores();
      echo json_encode($datos);
   break;

   case 'total_acuicultores':
      $datos = $home->totalAcuicultores();
      echo json_encode($datos);
   break;

   case 'total_chats_abiertos':
      $datos = $home->totalChatsAbiertos();
      echo json_encode($datos);
   break;

   case 'total_mortalidad':
      $datos = $home->totalMortalidad();
      echo json_encode($datos);
   break;


   // Empleados
   case 'total_formatos_acuicultor':
      $datos = $home->totalFormatos_acuicultor($_POST['usu_id']);
      echo json_encode($datos);
   break;

   case 'total_formatos_piscicultor':
      $datos = $home->totalFormatos_piscicultor($_POST['usu_id']);
      echo json_encode($datos);
   break;

   case 'total_chats_abiertos_empleados':
      $datos = $home->totalChatsAbiertos_empleados($_POST['usu_id']);
      echo json_encode($datos);
   break;

   case 'total_chats_cerrados':
      $datos = $home->totalChatsCerrados($_POST['usu_id']);
      echo json_encode($datos);
   break;
}