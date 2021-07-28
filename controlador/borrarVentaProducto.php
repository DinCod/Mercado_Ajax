<?php 
require_once("../modelo/modeloVenderProducto.php");
$venta = new ModeloVenderProducto();
$venta->setIdProducto($_POST['idproducto']);
echo $venta->cancelarVenta();
?>
