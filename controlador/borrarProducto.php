<?php
require_once("../modelo/modeloProducto.php");
$producto = new ModeloProducto();
$producto->setIdProducto($_POST['idproducto']);
echo $producto->borrarProducto();
?>