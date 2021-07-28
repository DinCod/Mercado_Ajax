<?php 
require_once("../modelo/modeloRegistroLogin.php");
$registro = new ModeloRegistro();
$registro->setCorreo($_POST['user']);
$registro->setContraseña($_POST['pass']);
$rs = $registro->validarUsuario();
echo $rs;
?>