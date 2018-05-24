<?php
		session_start();
	if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == FALSE) {
	  header('Location: index.php');
	}
	$time = $_SERVER['REQUEST_TIME'];
	$timeout_duration = 900;
	if(isset($_SESSION['LAST_ACTIVITY']) && ($time- $_SESSION['LAST_ACTIVITY']) > $timeout_duration){
	  session_unset();
	  session_destroy();
	  header('Location: index.php');
	}
	$_SESSION['LAST_ACTIVITY'] = $time;

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Publicación</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="style/style.css">
</head>
<body>
	
	<header class="container-fluid bg-1 text-center" style="max-height: 18vh; overflow:hidden;">
     <div class="logo">
      <img src="img/logo.jpg"  style= "height: 18vh;" alt="logo" class = "logoLost">
     </div>
<!--
     <div class="btn-group grupo">
      <a href="index.php"><button type="button" class="btn btn-danger salir" >Salir</button></a>
    </div>-->
	</header>

	<div class="col-sm-2 sidenav" style="background-color: #8c8c8c; width:auto;">
      <a href="home.php"><button type="button" class="btn btn-success">Regresar</button></a>
      
      <a href="logout.php"><button type="button" class="btn btn-danger" style="width:auto; position:absolute;">Salir</button></a>
     
	</div>

	<div class="container-fluid bg-2 text-center" style=" width:70%; height:100vh;">
	<?php 
	

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
					<textarea name="comentario" class="registro" placeholder="Comentario..." style="color:black;"></textarea>
					<input type="hidden" name="publicacion_id" value=" <?php echo $publication['ID'] ?>">
					<input type="hidden" name="usuario_id" value=" <?php echo $_SESSION['id_usuario'] ?> ">
					<input type="hidden" name="hash_id" value=" <?php echo $publication['hash_id'] ?> ">
					<input type="submit" class="registro boton" value="publicar">
				</form>
			<?php

			$sql = "SELECT * FROM Comentarios WHERE publicacion_id='".$publication['ID']."'";

			$result = $conn->query($sql);

			echo "<b><h3>Comentarios</h3></b>";
			if($result->num_rows > 0) {
      			while($row = $result->fetch_assoc()) {
      				$result2 = getRows("Usuario", "ID", $row['usuario_id']);
      				$user2 = $result2->fetch_assoc();
      				echo "<b>".$user2['nombre']."	</b>";
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
</div> 

      
     
</div>

	<footer class="container-fluid bg-4 text-center" style="height:20vh; position:bottom; ">
 	 <p style="font-size: 25px;">Universidad de Sonora</p> 
   	<img src="img/ebir.jpg" class="img-responsive margin" style=" position:relative;   width:8%; left:46%;" alt="ebir">
	</footer>


</body>
</html>

