<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["grupo"]) && isset($_GET["fecha"])){

	$clave=$_GET['clave'];
	$profe=$_GET['profe'];
	$grupo=$_GET['grupo'];
	$fecha=$_GET['fecha'];
	
	$query = "DELETE FROM M_Asignacion_Examenes WHERE clave_examen='{$clave}' and user_profe='{$profe}' and clave_grupo='{$grupo}' and fecha='{$fecha}'";
	$resultado = mysqli_query($conexion, $query);
		if ($resultado){
			$consulta = "SELECT * FROM M_Asignacion_Examenes where clave_examen = '{$clave}' and user_profe='{$profe}' and clave_grupo='{$grupo}' and fecha='{$fecha}'";
			$resultado = mysqli_query($conexion, $consulta);
			
			if ($registro = mysqli_fetch_array($resultado)){
				$json['borrado'][] = $registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
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