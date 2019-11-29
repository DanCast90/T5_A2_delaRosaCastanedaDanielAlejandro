<?php

if ($conexion = mysqli_connect('localhost', 'root', '12345', 'escuelaweb')) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$cadena_JSON = file_get_contents('php://input');
		$datos = json_decode($cadena_JSON, true);

		$nc = $datos['nc'];
		$n = $datos['n'];
		$pa = $datos['pa'];
		$sa = $datos['sa'];
		$e = $datos['e'];
		$s = $datos['s'];
		$c = $datos['c'];

		$sql = "INSERT INTO alumnos VALUES('$nc','$n','$pa','$sa',$e,$s,'$c')";
		$res = mysqli_query($conexion, $sql);
		$respuesta = array();
		if ($res) {
			$respuesta['exito'] = 1;
			$respuesta['mensaje'] = "INSERCION CORRECTA";
			echo json_encode($respuesta);
		} else {
			$respuesta['exito'] = 0;
			$respuesta['mensaje'] = "ERROR EN INSERCION";
			echo json_encode($respuesta);
		}

	}

} else {
	die("Error de conexion" . mysqli_connect_error());
}

?>