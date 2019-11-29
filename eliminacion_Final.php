<?php
if ($conexion = mysqli_connect('localhost', 'root', '12345', 'escuelaweb')) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cadena_JSON = file_get_contents('php://input');
		$datos = json_decode($cadena_JSON, true);
		$nc = $datos['nc'];
		$sql = "DELETE FROM alumnos WHERE Num_Control='$nc'";
		$res = mysqli_query($conexion, $sql);
		$repuesta = array();
		if ($res) {
			$repuesta['exito'] = 1;
			$repuesta['mensaje'] = "Eliminacion correcta";
			echo json_encode($repuesta);
		} else {
			$repuesta['exito'] = 0;
			$repuesta['mensaje'] = "ERROR en Eliminacion";
			echo json_encode($repuesta);
		}
	}
} else {
	die("Error en la conexion " . mysqli_connect_error());
}
?>