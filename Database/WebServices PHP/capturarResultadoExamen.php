<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave_examen"]) && isset($_GET["usuario"])){

	$clave_examen=$_GET['clave_examen'];
	$usuario=$_GET['usuario'];

	$insert = "INSERT INTO D_ResultadoExamenes (clave_examen, user_alumno) VALUES ('{$clave_examen}','{$usuario}')";
	$resultado_insert = mysqli_query($conexion, $insert);
		if ($resultado_insert){
			$consulta = "SELECT (clave_examen, user_alumno) FROM M_Examenes where clave_examen = '{$clave_examen}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['res'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['clave'] = 'nel';
			$json['res'][] = $resulta;
			echo json_encode($json);
		}
	}
	else {
		$resulta['clave'] = 'nel';
		$json['res'][] = $resulta;
		echo json_encode($json);
	}
?>