<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"])){
		$escuela=$_GET['escuela'];
		
		$select = "SELECT a.nombres, a.apellidos, p.publicacion FROM C_Publicaciones_Alumno p JOIN C_Alumnos a ON p.clave=a.claves and p.nombre_usuario=a.nombres_usuarios and p.clave='{$escuela}' order by id desc";
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