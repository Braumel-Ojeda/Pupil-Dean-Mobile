<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["fecha"]) && isset($_GET["alumno"])){

	$clave=$_GET['clave'];
	$profe=$_GET['profe'];
	$fecha=$_GET['fecha'];
	$alumno=$_GET['alumno'];
	
	$query = "SELECT * FROM C_Examenes where clave_examen='{$clave}' and user_profe='{$profe}' and fecha='{$fecha}' and user_alumno='{$alumno}'";
	$resultado = mysqli_query($conexion, $query);
		if ($resultado){
			$resulta['clave'] = 'si';
			$json['consulta'][] = $resulta;
			echo json_encode($json);
			mysqli_close($conexion);
		}
		else {
			$resulta['clave'] = 'no';
			$json['consulta'][] = $resulta;
			echo json_encode($json);
		}
		mysqli_close($conexion);		
	}
	else {
		$resulta['clave'] = 'nop';
		$json['consulta'][] = $resulta;
		echo json_encode($json);
	}
?>