<?php 
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == FALSE) {
  header('Location: home.php');
}

include 'utility.php';

if(isset($_GET['id'])) {
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], "", $GLOBALS['dbname']);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM Publicacion where hash_id='".$_GET['id']."'";

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$publication = $row = $result->fetch_assoc();

		$user_result = $conn->query("SELECT nombre FROM Usuario where id='".$publication['usuario_id']."'");

		$user = $user_result->fetch_assoc();

		echo "<b><h2>".$publication['titulo']."</h2></b>";
		echo date( 'F jS', strtotime($publication['fecha']))." at ".date( 'g:i A', strtotime($publication['fecha']));
		echo "<p>".$publication['contenido']."</p>";
		echo "<b>Por </b>".$user['nombre']."<br>";
		?>
			<a href="home.php">pagina de inicio</a>
		<?php
	}
	else {
		echo "Publicacion no encontrada";
	}
}
else {
	header('Location: home.php');
}

?>

