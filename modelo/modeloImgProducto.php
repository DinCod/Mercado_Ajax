<?php
class ModeloImgProducto{

private $idImagen;
private $idProducto;
private $imagen;
/*******Variables de la tabla producto********/
private $nombreProducto;
private $precioVenta;
private $cantidad;
/***********Metodo Set*************/
public function setIdImagen($idImagen){
   $this->idImagen=$idImagen;
}
public function setIdProducto($idProducto){
   $this->idProducto=$idProducto;
}
public function setImagen($imagen){
   $this->imagen=$imagen;
}
/************Metodo Get*************/
public function getIdImagen(){
   return $this->idImagen;
}
public function getIdProducto(){
   return $this->idProducto;
}
public function getImagen(){
   return $this->imagen;
}
/***********Metodo Set de la tabla Producto*************/
public function setNombreProducto($nombreProducto){
   $this->nombreProducto=$nombreProducto;
}
public function setPrecioVenta($precioVenta){
   $this->precioVenta=$precioVenta; 
}
public function setCantidad($cantidad){
   $this->cantidad=$cantidad;
}
/************Function's***********/
public function listarComboBox(){
   require_once("../conex.php");
   $usuario= $_SESSION['usuario'];
   $sql= "SELECT p.nombreproducto,p.idproducto,u.username from producto  p INNER JOIN usuario u on u.idusuario=p.idusuario
   where u.username='$usuario' and  not EXISTS(SELECT * from imagen_producto  i where i.idproducto=p.idproducto)";
   $rs=$cnx->query($sql);
   return $rs;
}

public function obtenerImgProducto($idProducto){
   require_once("../conex.php");
   $sql="select p.idproducto,p.nombreproducto,p.cantidad,p.precioventa,i.idimagen,i.imagen
   from producto p inner join imagen_producto i on i.idproducto=p.idproducto
   where p.idproducto = $idProducto";
   $rs=$cnx->query($sql) or die ("error $sql");
   $json = array();
   while($reg=$rs->fetchObject()){
     $json[]=array(
        'idproducto' => $reg->idproducto,
        'nombreproducto' => $reg->nombreproducto,
        'cantidad' => $reg->cantidad,
        'precioVenta' => $reg->precioventa,
        'idImagen' => $reg->idimagen,
        'imagen' => base64_encode($reg->imagen)
     );
   }
   return $json;  
}

public function insertarImg(){
   require_once("../conex.php");
   $existe="SELECT * FROM imagen_producto WHERE idproducto =". $this->idProducto;
   $rs=$cnx->query($existe) or die("error $existe"); 
   if($rs->rowCount() > 0){
      echo "existe";
   }else{
      require_once("../conex.php");
      $query = "INSERT INTO imagen_producto (idproducto,imagen) VALUES ('".$this->idProducto."','".$this->imagen."')";
      $cnx->query($query) or die("error $query");
      echo "ok";  
   }
}

/*public function listarImgProducto(){
   require_once("../conex.php");
   $dato= $_SESSION['usuario'];
   $sql="SELECT p.idproducto,p.nombreproducto, p.precioventa,i.imagen,i.idimagen,p.cantidad,u.username
   FROM usuario u inner join producto p on u.idusuario=p.idusuario
   INNER JOIN imagen_producto i on p.idproducto= i.idproducto
   where username='$dato' ORDER BY p.idproducto DESC";
   $rs=$cnx->query($sql);
   return $rs;
}*/

public function borrarImgProducto(){  
   require_once("../conex.php");
   $sql = "DELETE  FROM imagen_producto WHERE idproducto = ". $this->idProducto;
   $cnx->query($sql) or die ("error");
   return "ok";
}

public function editarImg(){
   require_once("../conex.php");
   $sql1="UPDATE producto INNER JOIN imagen_producto on producto.idproducto=imagen_producto.idproducto SET producto.nombreproducto = '" . $this->nombreProducto . "', imagen_producto.imagen = '" . $this->imagen . "', producto.precioventa = '" . $this->precioVenta . "', producto.cantidad = '" . $this->cantidad . "' WHERE  producto.idproducto = " . $this->idProducto;
   $cnx->query($sql1) or die ("error");
   return "ok";
}

public function editarSinImg(){
   require_once("../conex.php");
   $sql2="UPDATE producto  SET nombreproducto = '" . $this->nombreProducto . "', precioventa = '" . $this->precioVenta . "', cantidad = '" . $this->cantidad . "' WHERE  idproducto = " . $this->idProducto;
   $cnx->query($sql2) or die ("error");
   return "ok";
}
}
?>