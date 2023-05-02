<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["grupo"])){

	$escuela=$_GET['escuela'];
	$grupo=$_GET['grupo'];
		
		$consultaGeneral = "select m.nombres, m.apellidos, m.nombres_usuarios, a.nombre_materia, a.claves_materias AS clave_materia from C_Maestros m INNER JOIN M_EspecGrupos e ON m.nombres_usuarios=e.user_profesor and e.clave_escuela='{$escuela}' and e.clave_grupo='{$grupo}' INNER JOIN C_Materia a ON e.clave_materia=a.claves_materias";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($registro = mysqli_fetch_array($resultado)){
			$json['profes'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['profes'][] = $resulta;
		echo json_encode($json);
	}
?>