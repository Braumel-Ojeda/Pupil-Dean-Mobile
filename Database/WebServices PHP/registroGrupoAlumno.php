<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["alumno"]) && isset($_GET["escuela"]) && isset($_GET["grupo"])){

	$alumno=$_GET['alumno'];
	$escuela=$_GET['escuela'];
	$grupo=$_GET['grupo'];
	
	$insert = "INSERT INTO M_Alumno_grupo (user_alumno, clave_escuela, clave_grupo) VALUES ('{$alumno}', '{$escuela}','{$grupo}')";
	$resultado_insert = mysqli_query($conexion, $insert);
		if ($resultado_insert){
			$consulta = "SELECT * FROM M_Alumno_grupo where user_alumno = '{$alumno}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['grupo'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['clave_grupo'] = '';
			$json['grupo'][] = $resulta;
			echo json_encode($json);
		}
		mysqli_close($conexion);
	}
	else {
		$resulta['clave_grupo'] = '';
		$json['grupo'][] = $resulta;
		echo json_encode($json);
	}
?>