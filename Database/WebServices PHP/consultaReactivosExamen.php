<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["clave"]) && isset($_GET["profe"]) && isset($_GET["fecha"])){
		$clave=$_GET['clave'];
		$profe=$_GET['profe'];
		$fecha=$_GET['fecha'];
		
		$consultaGeneral = "select d.enunciado, c.titulo from D_Examenes d INNER JOIN C_Examenes c ON d.clave_examen=c.clave_examen where c.clave_examen='{$clave}' and c.user_profe='{$profe}' and c.fecha='{$fecha}' order by d.clasificacion";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($consulta = mysqli_fetch_array($resultado)){
			$json['examen'][] = $consulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['examen'][] = $resulta;
		echo json_encode($json);
	}
?>