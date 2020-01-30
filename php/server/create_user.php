<?php

  require('./conector.php');

  $con = new ConectorBD('localhost', 'u_agenda', '12345');

  if ($con->initConexion('agenda_db')=='OK') {

    $datos['email'] = "'pg@mail.com'";
    $datos['nombre'] = "'Pablo Garcia'";
    $datos['pwd'] = "'".password_hash('12345', PASSWORD_DEFAULT)."'";
    $datos['fecha_nacimiento'] = "'1998-11-01'";
    if ($con->insertData('usuarios', $datos)) {
      echo "Se ha creado el usuario 1 correctamente"."<br>";
    }else echo "Se ha producido un error en la creación";

    $datos['email'] = "'ar@mail.com'";
    $datos['nombre'] = "'Andrea Roa'";
    $datos['pwd'] = "'".password_hash('12345', PASSWORD_DEFAULT)."'";
    $datos['fecha_nacimiento'] = "'2001-04-15'";
    if ($con->insertData('usuarios', $datos)) {
      echo "Se ha creado el usuario 2 correctamente"."<br>";
    }else echo "Se ha producido un error en la creación";

    $datos['email'] = "'na@mail.com'";
    $datos['nombre'] = "'Nancy Ariza'";
    $datos['pwd'] = "'".password_hash('12345', PASSWORD_DEFAULT)."'";
    $datos['fecha_nacimiento'] = "'1995-08-22'";
    if ($con->insertData('usuarios', $datos)) {
      echo "Se ha creado el usuario 3 correctamente"."<br>";
    }else echo "Se ha producido un error en la creación";

    $con->cerrarConexion();

  }else {
    echo "Se presentó un error en la conexión";
  }

 ?>
