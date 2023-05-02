<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["escuela"])){

	$escuela=$_GET['escuela'];

	$select = "SELECT claves_profesores FROM C_Escuelas where claves like '{$escuela}'";
	$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['clave'][] = $consulta;
		}
		else {
			$resulta['claves_profesores'] = '';
			$json['clave'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['claves_profesores'] = '';
		$json['clave'][] = $resulta;
		echo json_encode($json);
	}
?>