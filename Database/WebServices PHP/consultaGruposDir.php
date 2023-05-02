<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"])){
		
		$escuela=$_GET['escuela'];
		
		$consultaGeneral = "select DISTINCT a.grupo, a.clave_grupo from C_Grupo a JOIN M_EspecGrupos b ON a.clave_escuela='{$escuela}'";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($registro = mysqli_fetch_array($resultado)){
			$json['grupos'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['grupos'][] = $resulta;
		echo json_encode($json);
	}
?>