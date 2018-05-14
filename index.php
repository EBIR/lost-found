<?php 
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
  header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lost&Found Unison</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php
include 'utility.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(buscarUsuario("nombre_usuario", $_POST['usuario'])) {
    $usuario = obtenerUsuario("nombre_usuario", $_POST['usuario']);

    $password = hash('sha256', $_POST['password']);

    if($password === $usuario['password']) {
      $_SESSION['id_usuario'] = $usuario['ID'];
      $_SESSION['nombre'] = $usuario['nombre'];
      $_SESSION['usuario'] = $usuario['nombre_usuario'];
      $_SESSION['correo'] = $usuario['email'];
      $_SESSION['logged_in'] = TRUE;
    }
  }

  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
    header('Location: home.php');
  }
  else {
    echo '<script language="javascript">alert("Usuario o password incorrectos");</script>';
  }
}
?>

<div class="container-fluid bg-1 text-center" style=" max-height: 24vh; overflow:hidden;">
  
     <div class="logo">
      <img src="img/logo.jpg"  style= "height: 18vh;" alt="logo" class = "logoLost">
     </div>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-radius:3px;" class ="botonlogin">Login</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto; border-radius:3px;" class ="registrar">Registrarse</button>

<div id="id01" class="modal boton">
  
  <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="imgcontainer">
      <p><strong>INICIAR SESIÓN  </strong></p>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="usuario" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button"  onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
  </form>
</div>
</div>

<div id="id02" class="modal boton">
  <form class="modal-content animate" action="procesoRegistro.php" method="post">
    <div class="imgcontainer">
      <p><strong>Registro</strong></p>
    </div>

    <div class="container">
			<input type="text" required="required" name="nombre" class="registro" placeholder="Nombre"><br/>

			<input type="text" required="required" name="apellido" class="registro" placeholder="Apellido"><br/>

			<input type="text" required="required" name="nombreUsuario" class="registro" placeholder="Nombre de usuario"><br/>

			<input type="password" required="required" name="password" class="registro" placeholder="Contrase&ntilde;a"><br/>

			<input type="password" required="required" name="passwordConfirm" class="registro" placeholder="Confirmar contrase&ntilde;a"><br/>

			<input type="text" required="required" name="correo" class="registro" placeholder="Correo institucional"><br/>

			<input type="submit" class="registro boton" value="Registrar">
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button"  onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
  </form>
</div>


<script type="text/javascript">
	var modal1 = document.getElementById('id01');
	var modal2 = document.getElementById('id02');
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal1) {
	        modal1.style.display = "none";
	    }
	    if (event.target == modal2) {
	        modal2.style.display = "none";
	    }
	}	
</script>



<div>
  <img id= "logo" src="unison.png" alt= "Unison" style=" height: 18vh;object-fit: contain;">
</div>
<!-- Second Container -->
<div class="container-fluid bg-2 text-center" style=" width:100%; height:60vh;">
  <h3 class="margin">Quienes Somos?</h3>
  <p>Somos grupo de estudiantes de la Universidad de Sonora interesados en estimular valores de honestidad en nuestra institución</p>
  <!--<img src="img/uni.jpg" class="img-responsive img-circle margin fotito" style="display:inline" alt="Unison" width="500" height="350">-->
  <div class="col-sm-4"> 
  
      <img src="img/uni.jpg" class="img-responsive margin" style="width:100%" alt="Image">
  </div>
   <div class="col-sm-4"> 
      <img src="img/lostandfound.png" class="img-responsive margin" style="width:115% height:100%" alt="Image">
      
  </div>
  <div class="col-sm-4"> 
      <img src="img/amigos.png" class="img-responsive margin" style="width:100%" alt="amigos">
      
  </div>
</div>


<!-- Footer -->
<footer class="container-fluid bg-4 text-center" style="height:20vh; ">
  <p style="font-size: 25px;">Universidad de Sonora</p> 
   <img src="img/ebir.jpg" class="img-responsive margin" style=" position:absolute;   width:8%; left:46%;" alt="ebir">
</footer>

<!--
<a href="colaboradores.php" class="btn btn-info colaboradores" role="button">Colaboradores </a>
-->

</body>
</html>

