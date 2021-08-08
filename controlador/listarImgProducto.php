<?php
session_start();
require_once("../conex.php");
$dato= $_SESSION['usuario'];

$sql="SELECT p.idproducto,p.nombreproducto, p.precioventa,i.imagen,i.idimagen,p.cantidad,u.username
FROM usuario u inner join producto p on u.idusuario=p.idusuario
INNER JOIN imagen_producto i on p.idproducto= i.idproducto
where username='$dato' ORDER BY p.idproducto DESC";
$rs = $cnx->query($sql) or die ("error $sql");

$result="";
while($reg=$rs->fetchObject()){
  if($reg->username==$dato){
    $result.="<tr>
                <td>#$reg->idproducto</td>
                <td>$reg->nombreproducto</td>
                <td>$reg->cantidad</td>
                <td class='column'>s/$reg->precioventa</td>
                <td><img src=".'data:image/jpg;base64,'.base64_encode($reg->imagen)."></td>
		              <td colspan='3'>
                  <button class='btn btn-info' type='button' onclick='verdatosImg($reg->idproducto)'>Editar</button>
                  <button class='btn btn-danger' type='button' onclick='eliminarImg($reg->idproducto)'>Eliminar</button>
                ";
                $venta="SELECT * FROM venta WHERE idproducto='$reg->idproducto'";    
                $rsul = $cnx->query($venta);
                if($rsul->rowCount() == 1){
                  $result.="
                  <button class='btn btn-dark' type='button'  onclick='cancelarVenta($reg->idproducto)'>Cancelar Venta</button>					
                
                ";
                }
               if($rsul->rowCount() == 0){
                  $result.="
                  <button class='btn btn-success' type='button'  onclick='verProductoVenta($reg->idproducto)'>Vender</button>					
              
                ";
                }		
  }
}
echo $result;
?>