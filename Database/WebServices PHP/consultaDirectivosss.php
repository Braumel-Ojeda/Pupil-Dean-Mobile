<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"])){
		$escuela=$_GET['escuela'];
		
		$consultaGeneral = "SELECT d.email, d.nombres, d.apellidos, d.claves FROM C_Escuelas e JOIN C_Directores d ON e.claves=d.claves and e.claves='{$escuela}'";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($consulta = mysqli_fetch_array($resultado)){
			$json['lista'][] = $consulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['lista'][] = $resulta;
		echo json_encode($json);
	}
?>