<!DOCTYPE html>
<html>
<head>
	<title>Publicación</title>
</head>
<body>
	<?php 
	session_start();
	if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == FALSE) {
	  header('Location: index.php');
	}
	$time = $_SERVER['REQUEST_TIME'];
	$timeout_duration = 60;
	if(isset($_SESSION['LAST_ACTIVITY']) && ($time- $_SESSION['LAST_ACTIVITY']) > $timeout_duration){
	  session_unset();
	  session_destroy();
	  header('Location: index.php');
	}
	$_SESSION['LAST_ACTIVITY'] = $time;

	include 'utility.php';

	if(isset($_GET['id'])) {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], "", $GLOBALS['dbname']);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM Publicacion where hash_id='".$_GET['id']."'";

		$result = $conn->query($sql);

		if($result->num_rows > 0) {
			$publication  = $result->fetch_assoc();

			$user_result = $conn->query("SELECT nombre FROM Usuario where id='".$publication['usuario_id']."'");

			$user = $user_result->fetch_assoc();

			echo "<b><h3>".$publication['titulo']."</h3></b>";
			echo date( 'F jS', strtotime($publication['fecha']))." at ".date( 'g:i A', strtotime($publication['fecha']));
			echo "<p>".$publication['contenido']."</p>";
			echo "<b>Por </b>".$user['nombre']."<br>";

			?>
				<a href="home.php">pagina de inicio</a>
				<form action= "procesoComentario.php" method="post">
					<textarea name="comentario" class="registro" placeholder="Comentario..."></textarea>
					<input type="hidden" name="publicacion_id" value=" <?php echo $publication['ID'] ?>">
					<input type="hidden" name="usuario_id" value=" <?php echo $publication['usuario_id'] ?> ">
					<input type="hidden" name="hash_id" value=" <?php echo $publication['hash_id'] ?> ">
					<input type="submit" class="registro boton" value="publicar">
				</form>
			<?php

			$sql = "SELECT * FROM Comentarios WHERE publicacion_id='".$publication['ID']."'";

			$result = $conn->query($sql);

			echo "<b><h3>Comentarios</h3></b>";
			if($result->num_rows > 0) {
      			while($row = $result->fetch_assoc()) {
      				echo "<b>".$user['nombre']."	</b>";
      				echo date( 'F jS', strtotime($row['fecha']))." at ".date( 'g:i A', strtotime($row['fecha']));
        			echo "<br><p>".$row['contenido']."</p>";
      			}
    		}
		
		}
		else {
			echo "Publicacion no encontrada";
		}
	}
	else {
		header('Location: home.php');
	}
	?>

</body>
</html>

