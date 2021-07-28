<?php
require_once("../modelo/modeloImgProducto.php");
$imgproducto = new ModeloImgProducto();
$imgproducto->setIdProducto($_POST['id']);
$imgproducto->setNombreProducto($_POST['nombre']);
$imgproducto->setCantidad($_POST['cantidad']);
$imgproducto->setPrecioVenta($_POST['precio']);
$img=$_FILES["img"]["tmp_name"];
$file = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
$imgproducto->setImagen($file);
$resp = $imgproducto->editarImg();
echo $resp;
?>