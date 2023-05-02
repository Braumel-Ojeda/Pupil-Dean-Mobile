<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"])){
		$escuela=$_GET['escuela'];
		
		$select = "SELECT d.nombres, d.apellidos, p.publicacion FROM C_Publicaciones p JOIN C_Directores d ON p.clave=d.claves and p.nombre_usuario=d.nombres_usuarios and p.clave='{$escuela}' order by id desc";
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