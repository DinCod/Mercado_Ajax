<?php
require_once("../modelo/modeloProducto.php");
$producto = new ModeloProducto();
$producto->setNombreProducto($_POST['nombre']);
$producto->setPrecioCompra($_POST['precio']);
$producto->setPrecioVenta($_POST['venta']);
$producto->setCantidad($_POST['cantidad']);
$producto->setIdCategoria($_POST['cat']);
$resp = $producto->insertarProducto();
echo $resp;
?>
