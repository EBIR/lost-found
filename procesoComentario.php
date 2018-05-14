<?php 
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == FALSE) {
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
		include 'utility.php';
		if($_SERVER["REQUEST_METHOD"] == "POST") {

		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], "", $GLOBALS['dbname']);

		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO Comentarios(usuario_id, contenido, publicacion_id,fecha)
		 values('".$_POST['usuario_id']."', '".$_POST['comentario']."', '".$_POST['publicacion_id']."',CURRENT_TIMESTAMP());";

		if($conn->query($sql) === TRUE){
			$hash_id = substr($_POST['hash_id'], 1, strlen($_POST['hash_id']) - 2);

			?> 
				<form name="myForm" action="publication.php" method="get">
					<input type="hidden" name="id" value="<?php echo $hash_id ?>">
				</form>

				<script type="text/javascript">
					setTimeout(function() { document.myForm.submit() }, 5)
				</script>

			<?php
		}else{
			die("Error: " . $sql . "<br>" . $conn->error);
		}

		

	}else{
		header("Location: home.php");
	}


 	?>

</body>
</html>