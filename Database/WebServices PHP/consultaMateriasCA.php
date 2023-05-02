<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["grupo"])){
		
		$escuela=$_GET['escuela'];
		$grupo=$_GET['grupo'];
		
		$consultaGeneral = "select DISTINCT m.nombre_materia, m.claves_materias, e.user_profesor from M_EspecGrupos e INNER JOIN C_Materia m ON e.clave_escuela='{$escuela}' WHERE m.claves_materias NOT IN (select clave_materia from M_Calificada WHERE fecha = (SELECT CURDATE())) and e.clave_grupo like '{$grupo}' and m.claves_materias=e.clave_materia";
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