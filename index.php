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

<div class="container-fluid bg-1 text-center" style=" max-height: 24vh; overflow:hidden;">
  
     <div class="logo">
      <img src="img/logo.jpg"  style= "height: 18vh;" alt="logo" class = "logoLost">
     </div>

      
  
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-radius:3px;" class ="botonlogin">Login</button>

<div id="id01" class="modal boton">
  
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <p><strong>INICIAR SESIÓN  </strong></p>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button"  onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
  </form>
</div>

<script>

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    <a href="userform.html"><button type="button" class="btn btn-warning registrar">Registrarse</button>.</a>

</div>

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

