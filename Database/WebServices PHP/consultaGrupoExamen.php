<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["usuario"])){

	$usuario=$_GET['usuario'];

	$select = "SELECT nombres_usuarios FROM M_Alumno_grupo where user_alumno = '{$usuario}'";
	$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['dato'][] = $consulta;
		}
		else {
			$resulta['success'] = 'algo pasó';
			$json['dato'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'algo pasó';
		$json['dato'][] = $resulta;
		echo json_encode($json);
	}
?>