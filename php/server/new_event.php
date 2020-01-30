<?php

require('./conector.php');

session_start();
$data['fk_email']      = "'".$_SESSION['username']."'";
$data['titulo']        = "'".$_POST['titulo']."'";
$data['fecha_inicial'] = "'".$_POST['start_date']." ".$_POST['start_hour']."'";
$data['fecha_final']   = "'".$_POST['end_date']." ".$_POST['end_hour']."'";

$con = new ConectorBD('localhost','u_agenda','12345');

$response['conexion'] = $con->initConexion('agenda_db');

if ($response['conexion']=='OK') {

  if($con->insertData('eventos', $data)){
    $response['msg'] = "OK";
  }else{
    $response['msg'] = "Se produjo un error y no se guardó el evento.";
  }
}else{
  $response['msg'] = "No se pudo conectar la Base de Datos.";
}

echo json_encode($response);

$con->cerrarConexion();

?>
