<!DOCTYPE html>
<html>
<head>
	<title>Resgistro</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LostFound";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$password = hash('sha256', $_POST['password']);

$result = $conn->query("SELECT email FROM Usuario WHERE email='".$_POST['correo']."'");

if($result->num_rows > 0) {
	die("El correo ".$_POST['correo']." ya ha sido registrado");
}

$result = $conn->query("SELECT nombre_usuario FROM Usuario WHERE nombre_usuario='".$_POST['nombreUsuario']."'");

if($result->num_rows > 0) {
	die("El nombre de usuario ".$_POST['nombreUsuario']." ya ha sido registrado");
}

$sql = "INSERT INTO Usuario (nombre, email, password, nombre_usuario) values('".$_POST['nombre']." ".$_POST['apellido']."', '".$_POST['correo']."', '".$password."', '".$_POST['nombreUsuario']."');";

if($conn->query($sql) === TRUE) {
	?>
	<p class="texto">
		<?php echo $_POST['nombre']." ".$_POST['apellido']." te has logrado registrar"; ?>		
	</p>
	<?php
}
else {
	?>
	<p class="texto">
		<?php die("<p>Error a la hora de registrarse</p>"); ?>	
	</p>
	<?php
}

$conn->close();

?>
</body>
</html>