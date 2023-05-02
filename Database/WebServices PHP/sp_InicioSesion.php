<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"])){

	$clave=$_GET['clave'];

	$select = "call InicioSesion('{$clave}')";
	$resultado = mysqli_query($conexion, $select);
	
	while ($registro = mysqli_fetch_array($resultado)){
		$json['datos'][] = $registro;
	}
	mysqli_close($conexion);
	echo json_encode($json);
?>