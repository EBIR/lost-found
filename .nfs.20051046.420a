<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == FALSE) {
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lost&Found UNISON</title>
  <meta charset="utf-8">
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
      <p>Usuario: <?php echo $_SESSION['usuario'] ?></p>
      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-radius:3px;">Publicar Objeto<br></button>
      <div id="id01" class="modal boton">
  
  <form class="modal-content animate" action="procesoPublicar.php" method="post">
    <div class="imgcontainer">
      <p><strong>Publicar Objeto</strong></p>
    </div>

    <div class="container">
      <input type="text" required="required" name="objeto" class="registro" placeholder="Nombre del objeto"><br/>

        Perdido
        <input type="radio" value="Perdido" name="tipo" checked>

        Encontrado
        <input type="radio" value="Encontrado" name="tipo">

        <input type="text" required="required" name="contacto" class="registro" placeholder="Contacto (email, teléfono, ...)"><br/>

        <textarea name="descripcion" class="registro" placeholder="Descripción..."></textarea>

        <input type="submit" class="registro boton" value="publicar">

        <a href="home.php"><input class="registro boton" type="button" value="Cancelar"></a>
      
    </div>

        <div class="container" style="background-color:#f1f1f1">
       <button type="button"  onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
     
        </div>
    </form>
  </div>
    
      <a href="logout.php"><button type="button" class="btn btn-danger" style="width:auto; position:absolute;">Salir</button></a>
     
</div>
<script type="text/javascript">
  var modal1 = document.getElementById('id01');
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal1) {
          modal1.style.display = "none";
      }
     
  } 
</script>

<div class="container-fluid bg-2 text-center" style=" width:70%; height:100vh;">
  <?php

    include 'utility.php';

    $conn = new mysqli($servername, $username, "", $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Publicacion ORDER BY id DESC LIMIT 4;";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        ?>
          <div>
            <h3><a href=" <?php echo "publication.php?id=".$row['hash_id']; ?> " onclick="document.myForm.submit()"><?php echo $row['titulo'] ?></a></h3>
            <?php echo "<p>".substr($row['contenido'], 0, 80)."</p>"; ?>
          </div>
        <?php
      }
    }

  ?>

</div>



<footer class="container-fluid bg-4 text-center" style="height:20vh; position:bottom; ">
  <p style="font-size: 25px;">Universidad de Sonora</p> 
   <img src="img/ebir.jpg" class="img-responsive margin" style=" position:relative;   width:8%; left:46%;" alt="ebir">
</footer>


</body>
</html>


