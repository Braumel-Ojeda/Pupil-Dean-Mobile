<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["escuela"])){

	$escuela=$_GET['escuela'];
	
	$select = "select DISTINCT a.nombres_usuarios, a.nombres, g.grupo, a.apellidos, a.email from C_Alumnos a INNER JOIN M_Alumno_grupo a2 ON a.nombres_usuarios=a2.user_alumno and a2.clave_escuela='{$escuela}' INNER JOIN C_Grupo g ON g.clave_escuela=a2.clave_escuela and g.clave_grupo=a2.clave_grupo ORDER BY g.grupo, a.apellidos";
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