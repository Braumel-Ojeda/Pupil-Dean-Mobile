<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"])){
		$escuela=$_GET['escuela'];
		
		$select = "select g.clave_grupo, g.grupo, a.claves_materias, a.nombre_materia, m.nombres_usuarios, m.nombres, m.apellidos from M_EspecGrupos e INNER JOIN C_Maestros m ON e.clave_escuela=m.claves and m.claves='{$escuela}' and e.user_profesor=m.nombres_usuarios INNER JOIN C_Grupo g ON g.clave_escuela=e.clave_escuela and g.clave_grupo=e.clave_grupo INNER JOIN C_Materia a ON a.claves_escuela=e.clave_escuela and a.claves_materias=e.clave_materia order by g.clave_grupo";
		$resultado_select = mysqli_query($conexion, $select);
		while ($registro = mysqli_fetch_array($resultado_select)){
			$json['datos'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['datos'][] = $resulta;
		echo json_encode($json);
	}
?>