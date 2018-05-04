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

<div class="container-fluid bg-1 text-center" style=" max-height: 24vh; overflow:hidden;">
  
     <div class="logo">
      <img src="img/logo.jpg"  style= "height: 24vh;" alt="logo" class = "logoLost">
     </div>

    <div class="form-group name">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr">
    </div>
    <div class="form-group password">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd">
    </div> 



    <div class="btn-group grupo">
      <a href="home.php"><button type="button" class="btn btn-success login" id="log">Iniciar Sesión</button>.</a>
      <a href="userform.php"><button type="button" class="btn btn-warning login">Registrarse</button>.</a>

    </div>

 
</div>


<div>
  
  <img id= "logo" src="unison.png" alt= "Unison" style=" height: 24vh;object-fit: contain;">
</div>
<!-- Second Container -->
<div class="container-fluid bg-2 text-center" style=" width:100%; height:60vh;">
  <h3 class="margin">Quienes Somos?</h3>
  <p>Somos un grupo de estudiantes de la Universidad de Sonora, que nos preocupamos por la integridad de nuestra institución. </p>
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

