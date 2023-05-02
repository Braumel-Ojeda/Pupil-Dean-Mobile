<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["profe"])){
		$profe=$_GET['profe'];
		
		$consultaGeneral = "select e.titulo, e.clave_examen, e.fecha, m.nombre_materia, e.user_profe, COUNT(*), e.fechaMax, e.horaMax, e.duracion from C_Examenes e INNER JOIN D_Examenes d ON e.clave_examen=d.clave_examen INNER JOIN C_Materia m ON e.clave_materia=m.claves_materias and e.clave_escuela=m.claves_escuela WHERE e.user_profe='{$profe}' GROUP BY e.clave_examen, e.user_profe, e.fecha";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($consulta = mysqli_fetch_array($resultado)){
			$json['examenes'][] = $consulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['examenes'][] = $resulta;
		echo json_encode($json);
	}
?>