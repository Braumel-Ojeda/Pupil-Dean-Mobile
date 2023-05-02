<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["fecha"]) && isset($_GET["alumno"]) && isset($_GET["estado"]) && isset($_GET["fechaInicio"]) && isset($_GET["horaInicio"]) && isset($_GET["fechaFin"]) && isset($_GET["horaFin"])){

	$clave=$_GET['clave'];
	$profe=$_GET['profe'];
	$fecha=$_GET['fecha'];
	$alumno=$_GET['alumno'];
	$estado=$_GET['estado'];
	$fechaInicio=$_GET['fechaInicio'];
	$horaInicio=$_GET['horaInicio'];
	$fechaFin=$_GET['fechaFin'];
	$horaFin=$_GET['horaFin'];

		$query = "INSERT INTO D_ResultadoExamenes (clave_examen, user_profe, fecha, user_alumno, estado_examen, fechaInicio, horaInicio, fechaFin, horaFin) VALUES ('{$clave}','{$profe}','{$fecha}','{$alumno}','{$estado}','{$fechaInicio}','{$horaInicio}','{$fechaFin}','{$horaFin}')";
		$resultado = mysqli_query($conexion, $query);
		if ($resultado){
			$consulta = "SELECT * FROM D_ResultadoExamenes where clave_examen = '{$clave}' and user_profe = '{$profe}' and fecha = '{$fecha}' and user_alumno = '{$alumno}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['examen'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['clave'] = 'no';
			$resulta['clave2'] = 'no';
			$resulta['pregunta'] = 'no';
			$json['examen'][] = $resulta;
			echo json_encode($json);
		}	
		mysqli_close($conexion);
	}
	else {
		$resulta['clave'] = 'nop';
		$resulta['clave2'] = 'nop';
		$resulta['pregunta'] = 'nop';
		$json['examen'][] = $resulta;
		echo json_encode($json);
	}
?>