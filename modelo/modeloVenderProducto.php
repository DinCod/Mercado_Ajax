<?php  
class ModeloVenderProducto{
/*****Dats de la tabla Venta******/
private $fecha;
private $hora;
private $cantidadVender;
/*****Datos de la tabla Producto**/
private $idProducto;
private $nombreProducto;
private $cantidad;
private $precioVenta;
/*****Dato de la tabla Imagen_Producto*****/
private $imagen;
private $idImagen;
/**Metodos set**/
public function setIdProducto($idProducto){
    $this->idProducto=$idProducto;
}
/*----------------------------------------------*/
public function setNombreProducto($nombreProducto){
    $this->nombreProducto=$nombreProducto;
}
/*----------------------------------------------*/
public function setCantidad($cantidad){
    $this->cantidad=$cantidad;
}
/*----------------------------------------------*/
public function setPrecioVenta($precioVenta){
    $this->precioVenta=$precioVenta; 
} 
/*----------------------------------------------*/
public function setIdImagen($idImagen){
    $this->idImagen=$idImagen;
}
/*----------------------------------------------*/
public function setImagen($imagen){
    $this->imagen=$imagen;
}
/*----------------------------------------------*/
public function setFecha($fecha){
    $this->fecha=$fecha;
}
/*----------------------------------------------*/
public function setHora($hora){
    $this->hora=$hora;
}
/*----------------------------------------------*/
public function setCantidadVender($cantidadVender){
    $this->cantidadVender=$cantidadVender;
}
/*----------------------------------------------*/
public function venderProducto(){
    require_once("../conex.php");
    date_default_timezone_set('America/Lima');
    $this->fecha=date("Y-m-d");
    $this->hora=date("H:i:s"); 
    $query = "INSERT INTO venta (idproducto,fecha,hora,cantidad_vender) VALUES ('".$this->idProducto."','".$this->fecha."','".$this->hora."','".$this->cantidadVender."')";
    $cnx->query($query) or die("error $query");
    echo "ok";   
    
}
/*----------------------------------------------*/
public function cancelarVenta(){
    require_once("../conex.php");
    $sql="DELETE FROM venta WHERE idproducto = ". $this->idProducto;
    $cnx->query($sql) or die ("error");
    return "ok";
}
/*----------------------------------------------*/
}
?>