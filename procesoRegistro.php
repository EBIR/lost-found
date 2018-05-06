<!DOCTYPE html>
<html>
<head>
	<title>Resgistro</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php
include 'utility.php';

$password = hash('sha256', $_POST['password']);

if(buscarUsuario("email", $_POST['correo'])) {
	die("El correo ".$_POST['correo']." ya ha sido registrado");
}

if(buscarUsuario("nombre_usuario", $_POST['nombreUsuario'])) {
	die("El nombre de usuario ".$_POST['nombreUsuario']." ya ha sido registrado");
}

if(agregarUsuario($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $password, $_POST['nombreUsuario'])) {
	?>
	<div>
		<p class="texto">
			<?php echo $_POST['nombre']." ".$_POST['apellido']." te has logrado registrar"; ?>		
		</p>
		<a href="index.php">Volver</a>
	</div>
	<?php
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