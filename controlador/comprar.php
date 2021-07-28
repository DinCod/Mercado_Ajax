<?php 
require_once("../modelo/modeloComprar.php");
$comprar = new ModeloComprar();
$comprar->setIdProducto($_POST['idproducto']);
$comprar->setPrecioProducto($_POST['txtprecio']);
$comprar->setNombreProducto($_POST['txtproducto']);
$comprar->setCantidadEnVenta($_POST['txtventa']);
$comprar->setCantidadComprada($_POST['txtcompra']);
$resp = $comprar->Historial_Compra();
echo $resp;
?>