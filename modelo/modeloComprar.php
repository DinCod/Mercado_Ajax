<?php  
class ModeloComprar{
private $idProducto;
private $nombreProducto;
private $precioProducto;
private $cantidad_comprada;
private $cantidad_en_venta;
private $fecha;
/************Metodo Set***************/
public function setIdProducto($idProducto){
    $this->idProducto=$idProducto;
}
public function setNombreProducto($nombreProducto){
    $this->nombreProducto=$nombreProducto;
}
public function setPrecioProducto($precioProducto){
    $this->precioProducto=$precioProducto;
}
public  function setCantidadComprada($cantidad_comprada){
    $this->cantidad_comprada=$cantidad_comprada;
}
public function setCantidadEnVenta($cantidad_en_venta){
    $this->cantidad_en_venta=$cantidad_en_venta;
}

public function setFecha($fecha){
    $this->fecha=$fecha;
}
public function listarVenta(){
    require_once("../conex.php");
    $sql= "SELECT p.nombreproducto,p.precioventa,i.imagen,p.idproducto,v.cantidad_vender
    FROM venta v INNER JOIN producto p on v.idproducto=p.idproducto
    INNER JOIN imagen_producto i on i.idproducto=p.idproducto";
    $rs = $cnx->query($sql) or die ("error");
    return $rs;  
}
/***************Historial*****************/
public function Historial_Usuario($txtbuscar){
    require_once("../conex.php");
    $usuario= $_SESSION['usuario'];
    $sql="SELECT idhistorial,nombre_producto,precio_producto,cantidad_comprada,total_pagar,fecha,usuario
    FROM historial_compra
    where usuario='$usuario'  AND nombre_producto LIKE '%$txtbuscar%' OR precio_producto LIKE '%$txtbuscar%' OR cantidad_comprada LIKE '%$txtbuscar%' OR fecha LIKE '%$txtbuscar%'";
    $rs = $cnx->query($sql) or die ("error");
    return $rs;  
}
public function Historial_Compra(){
    require_once("../conex.php");
    session_start();
    error_reporting(0);
    /**VARIABLES**/
    $usuario= $_SESSION['usuario'];
    $this->fecha=date("Y-m-d");
    $total=$this->precioProducto*$this->cantidad_comprada;
    /**FIN-VARIABLES**/ 
    if($usuario==null){
    echo "<script>
    alert('Para realizar la comprar debe ingresar a su cuenta, GRACIAS...');
    window.location= '../vista/form-login.php'
    </script>";
    }else{
        $sqlUsername= "SELECT idusuario FROM usuario where  username = '$usuario'";
        $rs =  $cnx->query($sqlUsername) or die ("error");
        if($reg=$rs->fetchObject()){
         $idusuario=$reg->idusuario;
        }
        
       if($this->cantidad_comprada<=$this->cantidad_en_venta){
         $sql = "INSERT INTO historial_compra (idproducto,idusuario,usuario,nombre_producto,precio_producto,cantidad_comprada,total_pagar,fecha) VALUES('".$this->idProducto."','$idusuario','$usuario','".$this->nombreProducto."','".$this->precioProducto."','".$this->cantidad_comprada."','$total','".$this->fecha."')";  
         $cnx->query($sql) or die("error $sql");
         echo "<script>
                 alert('Gracias por su Compra!');
                 window.location= '../vista/form-venta.php'
         </script>";
        }else{
        echo "<script>
                 alert('La cantidad a comprar sobrepasa el stock para comprar');
                 window.location= '../vista/form-venta.php'
        </script>";
        }
    }
}
/**********************************/
} 
?>    