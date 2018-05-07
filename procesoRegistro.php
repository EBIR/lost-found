<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php
include 'utility.php';

$nombre = test_input($_POST["nombre"]);
$apellido = test_input($_POST["apellido"]);
$correo = test_input($_POST["correo"]);


$password = hash('sha256', $_POST['password']);

if(validarNombre($nombre) === FALSE){
	echo "El nombre solo puede contener letras y espacios blancos\n";
	header( "refresh:3; url=userform.php" );
}

if(validarNombre($apellido) === FALSE){
	echo "El apellido solo puede contener letras y espacios blancos\n";
	header( "refresh:3; url=userform.php" );
}

if(validarCorreo($correo) === FALSE){
	echo "El correo no es valido\n";
	header( "refresh:3; url=userform.php" );
}

if(buscarUsuario("email", $correo)) {
	die("El correo ".$_POST['correo']." ya ha sido registrado");
}

if(buscarUsuario("nombre_usuario", $_POST['nombreUsuario'])) {
	die("El nombre de usuario ".$_POST['nombreUsuario']." ya ha sido registrado");
}

if(validarCorreo($correo) && validarNombre($apellido) && validarNombre($nombre)) {
	agregarUsuario($nombre, $apellido, $correo, $password, $_POST['nombreUsuario']);
	echo '<script language="javascript">alert("Se ha registrado exitosamente");</script>';
	header( "refresh:3; url=index.php" );
}
else {
	?>
	<div>
		<p class="texto">
			<?php die("<p>Error a la hora de registrarse</p>"); ?>	
		</p>
	</div>
	<?php
}

?>
</body>
</html>