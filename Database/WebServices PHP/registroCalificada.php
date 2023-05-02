<?php
include 'conexion.php';
$json=array();

	if (isset($_POST["color"]) && isset($_POST["alumno"]) && isset($_POST["escuela"]) && isset($_POST["materia"]) && isset($_POST["comentario"]) && isset($_POST["profe"])){

	$color=$_POST['color'];
	$alumno=$_POST['alumno'];
	$escuela=$_POST['escuela'];
	$materia=$_POST['materia'];
	$comentario=$_POST['comentario'];
	$profe=$_POST['profe'];


	$insert = "INSERT INTO M_Calificada (color, usuario_alumno, clave_escuela, clave_materia, comentario, usuario_profe) VALUES ('{$color}','{$alumno}', '{$escuela}','{$materia}','{$comentario}','{$profe}')";
	$resultado_insert = mysqli_query($conexion, $insert);
		if ($resultado_insert){
			$consulta = "SELECT * FROM M_Calificada where usuario_alumno = '{$usuario}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['comentario'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['comment'] = 'no';
			$json['comentario'][] = $resulta;
			echo json_encode($json);
		}
		mysqli_close($conexion);
	}
	else {
		$resulta['comentario'] = 'no';
			$json['comentario'][] = $resulta;
			echo json_encode($json);
	}
?>