<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["nombre"]) && isset($_GET["escuela"])){

	$clave=$_GET['clave'];
	$nombre=$_GET['nombre'];
	$escuela=$_GET['escuela'];
	
	$query = "DELETE FROM C_Materia WHERE claves_materias='{$clave}' and nombre_materia='{$nombre}' and claves_escuela='{$escuela}'";
	$resultado = mysqli_query($conexion, $query);
		if ($resultado){
			$resulta['clave'] = 'si';
			$json['borrado'][] = $resulta;
			echo json_encode($json);
			mysqli_close($conexion);
		}
		else {
			$resulta['clave'] = 'no';
			$json['borrado'][] = $resulta;
			echo json_encode($json);
		}
		mysqli_close($conexion);		
	}
	else {
		$resulta['clave'] = 'nop';
		$json['borrado'][] = $resulta;
		echo json_encode($json);
	}
?>