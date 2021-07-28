<?php
session_start();
error_reporting(0);
$sesion= $_SESSION['usuario'];
require_once("../conex.php");
$sql="SELECT p.nombreproducto,p.precioventa,i.imagen,p.idproducto,v.cantidad_vender
FROM venta v INNER JOIN producto p on v.idproducto=p.idproducto
INNER JOIN imagen_producto i on i.idproducto=p.idproducto";
$resultado= $cnx->query($sql);
/**************************************/
$count="SELECT COUNT(*) FROM historial_compra WHERE usuario='$sesion'";
$rs= $cnx->query($count);
$num_rows = $rs->fetchColumn();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mi Tienda | Venta</title>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    
<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/comprar.css">
<link rel="stylesheet" type="text/css" href="../css/estilocrud.css">
<link href="https://file.myfontastic.com/R24SJqdjLg54K9R846pCMb/icons.css" rel="stylesheet">
<!--modal-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 	 
<!--fin modal-->   
</head>
<body>
<?php if($sesion != null){ ?>
<nav class="main-nav" style="height: 100%;padding:15px;font-size:1.em;background:black;" >
   <div class="container container--flex">
     <h4 class="user" >Bienvenido : <?php  echo $sesion; ?></h4>
     <a  class="icon-out" href="../cerrarsesion.php"  style="color:white;text-decoration:none;">Cerrar Sesión</a>
   </div>  
</nav>
<?php }?> 
    <nav class="main-nav">
        <div class="container container--flex">
            <span class="icon-menu" id="btnmenu"></span>
             <ul class="menu" id="menu">
                <li class="menu__item"><a href="../index.php" class="menu__link">Inicio</a></li>
                <li class="menu__item"><a href="../nosotros.php" class="menu__link">Nosotros</a></li>
                <li class="menu__item"><a href="../contacto.php" class="menu__link">Contacto</a></li>
                <li class="menu__item"><a href="#" class="menu__link menu__link--select">Venta</a></li>
             </ul>
            <div class="social-icon">
                <?php if(!isset($sesion)){ ?>
                <h5 style="color:white" >Iniciar Sesión</h5>
                <a href="../vista/form-login.php" class="social-icon__link"><span  class="icon-user"></span></a>
                <?php } ?>
                <?php if($sesion != null || $sesion !=''){  ?>
                <h5 style="color:white"> Productos Comprados </h5>
                <a href="../historial.php" class="social-icon__link"><span class="icon-"><?php echo $num_rows;?></span></a>
                <?php  } ?>
            </div>
        </div>
    </nav>
<style>
    </style>
<main class="main">
 <section class="group today-special">
    <h2 class="group__title">Productos en Venta</h2>  
    <div class="container container--flex">
        <?php   while($row=$resultado->fetchObject()){ ?>
         <div class="column column--50-25">
         <div class="imagen-boton"style="color:white;background-color:black;border-radius:10px;"><?php echo $row->cantidad_vender;?></div>
         <div name="titulo" class="today-special__title"><?php echo $row->nombreproducto;?></div>
         <img style="heigh:100%; width:100%;object-fit:cover;align-items: flex-start;" name="imagen" class="today-special__img" src="data:image/jpg;base64,<?php echo base64_encode($row->imagen)?>">
         <div name="precio" class="today-special__price">S/<?php echo $row->precioventa; ?></div>
         <?php if($row->cantidad_vender==0){ ?>
         <a class="btn-comprar" onclick="stockVacio()"><img class="imagen-boton"src="../img/carrito.jpg">No Stock</a>
         <?php }else{  ?>
         <a class="btn-comprar" href="#modal-compra" data-toggle="modal" onclick="comprar('<?php echo $row->idproducto; ?>','<?php echo $row->precioventa; ?>','<?php echo $row->nombreproducto;?>','<?php echo $row->cantidad_vender;?>')"><img class="imagen-boton"src="../img/carrito.jpg">Comprar</a>
         <?php } ?>
         </div>
        <?php } ?>
    </div>  
  </section>
</main>
 <footer class="main-footer">
            <div class="container container--flex">
                <div class="column column--33">
                   <h2 class="column__title">¿Por qué visitarnos?</h2>
                   <p class="column_txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias doloribus, magni ut, totam consequuntur velit quas excepturi eaque facilis incidunt earum expedita reiciendis explicabo quidem ad. Facilis, blanditiis nobis laboriosam!</p>
                </div>
                <div class="column column--33">
                   <h2 class="column__title">Contáctanos</h2>
                   <p class="column_txt">Ovalo central-Santa Rosa</p>
                   <p class="column_txt">Teléfono: 999-999-999</p>
                   <p class="column_txt">mercado@bestMarket.com</p>
                </div> 
                <div class="column column--33">
                   <h2 class="column__title">Síguenos en nuestras redes</h2>
                   <p class="column_txt"><a href="" class="icon-facebook">Facebook</a></p>
                   <p class="column_txt"><a href="" class="icon-twitter">Síguenos en Twitter</a></p>
                   <p class="column_txt"><a href="" class="icon-youtube">Vísita nuestro canal</a></p>
                </div>
                <p class="copy">© 2021 Mi Tienda | Todos los derechos reservados</p>
            </div>
 </footer>
<script src="../js/menu.js"></script>
<!--MODAL COMPRAR-->
<div id="modal-compra" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog">
  <form action="../controlador/comprar.php"  method="post" enctype="multipart/form-data" >
   <div class="modal-content">
        <div class="modal-header">
				<div class="modal-title">
					<h3>Comprar Producto</h3>
				</div>
			</div>
			<div class="modal-body">
			<input type="hidden" id="idproducto" value="" name="idproducto">
            <input type="hidden" id="txtprecio" value="" name="txtprecio">
				<div class="form-group">
					<label for="txtproducto" >Nombre Del Producto</label>
					<input readonly type="text" class="form-control" name="txtproducto" id="txtproducto" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtventa" >Cantidad En Venta</label>
					<input readonly type="text" class="form-control" name="txtventa" id="txtventa" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtcompra" >Cantidad a comprar</label>
					<input  type="number" class="form-control" name="txtcompra" id="txtcompra" value="" placeholder="">
				</div>
			</div>
        <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" type="submit" onclick="return validarCompra()">Comprar</button>
      	</div>	
   </div>
  </form>
 </div>	
</div>
<!--FIN DEL MODAL COMPRA-->
</body>
<script> 
function comprar(id,preci,nom,cant){
var idpro = id; 
var precio=preci; 
var nombre= nom;
var cantidad=cant;
document.getElementById("idproducto").value=idpro;
document.getElementById("txtprecio").value=precio;
document.getElementById("txtproducto").value=nombre;
document.getElementById("txtventa").value=cantidad;
}
function validarCompra(){
    var cantidad_en_venta = document.getElementById("txtventa").value;
    var cantidad_a_comprar = document.getElementById("txtcompra").value;
     cantidadcomprar = Number(cantidad_a_comprar);
     cantidadventa = Number(cantidad_en_venta);
    if(cantidadcomprar>cantidadventa){
       var mensaje = confirm("LA CANTIDAD A COMPRAR EXCEDE A LA CANTIDAD EN VENTA");
       if(mensaje == true || mensaje == false ){   
        document.getElementById("txtcompra").value="";    
        return false; 
       }
    }
}

</script>
<script>
function stockVacio(){
    alert("Stock Venta Vacío");  
}
</script>
</html>