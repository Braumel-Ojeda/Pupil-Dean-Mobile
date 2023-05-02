<?php
include 'conexion.php';
$json=array();
	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["fecha"]) && isset($_GET["alumno"])){
	
		$clave=$_GET['clave'];
		$profe=$_GET['profe'];
		$fecha=$_GET['fecha'];
		$alumno=$_GET['alumno'];
		
		$select = "SELECT fechaInicio, horaInicio, CURDATE() AS Fecha, CURTIME() AS Tiempo from D_ResultadoExamenes where clave_examen='{$clave}' and user_profe='{$profe}' and fecha='{$fecha}' and user_alumno='{$alumno}'";
		$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['hoy'][] = $consulta;
		}
		else {
			$resulta['success'] = 'no consultó';
			$json['hoy'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['clave'] = 'nop';
		$json['realizado'][] = $resulta;
		echo json_encode($json);
	}

?>