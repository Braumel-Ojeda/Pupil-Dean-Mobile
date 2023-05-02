<?php
include 'conexion.php';
$json=array();

	if (isset($_POST["usuario"]) && isset($_POST["escuela"]) && isset($_POST["publi"]) && isset($_POST["nombres"]) && isset($_POST["apellidos"])){

	$usuario=$_POST['usuario'];
	$escuela=$_POST['escuela'];
	$publi=$_POST['publi'];
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];

	$insert = "INSERT INTO C_Publicaciones_Alumno (nombre_usuario, clave, publicacion, puesto, nombres, apellidos) VALUES ('{$usuario}','{$escuela}','{$publi}','Alumno','{$nombres}','{$apellidos}')";
	$resultado_insert = mysqli_query($conexion, $insert);
		if ($resultado_insert){
			$consulta = "SELECT * FROM M_CIProfe where usuario_alumno = '{$usuario}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['pub'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['publi'] = 'no';
			$json['pub'][] = $resulta;
			echo json_encode($json);
		}
	}
	else {
		$resulta['publi'] = 'no';
			$json['pub'][] = $resulta;
			echo json_encode($json);
	}
?>