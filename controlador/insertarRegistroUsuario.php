<?php 
require_once("../modelo/modeloRegistroLogin.php");
$registro = new ModeloRegistro();
$registro->setCorreo($_POST['txtuser']);
$registro->setNombre($_POST['txtnombre']);
$registro->setContraseña($_POST['txtpass']);
$rs = $registro->registrarUsuario();
echo $rs;
?>