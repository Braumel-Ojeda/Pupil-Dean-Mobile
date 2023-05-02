<?php
include 'conexion.php';
	$json=array();

	if (isset($_GET["claveP"])){
		$claveP=$_GET['claveP'];
		$consultaGeneral = "SELECT nombres, apellidos, nombres_usuarios FROM C_Maestros where claves_profesores = '{$claveP}'";
		$resultado = mysqli_query($conexion, $consultaGeneral);
	
		while ($registro = mysqli_fetch_array($resultado)){
			$json['profes'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consultó';
		$json['profes'][] = $resulta;
		echo json_encode($json);
	}
?>