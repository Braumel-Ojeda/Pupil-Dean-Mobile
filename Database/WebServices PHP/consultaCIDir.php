<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["dir"])){

	$escuela=$_GET['escuela'];
	$dir=$_GET['dir'];

		$consultaGeneral = "select a.fecha, a.comentario, g.grupo, c.nombres, c.apellidos from M_CIDir a INNER JOIN M_Alumno_grupo b ON a.usuario_alumno=b.user_alumno and b.clave_escuela='{$escuela}' and a.destinatario='{$dir}' INNER JOIN C_Alumnos c ON c.nombres_usuarios=b.user_alumno INNER JOIN C_Grupo g ON b.clave_escuela=g.clave_escuela and b.clave_grupo=g.clave_grupo order by a.id desc";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($registro = mysqli_fetch_array($resultado)){
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