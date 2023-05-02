<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["profe"])){

	$clave=$_GET['clave'];
	$profe=$_GET['profe'];
	

	$select = " select * from C_Examenes where clave_examen like '{$clave}' and user_profe like '{$profe}'";
	$resultado_select = mysqli_query($conexion, $select);
		if ($consulta = mysqli_fetch_array($resultado_select)){
			$json['existe'][] = $consulta;
		}
		else {
			$resulta['clave_examen'] = 'no';
			$json['existe'][] = $resulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['clave_examen'] = 'no';
		$json['existe'][] = $resulta;
		echo json_encode($json);
	}
?>