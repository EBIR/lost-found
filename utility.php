<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LostFound";

function agregarUsuario($nombre, $apellido, $correo, $password, $nombreUsuario) {
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], "", $GLOBALS['dbname']);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$logrado = FALSE;

	$sql = "INSERT INTO Usuario (nombre, email, password, nombre_usuario) values('".$nombre." ".$apellido."', '".$correo."', '".$password."', '".$nombreUsuario."');";

	if($conn->query($sql) === TRUE) {
		$logrado  = TRUE;
	}

	return $logrado;
}

function buscarUsuario($columna, $valor) {
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], "", $GLOBALS['dbname']);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$encontrado = FALSE;

	$result = $conn->query("SELECT ".$columna." FROM Usuario WHERE ".$columna."='".$valor."'");

	if($result->num_rows > 0) {
		$encontrado = TRUE;
	}

	$conn->close();

	return $encontrado;
}

function obtenerUsuario($columna, $valor) {
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], "", $GLOBALS['dbname']);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$result = $conn->query("SELECT * FROM Usuario WHERE ".$columna."='".$valor."'");
	$conn->close();

	return $result->fetch_assoc();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validarNombre($nombre){
	$valido = TRUE; 
	if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
  		$valido = FALSE;
	}
	return $valido;
}

function validarCorreo($correo){
	$valido = TRUE;
	if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
  		$valido = FALSE;
	}
	return $valido;	
}

?>
