<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["nombre"]) && isset($_GET["escuela"])){

	$clave=$_GET['clave'];
	$nombre=$_GET['nombre'];
	$escuela=$_GET['escuela'];

	$insert = "INSERT INTO C_Materia (claves_materias, nombre_materia, claves_escuela) VALUES ('{$clave}','{$nombre}','{$escuela}')";
	$resultado_insert = mysqli_query($conexion, $insert);
		if ($resultado_insert){
			$consulta = "SELECT * FROM C_Materia where claves_materias = '{$clave}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['materias'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resulta['clave'] = 'no';
			$resulta['nombre'] = 'no';
			$resulta['escuela'] = 'no';
			$json['materias'][] = $resulta;
			echo json_encode($json);
		}
	}
	else {
		$resulta['clave'] = 'no';
		$resulta['nombre'] = 'no';
		$resulta['escuela'] = 'no';
		$json['materias'][] = $resulta;
		echo json_encode($json);
	}
?>