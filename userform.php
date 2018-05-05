<!DOCTYPE html>
<html>
<head >
	<title>Registro</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>

	
	<div  class="formRegistro">
		<div class="tituloDiv"><h1 class="tituloRegistro">Registrarse</h1></div>
		<form action="procesoRegistro.php" method="post">
			<input type="text" required="required" name="nombre" class="registro" placeholder="Nombre"><br/>

			<input type="text" required="required" name="apellido" class="registro" placeholder="Apellido"><br/>

			<input type="text" required="required" name="nombreUsuario" class="registro" placeholder="Nombre de usuario"><br/>

			<input type="password" required="required" name="password" class="registro" placeholder="Contrase&ntilde;a"><br/>

			<input type="password" required="required" name="passwordConfirm" class="registro" placeholder="Confirmar contrase&ntilde;a"><br/>

			<input type="text" required="required" name="correo" class="registro" placeholder="Correo institucional"><br/>

			<input type="submit" class="registro boton" value="Registrar">
		</form>
	</div>

</body>
</html>