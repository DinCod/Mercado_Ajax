<?php 
require_once("../modelo/modeloVenderProducto.php");
$venta = new ModeloVenderProducto();
$venta->setIdProducto($_POST['id']);
//$venta->setNombreProducto($_POST['nombre']);
//$venta->setPrecioVenta($_POST['precio']);
$venta->setCantidadVender($_POST['cantidadVender']);
$venta->setCantidad($_POST['cantidad']);
$resp = $venta->venderProducto();
echo $resp;
?>