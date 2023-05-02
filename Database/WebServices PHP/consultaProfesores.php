<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["escuela"]) && isset($_GET["grupo"])){

	$escuela=$_GET['escuela'];
	$grupo=$_GET['grupo'];

	$select = "select m.nombres, m.apellidos, m.email, a.nombre_materia from C_Maestros m INNER JOIN M_EspecGrupos e ON m.nombres_usuarios=e.user_profesor and e.clave_escuela='{$escuela}' and e.clave_grupo='{$grupo}' INNER JOIN C_Materia a ON e.clave_materia=a.claves_materias";
	$resultado_select = mysqli_query($conexion, $select);
		while ($registro = mysqli_fetch_array($resultado_select)){
			$json['datos'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consultó';
		$json['datos'][] = $resulta;
		echo json_encode($json);
	}
?>