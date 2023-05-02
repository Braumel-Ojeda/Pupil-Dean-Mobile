<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["usuario"]) && isset($_GET["escuela"])){

	$usuario=$_GET['usuario'];
	$escuela=$_GET['escuela'];

	$select = "SELECT a.nombres, a.apellidos, e.claves, e.nombres AS escuela, a.email FROM C_Alumnos a JOIN C_Escuelas e ON a.claves=e.claves and e.claves='{$escuela}' and a.nombres_usuarios='{$usuario}'";
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