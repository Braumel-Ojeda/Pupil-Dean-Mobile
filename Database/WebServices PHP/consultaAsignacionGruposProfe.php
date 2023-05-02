<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["profe"])){

	$profe=$_GET['profe'];

	$select = "SELECT clave_grupo FROM M_EspecGrupos where user_profesor like '{$profe}'";
	$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['clave'][] = $consulta;
		}
		else {
			$resulta['clave_grupo'] = '';
			$json['clave'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['clave_grupo'] = '';
		$json['clave'][] = $resulta;
		echo json_encode($json);
	}
?>