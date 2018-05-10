<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == FALSE) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registro</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style/style.css">
		<link href='https://fonts.googleapis.com/css?family=Baloo' rel='stylesheet'>
	</head>
	<body>

		<?php 
			include 'utility.php';
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$id = uniqid(hash('adler32', $_POST['objeto']));

				$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], "", $GLOBALS['dbname']);

				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				$sql = "INSERT INTO Publicacion (usuario_id, titulo, contenido, tipo, fecha, hash_id) values('".$_SESSION['id_usuario']."', '".$_POST['objeto']."', '".$_POST['descripcion']."', '".$_POST['tipo']."', CURRENT_TIMESTAMP(), '".$id."');";

				if($conn->query($sql) === TRUE) {
					?> 
						<form name="myForm" action="publication.php" method="get">
							<input type="hidden" name="id" value="<?php echo $id ?>">
						</form>

						<script type="text/javascript">
							setTimeout(function() { document.myForm.submit() }, 5)
						</script>

					<?php
				}
				else {
					die("Error: " . $sql . "<br>" . $conn->error);
				}

			}
		?>

		<div class="container-fluid bg-1 text-center" style=" max-height: 18vh; overflow:hidden;">
			<div class="logo">
				<img src="img/logo.jpg"  style= "height: 18vh;" alt="logo" class = "logoLost">
			</div>
		</div>

		<div>
			<img id= "logo" src="unison.png" alt= "Unison" style=" height: 18vh;object-fit: contain;">
		</div>	
		<br>
		<div  class="formRegistro">
			<div class="tituloDiv"><h1 class="tituloRegistro">Publicación</h1></div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" required="required" name="objeto" class="registro" placeholder="Nombre del objeto"><br/>

				Perdido
				<input type="radio" value="Perdido" name="tipo" checked>

				Encontrado
				<input type="radio" value="Encontrado" name="tipo">

				<input type="text" required="required" name="contacto" class="registro" placeholder="Contacto (email, teléfono, ...)"><br/>

				<textarea name="descripcion" class="registro" placeholder="Descripción..."></textarea>

				<input type="submit" class="registro boton" value="publicar">

				<a href="home.php"><input class="registro boton" type="button" value="Cancelar"></a>

			</form>
		</div>
	</body>
</html>