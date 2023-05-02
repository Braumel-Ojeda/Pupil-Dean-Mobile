<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["usuario"]) && isset($_GET["pw"])){

	$usuario=$_GET['usuario'];
	$pw=$_GET['pw'];

	$select = "SELECT (nombres_usuarios) FROM C_Maestros where nombres_usuarios = '{$usuario}' and password = '{$pw}'";
	$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['datos'][] = $consulta;
		}
		else {
			$resulta['success'] = 'no';
			$json['datos'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no';
		$json['datos'][] = $resulta;
		echo json_encode($json);
	}
?>