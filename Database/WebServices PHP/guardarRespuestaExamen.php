<?php
include 'conexion.php';
$json=array();
	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["fecha"]) && isset($_GET["alumno"]) && isset($_GET["numero"]) && isset($_GET["respuesta"])){
	
		$clave=$_GET['clave'];
		$profe=$_GET['profe'];
		$fecha=$_GET['fecha'];
		$alumno=$_GET['alumno'];
		$numero=$_GET['numero'];
		$respuesta=$_GET['respuesta'];
		
		$select = "INSERT INTO D_RespuestasExamen (clave_examen, user_profe, fecha, user_alumno, numero_pregunta, respuesta) VALUES ('{$clave}','{$profe}','{$fecha}','{$alumno}','{$numero}','{$respuesta}')";
		$resultado_select = mysqli_query($conexion, $select);
		if ($resultado){
			$consulta = "SELECT * FROM D_RespuestasExamen where clave_examen = '{$clave}' and user_profe = '{$profe}' and fecha = '{$fecha}' and user_alumno = '{$alumno}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['examen'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['clave'] = 'nop';
			$json['realizado'][] = $resulta;
			echo json_encode($json);
		}	
		mysqli_close($conexion);
	}
	else {
		$resulta['clave'] = 'nop';
		$json['realizado'][] = $resulta;
		echo json_encode($json);
	}

?>