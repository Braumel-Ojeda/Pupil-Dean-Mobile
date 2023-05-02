<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"])){
		$escuela=$_GET['escuela'];
		
		$select = "SELECT d.nombres, d.apellidos, d.nombres_usuarios FROM C_Escuelas e JOIN C_Directores d ON e.claves=d.claves and e.claves='{$escuela}'";
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