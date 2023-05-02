<?php
include 'conexion.php';
$json=array();

	$select = "SELECT CURDATE() AS Fecha, CURTIME() AS Tiempo";
	$resultado_select = mysqli_query($conexion, $select);
	if ($consulta = mysqli_fetch_array($resultado_select)){
		$json['hoy'][] = $consulta;
	}
	else {
		$resulta['success'] = 'no consultó';
		$json['hoy'][] = $resulta;
	}
	mysqli_close($conexion);
	echo json_encode($json);

?>