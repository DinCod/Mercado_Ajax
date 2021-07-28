<?php
require_once("../modelo/modeloProducto.php");
$producto = new ModeloProducto();
$reg = $producto->obtenerProducto($_POST["idproducto"]);
echo json_encode($reg);
?>