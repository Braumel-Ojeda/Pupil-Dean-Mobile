<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["clave2"]) && isset($_GET["pregunta"]) && isset($_GET["class"]) && isset($_GET["profe"]) && isset($_GET["titulo"])){

	$clave=$_GET['clave'];
	$clave2=$_GET['clave2'];
	$pregunta=$_GET['pregunta'];
	$class=$_GET['class'];
	$profe=$_GET['profe'];
	$titulo=$_GET["titulo"]);


	$query = "INSERT INTO M_Examenes (clave_examen, clave_grupo, pregunta, clasificacion, user_profe, titulo) VALUES ('{$clave}','{$clave2}','{$pregunta}','{$class}','{$profe}', '{$titulo}')";
	$resultado = mysqli_query($conexion, $query);
		if ($resultado){
			$consulta = "SELECT * FROM M_Examenes where clave_examen = '{$clave}'";
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