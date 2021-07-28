<?php 
require_once("conex.php");
session_start();
error_reporting(0);
$sesion= $_SESSION['usuario'];
$sql="SELECT * FROM usuario WHERE username='$sesion'";
$rs = $cnx->query($sql);
if($rs->rowCount() > 0) {
header("Location: ../index.php");
}
// C:\xampp\htdocs\mercado2
// C:\xampp\htdocs\sesion7
?>

