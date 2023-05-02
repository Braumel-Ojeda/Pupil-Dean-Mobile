<?php
include 'conexion.php';
	$json=array();

	if (isset($_GET["clave"])){
		$clave=$_GET['clave'];
		$consultaGeneral = "SELECT pregunta FROM M_Examenes where clave_examen = '{$clave}'";
		$resultado = mysqli_query($conexion, $consultaGeneral);
	
		while ($registro = mysqli_fetch_array($resultado)){
			$json['examen'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consultó';
		$json['examen'][] = $resulta;
		echo json_encode($json);
	}
?>