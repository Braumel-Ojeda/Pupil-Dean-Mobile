<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["usuario"])){

	$usuario=$_GET['usuario'];

	$select = "SELECT clave_grupo FROM M_Alumno_grupo where user_alumno like '{$usuario}'";
	$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['grupo'][] = $consulta;
		}
		else {
			$resulta['clave_grupo'] = '';
			$json['grupo'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['clave_grupo'] = '';
		$json['grupo'][] = $resulta;
		echo json_encode($json);
	}
?>