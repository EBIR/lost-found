<!DOCTYPE html>
<html>
<head >
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
		<form action="procesoRegistro.php" method="post">
			<input type="text" required="required" name="objeto" class="registro" placeholder="Objeto encontrado/perdido"><br/>

			<input type="text" required="required" name="contacto" class="registro" placeholder="Contacto (email, teléfono, ...)"><br/>

			<textarea name="descripcion" form="descripcion" class="registro" placeholder="Descripción..."></textarea>

			<a href="home.php"><input type="submit" class="registro boton" value="publicar" ></a>

		</form>
	</div>

</body>
</html>