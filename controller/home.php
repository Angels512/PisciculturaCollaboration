<?php

require_once('../config/conexion.php');
require_once('../models/Home.php');

$home = new Home;

switch ($_GET['op'])
{
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
}