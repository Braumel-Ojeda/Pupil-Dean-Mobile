<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["fecha"]) && isset($_GET["titulo"]) && isset($_GET["escuela"]) && isset($_GET["materia"]) && isset($_GET["fechaMax"]) && isset($_GET["horaMax"]) && isset($_GET["duracion"])){

	$clave=$_GET['clave'];
	$profe=$_GET['profe'];
	$fecha=$_GET['fecha'];
	$titulo=$_GET['titulo'];
	$escuela=$_GET['escuela'];
	$materia=$_GET['materia'];
	$fechaMax=$_GET['fechaMax'];
	$horaMax=$_GET['horaMax'];
	$duracion=$_GET['duracion'];

	$query = "INSERT INTO C_Examenes (clave_examen, user_profe, fecha, titulo, clave_escuela, clave_materia, fechaMax, horaMax, duracion) VALUES ('{$clave}','{$profe}','{$fecha}','{$titulo}','{$escuela}','{$materia}','{$fechaMax}','{$horaMax}','{$duracion}')";
	$resultado = mysqli_query($conexion, $query);
		if ($resultado){
			$consulta = "SELECT * FROM C_Examenes where clave_examen = '{$clave}'";
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