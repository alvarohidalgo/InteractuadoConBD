<?php

require('./conector.php');

session_start();
$data['id'] = $_POST['id'];

$con = new ConectorBD('localhost','u_agenda','12345');

$response['conexion'] = $con->initConexion('agenda_db');

if ($response['conexion']=='OK') {

  if($con->eliminarRegistro('eventos', "id = ".$data['id'])) {
    $response['msg'] = "OK";
  }else{
    $response['msg'] = "Se produjo un error y no se eliminó el evento.";
  }
}else{
  $response['msg'] = "No se pudo conectar la Base de Datos.";
}

echo json_encode($response);

$con->cerrarConexion();

?>
