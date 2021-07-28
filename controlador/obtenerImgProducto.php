<?php
require_once("../modelo/modeloImgProducto.php");
$img = new  ModeloImgProducto();
$reg = $img->obtenerImgProducto($_POST["idproducto"]);
echo json_encode($reg);
?>
