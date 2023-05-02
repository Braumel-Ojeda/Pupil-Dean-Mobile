<?php
include 'conexion.php';
	$json=array();

	if (isset($_GET["claveE"])){
		$claveE=$_GET['claveE'];
		$consultaGeneral = "SELECT clave_grupo, grupo FROM C_Grupo where clave_escuela = '{$claveE}'";
		$resultado = mysqli_query($conexion, $consultaGeneral);
	
		while ($registro = mysqli_fetch_array($resultado)){
			$json['grupos'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consultó';
		$json['grupos'][] = $resulta;
		echo json_encode($json);
	}
?>