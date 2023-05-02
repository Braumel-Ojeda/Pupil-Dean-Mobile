<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"])){
		$escuela=$_GET['escuela'];
		
		$select = "SELECT m.nombres, m.apellidos, p.publicacion FROM C_Publicaciones_Maestro p JOIN C_Maestros m ON p.clave=m.claves and p.nombre_usuario=m.nombres_usuarios and p.clave='{$escuela}' order by id desc";
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