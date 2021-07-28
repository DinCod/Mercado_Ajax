<?php
require_once("../modelo/modeloImgProducto.php");
$imgproducto = new ModeloImgProducto();
$imgproducto->setIdProducto($_POST['id']);
$imgproducto->setNombreProducto($_POST['nombre']);
$imgproducto->setCantidad($_POST['cantidad']);
$imgproducto->setPrecioVenta($_POST['precio']);
$resp = $imgproducto->editarSinImg();
echo $resp;
?>