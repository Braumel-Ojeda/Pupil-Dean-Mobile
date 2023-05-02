<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["fecha"]) && isset($_GET["pregunta"]) && isset($_GET["class"]) && isset($_GET["profe"])){

	$clave=$_GET['clave'];
	$fecha=$_GET['fecha'];
	$pregunta=$_GET['pregunta'];
	$class=$_GET['class'];
	$profe=$_GET['profe'];


	$query = "INSERT INTO D_Examenes (clave_examen, fecha, enunciado, clasificacion, user_profe) VALUES ('{$clave}','{$fecha}','{$pregunta}','{$class}','{$profe}')";
	$resultado = mysqli_query($conexion, $query);
		if ($resultado){
			$consulta = "SELECT * FROM D_Examenes where clave_examen = '{$clave}'";
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