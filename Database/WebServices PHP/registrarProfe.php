<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["nombre"]) && isset($_GET["apellido"]) && isset($_GET["email"]) && isset($_GET["usuario"]) && isset($_GET["contra"]) && isset($_GET["cp"]) && isset($_GET["escuela"]) && isset($_GET["escuela2"])){

	$nombre=$_GET['nombre'];
	$apellido=$_GET['apellido'];
	$email=$_GET['email'];
	$usuario=$_GET['usuario'];
	$contra=$_GET['contra'];
	$cp=$_GET['cp'];
	$escuela=$_GET['escuela'];
	$escuela2=$_GET['escuela2'];
	
	$insert = "INSERT INTO C_Maestros (nombres, apellidos, email, nombres_usuarios, password, codigos_postales, claves, claves_profesores) VALUES ('{$nombre}', '{$apellido}','{$email}','{$usuario}', '{$contra}','{$cp}', '{$escuela}', '{$escuela2}')";
	$resultado_insert = mysqli_query($conexion, $insert);
		if ($resultado_insert){
			$consulta = "SELECT * FROM C_Maestros where nombres_usuarios = '{$usuario}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['profe'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['nombres_usuarios'] = '';
			$json['profe'][] = $resulta;
			echo json_encode($json);
		}
		mysqli_close($conexion);
	}
	else {
		$resulta['nombres_usuarios'] = '';
		$json['profe'][] = $resulta;
		echo json_encode($json);
	}
?>