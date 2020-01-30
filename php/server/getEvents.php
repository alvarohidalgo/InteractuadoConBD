<?php

require('./conector.php');

$con = new ConectorBD('localhost','u_agenda','12345');

$response['conexion'] = $con->initConexion('agenda_db');

if ($response['conexion']=='OK') {
  session_start();
  $resultado_consulta = $con->consultar(['eventos'],
  ['id', 'fk_email', 'titulo as title', 'fecha_inicial as start', 'fecha_final as end'],
  'WHERE fk_email="'.$_SESSION['username'].'"');

  if ($resultado_consulta->num_rows != 0) {
    $response['msg'] = 'OK';

    while ($fila = $resultado_consulta->fetch_assoc()) {
      $response['eventos'][] = $fila;
    }

  }else{
    $response['msg'] = 'No se encontraron eventos';
  }

}
echo json_encode($response);

$con->cerrarConexion();

?>
