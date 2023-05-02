<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["materia"]) && isset($_GET["grupo"]) && isset($_GET["alumno"])){
		$materia=$_GET['materia'];
		$grupo=$_GET['grupo'];
		$alumno=$_GET['alumno'];
		
		$consultaGeneral = "select c.titulo, r.tiempo, r.puntaje, COUNT(e.clasificacion) AS conteo from C_Examenes c INNER JOIN M_Asignacion_Examenes a ON c.clave_examen=a.clave_examen and c.user_profe=a.user_profe and c.fecha=a.fecha and a.clave_grupo='{$grupo}' and c.clave_materia='{$materia}' INNER JOIN D_Examenes e ON e.clave_examen=c.clave_examen and e.user_profe=c.user_profe and e.fecha=c.fecha INNER JOIN D_ResultadoExamenes r ON r.clave_examen=c.clave_examen and r.estado_examen='Terminado' and r.user_alumno='{$alumno}' and r.fechaFin<=(select CURDATE()) GROUP BY c.clave_examen, c.user_profe, c.fecha ORDER BY r.index desc";
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