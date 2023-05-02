<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["escuela"]) && isset($_GET["grupo"]) && isset($_GET["alumno"])){

	$escuela=$_GET['escuela'];
	$grupo=$_GET['grupo'];
	$alumno=$_GET['alumno'];
	
	$select = "select a.nombres, a.apellidos, a.email from C_Alumnos a INNER JOIN M_Alumno_grupo a2 ON a.nombres_usuarios=a2.user_alumno where a.nombres_usuarios NOT IN (SELECT nombres_usuarios FROM C_Alumnos where nombres_usuarios='{$alumno}') and a2.clave_escuela='{$escuela}' and a2.clave_grupo='{$grupo}'";
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