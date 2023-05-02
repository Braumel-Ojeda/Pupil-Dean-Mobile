<?php
include 'conexion.php';
$json=array();

	if (isset($_POST["usuario"]) && isset($_POST["comentario"]) && isset($_POST["destino"])){

	$usuario=$_POST['usuario'];
	$comentario=$_POST['comentario'];
	$destino=$_POST['destino'];

	$insert = "INSERT INTO M_CIDir (usuario_alumno, comentario, destinatario) VALUES ('{$usuario}','{$comentario}','{$destino}')";
	$resultado_insert = mysqli_query($conexion, $insert);
		if ($resultado_insert){
			$consulta = "SELECT * FROM M_ComentarioIncognito where usuario_alumno = '{$usuario}'";
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
	}
	else {
		$resulta['comentario'] = 'no';
			$json['comentario'][] = $resulta;
			echo json_encode($json);
	}
?>