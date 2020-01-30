<?php
session_start();
// borra todas las variables de sesión
session_unset();

session_destroy();

header("location:../client/index.html");
?>
