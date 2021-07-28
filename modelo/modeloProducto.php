<?php
class ModeloProducto{
private $modelo;
private $cnx;
private $idProducto;
private $idUsuario;
private $nombreProducto;
private $precioCompra;
private $precioVenta;
private $cantidad;
private $idCategoria;
/********Metodos Set*******/
public function setIdProducto($idProducto){
    $this->idProducto=$idProducto;
}
public function setIdUsuario($idUsuario){
    $this->idUsuario=$idUsuario;
}
public function setNombreProducto($nombreProducto){
    $this->nombreProducto=$nombreProducto;
}
public function setPrecioCompra($precioCompra){
    $this->precioCompra=$precioCompra;
}
public function setPrecioVenta($precioVenta){
    $this->precioVenta=$precioVenta; 
} 
public function setCantidad($cantidad){
   $this->cantidad=$cantidad;
}
public function setIdCategoria($idCategoria){
   $this->idCategoria=$idCategoria;
}
/*********Metodo Get**********/
public function getIdProducto(){
    return $this->idProducto;
}
public function getIdUsuario(){
    return $this->idUsuario;
}
public function getNombreProducto(){
    return $this->nombreProducto;
}
public function getPrecioCompra(){
    return $this->precioCompra;
}
public function getPrecioVenta(){
    return $this->precioVenta;
}
public function getCantidad(){
    return $this->cantidad;
}
public function getIdCategoria(){
    return $this->idCategoria;
}
/***********FUNCTION'S CRUD*************/
public function insertarProducto(){
    require_once("../conex.php");
    session_start();
    $dato= $_SESSION['usuario'];
    //usario = arajo0003;
    $sql= "SELECT idusuario FROM usuario where  username = '$dato'";
    $rs =  $cnx->query($sql) or die ("error");
    if($reg=$rs->fetchObject()){
        $iduser=$reg->idusuario;
    }
    $sql2="INSERT INTO producto (idusuario,nombreproducto,preciocompra,precioventa,cantidad,idcategoria) 
    VALUES ('".$iduser."','".$this->nombreProducto."','".$this->precioCompra."','".$this->precioVenta."','".$this->cantidad."','".$this->idCategoria."')";
    $cnx->query($sql2) or die ("error");
    echo "ok";   
}
public function listarProducto($txtbusca){
    require_once("../conex.php");
    $dato= $_SESSION['usuario'];
    $sql= "SELECT usuario.username,nombreproducto,preciocompra,cantidad,idproducto,precioventa,categoria.categoria
    FROM usuario inner join producto on usuario.idusuario=producto.idusuario
    inner join categoria on producto.idcategoria=categoria.idcategoria
    where username='$dato' AND nombreproducto LIKE '%$txtbusca%' OR categoria.categoria LIKE '%$txtbusca%' OR preciocompra LIKE '%$txtbusca%' ";
    $rs = $cnx->query($sql) or die ("error");
    return $rs;    
}
public function editarProducto(){
    require_once("../conex.php");
    $sql="UPDATE producto SET nombreproducto= '" .$this->nombreProducto . "', preciocompra= '" .$this->precioCompra . "',  precioventa= '" .$this->precioVenta . "' , cantidad= '" .$this->cantidad . "', idcategoria= '" .$this->idCategoria . "' WHERE idproducto = ". $this->idProducto;
    $cnx->query($sql) or die ("error");
    return "ok";
}
public function borrarProducto(){  
    require_once("../conex.php");
    $sql = "DELETE  FROM producto WHERE idproducto = ". $this->idProducto;
    $cnx->query($sql) or die ("error");
    return "ok";
}
public function obtenerProducto($idProducto){
    require_once("../conex.php");
    $sql = "SELECT idproducto, idusuario, nombreproducto, preciocompra, precioventa, cantidad, idcategoria FROM producto WHERE idproducto=$idProducto";
    $rs =  $cnx->query($sql) or die ("error");
    $reg = $rs->fetchObject(); 
    return $reg;  
}
}
?>