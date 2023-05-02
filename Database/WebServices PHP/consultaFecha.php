<?php
include 'conexion.php';
$json=array();

	$select = "SELECT CURDATE()";
	$resultado_select = mysqli_query($conexion, $select);
	if ($consulta = mysqli_fetch_array($resultado_select)){
		$json['fecha'][] = $consulta;
	}
	else {
		$resulta['success'] = 'no consultó';
		$json['fecha'][] = $resulta;
	}
	mysqli_close($conexion);
	echo json_encode($json);

?>