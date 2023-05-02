<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"])){
		
		$escuela=$_GET['escuela'];
		
		$consultaGeneral = "SELECT * FROM C_Materia where claves_escuela like '{$escuela}'";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($registro = mysqli_fetch_array($resultado)){
			$json['materias'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['materias'][] = $resulta;
		echo json_encode($json);
	}
?>