<?php require_once("../return.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mi mercado | Registro MVC</title>
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
<form action="../controlador/insertarRegistroUsuario.php" method="post" class="container_input" >
	<div>
        <h2 class="from_title">Crear Cuenta Ahora!!</h2>
		<input  class="input-50" type="text" placeholder="Nombre"  name="txtnombre" required>
		<input  class="input-50" type="text" placeholder="Email o username"  name="txtuser" required>
		<input  class="input-50" placeholder="Contraseña" type="password" name="txtpass" required>
		<input type="submit" name="btnEnviar" style="margin-top: 4px;" value="Crear Cuenta" class="btn_enviar">
	</div>
</form>
</body>
</html>  