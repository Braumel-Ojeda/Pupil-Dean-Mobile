<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["grupo"])){
		
		$escuela=$_GET['escuela'];
		$grupo=$_GET['grupo'];
		
		$consultaGeneral = "select DISTINCT a.Index, a.Color, a.comentario, d.nombres, d.apellidos, d.nombres_usuarios, b.nombre_materia, b.claves_materias from M_Calificada a INNER JOIN C_Materia b ON a.clave_materia=b.claves_materias INNER JOIN M_EspecGrupos c ON c.clave_escuela='{$escuela}' INNER JOIN C_Maestros d ON d.nombres_usuarios=a.usuario_profe INNER JOIN M_Alumno_grupo g ON g.user_alumno=a.usuario_alumno and c.clave_grupo=g.clave_grupo and c.clave_grupo='{$grupo}' order by b.claves_materias";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($registro = mysqli_fetch_array($resultado)){
			$json['info'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['info'][] = $resulta;
		echo json_encode($json);
	}
?>