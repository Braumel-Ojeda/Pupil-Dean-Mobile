<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["usuario"]) && isset($_GET["password"])){

	$usuario=$_GET['usuario'];
	$pw=$_GET['password'];

	$select = "SELECT * FROM Datos where usuario = '{$usuario}' and password = '{$pw}'";
	$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['datos'][] = $consulta;
		}
		else {
			$resulta['success'] = 'Busqueda sin exito';
			$json['datos'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'Busqueda sin exito';
		$json['datos'][] = $resulta;
		echo json_encode($json);
	}
?>