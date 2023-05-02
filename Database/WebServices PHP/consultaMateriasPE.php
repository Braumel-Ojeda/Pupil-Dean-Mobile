<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["grupo"])){
		
		$escuela=$_GET['escuela'];
		$grupo=$_GET['grupo'];
		
		$consultaGeneral = "select DISTINCT m.claves_materias, m.nombre_materia from C_Examenes c INNER JOIN C_Materia m ON c.clave_escuela=m.claves_escuela and c.clave_materia=m.claves_materias and c.clave_escuela='{$escuela}' INNER JOIN M_Asignacion_Examenes e ON c.clave_examen=e.clave_examen and e.clave_grupo='{$grupo}'";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($registro = mysqli_fetch_array($resultado)){
			$json['materias'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['materias'][] = $resulta;
		echo json_encode($json);
	}
?>