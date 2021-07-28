<?php require_once("../return.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    

	<title>Mercado / Login User MVsC</title>
  <link rel="stylesheet" href="../css/diseño.css">
</head>
  <body>
  <section class="container">
        <section class="container_form">
        <section class="info_title">
        <img  class="img-logo" src="../img/logo.jpg" alt="">
        <h2 class="wel">Bienvenido a <br> 'Mi mercado'</h2>
        </section>
  </section>

	<form action="../controlador/validarRegistroUsuario.php" method="post" class="container_input" >
	<div>
      <h2 class="from_title">Ingresar</h2>
	    <input  class="input-50" type="text" placeholder="Email or Username"  name="user" required>
	    <input  class="input-50" placeholder="Contraseña" type="password" name="pass" required>
      <a class="w" href="form-registro.php"> Crear Cuenta Nueva </a>
      <input type="submit" name="btnEnviar" value="Ingresar" class="btn_enviar">    
	</div>
  </form>
  </body>
</html>  
