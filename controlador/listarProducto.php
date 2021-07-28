<?php
require_once("../modelo/modeloProducto.php");
session_start();
$dato= $_SESSION['usuario'];
$producto = new ModeloProducto();
$rs = $producto->listarProducto($_POST['busca']);
$resultado="";
while($reg=$rs->fetchObject()){
	if($reg->username==$dato){
	$resultado.="<tr>
					<td>#$reg->idproducto</td>
					<td>$reg->nombreproducto</td>
					<td>S/ $reg->preciocompra</td>
					<td>S/ $reg->precioventa</td>
					<td>$reg->cantidad</td>
					<td>$reg->categoria</td>
					<td colspan='2'>
						<button class='btn btn-info' type='button' onclick='verdatos($reg->idproducto)'>Editar</button>
						<button class='btn btn-danger' type='button' onclick='eliminar($reg->idproducto)'>Eliminar</button>					
					</td>
				</tr>";
}
}
echo $resultado;
?>