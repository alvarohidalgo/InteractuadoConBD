<?php

require('./conector.php');

$con = new ConectorBD('localhost','u_agenda','12345');

$response['conexion'] = $con->initConexion('agenda_db');

if ($response['conexion']=='OK') {
  $resultado_consulta = $con->consultar(['usuarios'],
  ['email', 'pwd'], 'WHERE email="'.$_POST['username'].'"');

  if ($resultado_consulta->num_rows != 0) {
    $fila = $resultado_consulta->fetch_assoc();
    if (password_verify($_POST['password'], $fila['pwd'])) {
      $response['acceso'] = 'concedido';
      session_start();
      $_SESSION['username']=$fila['email'];
      $response['msg'] = "OK";
    }else {
      $response['motivo'] = 'Usuario y/o Contraseña incorrectos';
      $response['acceso'] = 'rechazado';
    }
  }else{
    $response['motivo'] = 'El usuario digitado no se encuentra registrado';
    $response['acceso'] = 'rechazado';
  }
}

echo json_encode($response);

$con->cerrarConexion();


 ?>
