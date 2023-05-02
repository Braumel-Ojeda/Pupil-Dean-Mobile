<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["grupo"])){
		$escuela=$_GET['escuela'];
		$grupo=$_GET['grupo'];
		
		$consultaGeneral = "select e.titulo, e.clave_examen, m.nombre_materia, e.user_profe, s.nombres, s.apellidos, a.fecha, COUNT(*), e.fechaMax, e.horaMax, e.duracion from C_Examenes e INNER JOIN M_Asignacion_Examenes a ON e.clave_examen=a.clave_examen and a.clave_grupo='{$grupo}' and e.clave_escuela='{$escuela}' INNER JOIN D_Examenes d ON e.clave_examen=d.clave_examen INNER JOIN C_Materia m ON e.clave_materia=m.claves_materias and e.clave_escuela=m.claves_escuela INNER JOIN C_Maestros s ON s.nombres_usuarios=e.user_profe and e.fechaMax>=(SELECT CURDATE()) GROUP BY e.clave_examen, e.user_profe, e.fecha";
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