<?php
include 'conexion.php';
$json=array();

	if (isset($_GET["id"])){

	$id=$_GET['id'];
	
	$query = "DELETE FROM C_Publicaciones WHERE id='{$id}'";
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