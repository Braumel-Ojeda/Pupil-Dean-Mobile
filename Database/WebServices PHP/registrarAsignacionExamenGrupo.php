<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["grupo"]) && isset($_GET["fecha"])){

	$clave=$_GET['clave'];
	$profe=$_GET['profe'];
	$grupo=$_GET['grupo'];
	$fecha=$_GET['fecha'];
	
	$query = "INSERT INTO M_Asignacion_Examenes (clave_examen, user_profe, clave_grupo, fecha) VALUES ('{$clave}','{$profe}','{$grupo}','{$fecha}')";
	$resultado = mysqli_query($conexion, $query);
		if ($resultado){
			$consulta = "SELECT * FROM M_Asignacion_Examenes where clave_examen = '{$clave}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['asignacion'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['clave'] = 'no';
			$json['asignacion'][] = $resulta;
			echo json_encode($json);
		}
		mysqli_close($conexion);		
	}
	else {
		$resulta['clave'] = 'nop';
		$json['asignacion'][] = $resulta;
		echo json_encode($json);
	}
?>