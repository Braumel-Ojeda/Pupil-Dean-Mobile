<?php
include 'conexion.php';
	$json=array();
	if (isset($_GET["profe"]) && isset($_GET["clave"]) && isset($_GET["escuela"]) && isset($_GET["materia"]) && isset($_GET["fecha"])){
		$profe=$_GET['profe'];
		$clave=$_GET['clave'];
		$escuela=$_GET['escuela'];
		$materia=$_GET['materia'];
		$fecha=$_GET['fecha'];
		
		$consultaGeneral = "select m.claves_materias, m.nombre_materia, g.clave_grupo, g.grupo from M_EspecGrupos e INNER JOIN C_Grupo g ON e.clave_escuela=g.clave_escuela and e.clave_grupo=g.clave_grupo INNER JOIN C_Materia m ON m.claves_materias=e.clave_materia WHERE e.user_profesor like '{$profe}' and e.clave_grupo IN (select a.clave_grupo from M_Asignacion_Examenes a INNER JOIN C_Examenes x ON a.clave_examen='{$clave}' and x.clave_escuela='{$escuela}' and x.clave_materia='{$materia}' and x.fecha='{$fecha}') and e.clave_materia='{$materia}' order by g.grupo";
		$resultado = mysqli_query($conexion, $consultaGeneral);
		
		while ($consulta = mysqli_fetch_array($resultado)){
			$json['lista2'][] = $consulta;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else {
		$resulta['success'] = 'no consulta';
		$json['lista2'][] = $resulta;
		echo json_encode($json);
	}
?>