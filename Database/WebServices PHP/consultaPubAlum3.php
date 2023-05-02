<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["grupo"])){
		$escuela=$_GET['escuela'];
		$grupo=$_GET['grupo'];
		
		$select = "SELECT DISTINCT p.id, a.nombres, a.apellidos, p.publicacion FROM C_Publicaciones_Alumno p JOIN C_Alumnos a ON p.clave=a.claves and p.nombre_usuario=a.nombres_usuarios and p.clave='{$escuela}' INNER JOIN M_Alumno_grupo a2 ON p.nombre_usuario=a2.user_alumno and a2.clave_grupo='{$grupo}' order by id desc";
		$resultado_select = mysqli_query($conexion, $select);
		while ($registro = mysqli_fetch_array($resultado_select)){
			$json['datos'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['datos'][] = $resulta;
		echo json_encode($json);
	}
?>