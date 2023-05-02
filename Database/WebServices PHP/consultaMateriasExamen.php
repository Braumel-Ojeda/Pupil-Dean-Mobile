<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["profe"])){
		$profe=$_GET['profe'];
		
		$consultaGeneral = "select DISTINCT m.claves_materias, m.nombre_materia from M_EspecGrupos e INNER JOIN C_Materia m ON e.clave_materia=m.claves_materias and e.clave_escuela=m.claves_escuela and e.user_profesor='{$profe}'";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($consulta = mysqli_fetch_array($resultado)){
			$json['materias'][] = $consulta;
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