<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["usuario"]) && isset($_GET["correo"]) && isset($_GET["password"])){

	$usuario=$_GET['usuario'];
	$correo=$_GET['correo'];
	$pw=$_GET['password'];

	$insert = "INSERT INTO Datos VALUES ('{$usuario}','{$correo}','{$pw}')";
	$resultado_insert = mysqli_query($conexion, $insert);
		if ($resultado_insert){
			$consulta = "SELECT * FROM Datos where usuario = '{$usuario}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['datos'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['usuario'] = 'error1';
			$resulta['correo'] = 'error2';
			$resulta['password'] = 'error3';
			$json['datos'][] = $resulta;
			echo json_encode($json);
		}
	}
	else {
		$resulta['usuario'] = 'error1';
			$resulta['correo'] = 'error2';
			$resulta['password'] = 'error3';
			$json['datos'][] = $resulta;
			echo json_encode($json);
	}
?>