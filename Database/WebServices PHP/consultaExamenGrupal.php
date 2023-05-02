<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["usuario"])){

	$usuario=$_GET['usuario'];

	$select = "SELECT clave_examen FROM M_Examenes where clave_grupo = '{$usuario}'";
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