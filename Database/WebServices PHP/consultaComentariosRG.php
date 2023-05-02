<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["escuela"]) && isset($_GET["materia"]) && isset($_GET["profe"]) && isset($_GET["grupo"])){

	$escuela=$_GET['escuela'];
	$materia=$_GET['materia'];
	$profe=$_GET['profe'];
	$grupo=$_GET['grupo'];
	
	$select = "select s.nombres, s.apellidos, a.fecha, a.comentario from M_Calificada a INNER JOIN M_Alumno_grupo b ON a.usuario_alumno=b.user_alumno and b.clave_grupo='{$grupo}' and a.clave_escuela='{$escuela}' and a.clave_materia='{$materia}' and a.usuario_profe='{$profe}' INNER JOIN C_Alumnos s ON a.usuario_alumno=s.nombres_usuarios order by a.fecha desc";
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