<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["fecha"])){

	$clave=$_GET['clave'];
	$profe=$_GET['profe'];
	$fecha=$_GET['fecha'];
	
	$query = "DELETE FROM C_Examenes WHERE clave_examen='{$clave}' and user_profe='{$profe}' and fecha='{$fecha}'";
	$resultado = mysqli_query($conexion, $query);
		if ($resultado){
			$resulta['clave'] = 'si';
			$json['borrado'][] = $resulta;
			echo json_encode($json);
			mysqli_close($conexion);
		}
		else {
			$resulta['clave'] = 'no';
			$json['borrado'][] = $resulta;
			echo json_encode($json);
		}
		mysqli_close($conexion);		
	}
	else {
		$resulta['clave'] = 'nop';
		$json['borrado'][] = $resulta;
		echo json_encode($json);
	}
?>