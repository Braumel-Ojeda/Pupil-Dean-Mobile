<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["dir"])){
		$escuela=$_GET['escuela'];
		$dir=$_GET['dir'];
		
		$select = "SELECT * FROM C_Publicaciones WHERE clave='{$escuela}' and nombre_usuario='{$dir}' order by id desc";
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