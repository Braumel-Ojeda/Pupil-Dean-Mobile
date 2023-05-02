<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"])){
		
		$escuela=$_GET['escuela'];
		
		$consultaGeneral = "select DISTINCT m.nombres_usuarios, m.nombres, m.apellidos from C_Maestros m JOIN M_EspecGrupos e ON m.claves='{$escuela}' and m.nombres_usuarios=e.user_profesor";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($registro = mysqli_fetch_array($resultado)){
			$json['profes'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['profes'][] = $resulta;
		echo json_encode($json);
	}
?>