<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["grupo"])){
		$escuela=$_GET['escuela'];
		$grupo=$_GET['grupo'];
		
		$select = "SELECT DISTINCT p.id, m.nombres, m.apellidos, p.publicacion FROM C_Publicaciones_Maestro p INNER JOIN M_EspecGrupos e ON p.clave=e.clave_escuela and p.clave='{$escuela}' and e.clave_grupo='{$grupo}' INNER JOIN C_Maestros m ON p.clave=m.claves and p.nombre_usuario=m.nombres_usuarios order by p.id desc";
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