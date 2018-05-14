<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == FALSE) {
  header('Location: home.php');
}
?>
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
