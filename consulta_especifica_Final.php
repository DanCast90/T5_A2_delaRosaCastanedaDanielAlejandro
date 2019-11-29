<?php
if ($conexion = mysqli_connect('localhost', 'root', '12345', 'escuelaweb')) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cadena_JSON = file_get_contents('php://input'); //Informaacion a traves de HTTP, una cadena JSON
		$dato = json_decode($cadena_JSON, true); //Indica que debe retornor un vector asociativo
		$ca = $dato['ca'];
		$da = $dato['da'];
		if (is_numeric($da)) {
			$sql = "SELECT * FROM alumnos WHERE $ca=$da ";
			$res = mysqli_query($conexion, $sql);
			$datos['alumnos'] = array();
			while ($fila = mysqli_fetch_assoc($res)) {
				$alumno = array();
				$alumno['nc'] = $fila['Num_Control'];
				$alumno['n'] = $fila['Nombre_Alumno'];
				$alumno['pa'] = $fila['Primer_Ap_Alumno'];
				$alumno['sa'] = $fila['Segundo_Ap_Alumno'];
				$alumno['e'] = $fila['edad'];
				$alumno['s'] = $fila['Semestre'];
				$alumno['c'] = $fila['Carrera'];
				array_push($datos['alumnos'], $alumno);
			}
			echo json_encode($datos);
		} else {
			$sql = "SELECT * FROM alumnos WHERE $ca='$da' ";
			$res = mysqli_query($conexion, $sql);
			$datos['alumnos'] = array();
			while ($fila = mysqli_fetch_assoc($res)) {
				$alumno = array();
				$alumno['nc'] = $fila['Num_Control'];
				$alumno['n'] = $fila['Nombre_Alumno'];
				$alumno['pa'] = $fila['Primer_Ap_Alumno'];
				$alumno['sa'] = $fila['Segundo_Ap_Alumno'];
				$alumno['e'] = $fila['edad'];
				$alumno['s'] = $fila['Semestre'];
				$alumno['c'] = $fila['Carrera'];
				array_push($datos['alumnos'], $alumno);
			}
			echo json_encode($datos);
		}

	}
} else {
	die("Error en la conexion " . mysqli_connect_error());
}
?>
