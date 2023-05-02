<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["profe"])){
		
		$profe=$_GET['profe'];
	
		$consultaGeneral = "select * from C_Examenes where user_profe = '{$profe}'";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($registro = mysqli_fetch_array($resultado)){
			$json['examenes'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['examenes'][] = $resulta;
		echo json_encode($json);
	}
?>