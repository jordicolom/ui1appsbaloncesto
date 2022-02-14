<?php
$servidor = "localhost";
$usuario = "root"; 
$contrasena = "root"; 
$basedatos = "baloncesto";

$mysqli = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
if (!$mysqli) {
die("La conexión falló: " . mysqli_connect_error());
}

?>