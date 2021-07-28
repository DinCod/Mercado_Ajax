<?php 
 require_once("conex.php");
 error_reporting(0);
 $venta="SELECT * FROM venta WHERE idproducto='49'";    
 $rsul = $cnx->query($venta);
 if($rsul->rowCount() > 0){
 session_start();
 $_SESSION['siVenta'] = "siExisteVenta";
 }
 if($rsul->rowCount() == 0){ 
 $_SESSION['noVenta'] = "noExisteVenta";
 }
 echo $_SESSION['noVenta'];
 echo $_SESSION['siVenta'];
?>