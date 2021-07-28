<?php
require_once("../modelo/modeloComprar.php");
session_start();
$usuario= $_SESSION['usuario'];
$historial = new ModeloComprar();
$rs = $historial->Historial_Usuario($_POST['buscar']);
$resultado="";
while($reg=$rs->fetchObject()){
	if($reg->usuario==$usuario){
	$resultado.="<tr>
	                 <td># $reg->idhistorial       </td>
	                 <td>  $reg->nombre_producto   </td>
	                 <td>  $reg->precio_producto   </td>
	                 <td>  $reg->cantidad_comprada </td>
	                 <td>  $reg->total_pagar       </td>
	                 <td>  $reg->fecha             </td>
				</tr>
				";
    }
}
echo $resultado;
?>