<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["claveE"])){

	$claveE=$_GET['claveE'];

	$select = "SELECT nombres, claves_profesores FROM C_Escuelas where claves = '{$claveE}'";
	$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['dato'][] = $consulta;
		}
		else {
			$resulta['success'] = 'no consultó';
			$json['dato'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consultó';
		$json['dato'][] = $resulta;
		echo json_encode($json);
	}
?>