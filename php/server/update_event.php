<?php

require('./conector.php');

$id_evento = $_POST['id'];

$data['fecha_inicial'] = "'".$_POST['start_date']."'";
$data['fecha_final']   = "'".$_POST['end_date'  ]."'";

$con = new ConectorBD('localhost','u_agenda','12345');

$response['conexion'] = $con->initConexion('agenda_db');

if ($response['conexion']=='OK') {
    if($con->actualizarRegistro('eventos', $data, "id = ".$id_evento)){
      $response['msg'] = "OK";
    }else{
    $response['msg'] = "Se produjo un error y no se actualizó el evento.";
    }
}else{
  $response['msg'] = "No se pudo conectar la Base de Datos.";
}

echo json_encode($response);

$con->cerrarConexion();

?>
