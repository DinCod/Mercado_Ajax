<?php  
require_once("../modelo/modeloImgProducto.php");
$imgproducto = new ModeloImgProducto();
$imgproducto->setIdProducto($_POST['idproducto']);
echo $imgproducto->borrarImgProducto();
?>
