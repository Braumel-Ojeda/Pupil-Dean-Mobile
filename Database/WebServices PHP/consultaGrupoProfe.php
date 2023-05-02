<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["usuario"])){

	$usuario=$_GET['usuario'];

	$select = "SELECT clave_grupo FROM M_EspecGrupos where user_profesor = '{$usuario}'";
	$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['datos'][] = $consulta;
		}
		else {
			$resulta['success'] = 'no consultó';
			$json['datos'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consultó';
		$json['datos'][] = $resulta;
		echo json_encode($json);
	}
?>