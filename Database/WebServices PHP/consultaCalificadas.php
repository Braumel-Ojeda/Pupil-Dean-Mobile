<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["grupo"]) && isset($_GET["materia"])){
		$escuela=$_GET['escuela'];
		$grupo=$_GET['grupo'];
		$materia=$_GET['materia'];
		$consultaGeneral = "select c.fecha, c.color, c.comentario from M_EspecGrupos e INNER JOIN M_Calificada c ON e.clave_materia=c.clave_materia INNER JOIN M_Alumno_grupo a ON a.user_alumno=c.usuario_alumno WHERE a.clave_grupo=e.clave_grupo and a.clave_grupo='{$grupo}' and c.clave_materia='{$materia}' and c.clave_escuela='{$escuela}' ORDER BY c.fecha desc";
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