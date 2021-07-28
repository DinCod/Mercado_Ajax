<?php
require_once("../modelo/modeloImgProducto.php");
session_start();
$usuario= $_SESSION['usuario'];
$comboBox = new ModeloImgProducto();
$rs = $comboBox->listarComboBox();
$result="";
while($reg=$rs->fetchObject()){
    if($reg->username==$usuario){
      $result.="
      <option class='selectproducto' name='combo' id='combo' value='$reg->idproducto'>$reg->nombreproducto</option>
      ";
    }
}
echo $result;
?>
