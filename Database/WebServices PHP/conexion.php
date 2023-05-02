<?php

$hostname="18.220.22.111";
$database="upabasoft";
$username="upabasoft";
$password="upabasoft395";

$conexion = new mysqli($hostname, $username, $password, $database);
if ($conexion->connect_errno){
	echo "Falló la conexión";
}
?>