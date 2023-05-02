<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["escuela"]) && isset($_GET["profe"]) && isset($_GET["materia"]) && isset($_GET["grupo"])){

	$escuela=$_GET['escuela'];
	$profe=$_GET['profe'];
	$materia=$_GET['materia'];
	$grupo=$_GET['grupo'];

		$consultaGeneral = "select a.fecha, a.comentario, s.nombres, s.apellidos, g.grupo from M_CIProfe a INNER JOIN M_Alumno_grupo b ON a.usuario_alumno=b.user_alumno and a.clave_escuela='{$escuela}' and a.clave_materia='{$materia}' and a.destinatario='{$profe}' INNER JOIN M_EspecGrupos c ON b.clave_grupo=c.clave_grupo and c.user_profesor=a.destinatario and c.clave_materia=a.clave_materia and b.clave_grupo='{$grupo}' INNER JOIN C_Grupo g ON g.clave_grupo=c.clave_grupo and a.clave_escuela=g.clave_escuela INNER JOIN C_Alumnos s ON s.claves=a.clave_escuela and s.nombres_usuarios=a.usuario_alumno order by a.id desc";
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