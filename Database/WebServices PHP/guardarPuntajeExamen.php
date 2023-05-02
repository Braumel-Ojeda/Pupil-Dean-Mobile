<?php
include 'conexion.php';
$json=array();
	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["fecha"]) && isset($_GET["alumno"]) && isset($_GET["tiempo"]) && isset($_GET["puntaje"])){
	
		$clave=$_GET['clave'];
		$profe=$_GET['profe'];
		$fecha=$_GET['fecha'];
		$alumno=$_GET['alumno'];
		$tiempo=$_GET['tiempo'];
		$puntaje=$_GET['puntaje'];
		
		
		$select = "UPDATE D_ResultadoExamenes SET puntaje={$puntaje}, estado_examen='Terminado', tiempo={$tiempo} where clave_examen='{$clave}' and user_profe='{$profe}' and fecha='{$fecha}' and user_alumno='{$alumno}'";
		$resultado_select = mysqli_query($conexion, $select);
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