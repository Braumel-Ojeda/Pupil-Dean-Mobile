<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["usuario"])){
		
		$usuario=$_GET['usuario'];
		
		$consultaGeneral = "select DISTINCT m.nombres, m.apellidos, m.nombres_usuarios from M_EspecGrupos e INNER JOIN M_Alumno_grupo a ON e.clave_grupo=a.clave_grupo INNER JOIN C_Maestros m ON m.nombres_usuarios=e.user_profesor and a.user_alumno like '{$usuario}'";
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