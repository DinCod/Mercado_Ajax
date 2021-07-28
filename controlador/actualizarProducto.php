<?php
require_once("../modelo/modeloProducto.php");
$producto = new ModeloProducto();
$producto->setIdProducto($_POST['idpersona']);
$producto->setNombreProducto($_POST['nombre']);
$producto->setCantidad($_POST['cantidad']);
$producto->setPrecioCompra($_POST['precio']);
$producto->setPrecioVenta($_POST['venta']);
$producto->setIdCategoria($_POST['cat']);
$resp = $producto->editarProducto();
echo $resp;
?>