<?php 
require_once("../modelo/modeloImgProducto.php");
$imgproducto = new ModeloImgProducto();
$imgproducto->setIdProducto($_POST['combo']);
$imgproducto->setImagen(addslashes(file_get_contents($_FILES['img']["tmp_name"])));
$resp = $imgproducto->insertarImg();
echo $resp;
?>