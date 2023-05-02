<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["profe"])){
		$profe=$_GET['profe'];
		$consultaGeneral = "select m.claves_materias, m.nombre_materia, g.clave_grupo, g.grupo from M_EspecGrupos e INNER JOIN C_Grupo g ON e.clave_escuela=g.clave_escuela and e.clave_grupo=g.clave_grupo INNER JOIN C_Materia m ON m.claves_materias=e.clave_materia and e.user_profesor like '{$profe}' order by g.grupo";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($consulta = mysqli_fetch_array($resultado)){
			$json['lista'][] = $consulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['lista'][] = $resulta;
		echo json_encode($json);
	}
?>