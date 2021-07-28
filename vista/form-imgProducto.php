<?php
session_start();
error_reporting(0);
$dato= $_SESSION['usuario'];
$tipe=$_SESSION['tipo'];
if($dato==null){ header("Location: form-login.php"); }else{ if($tipe==null){ echo "<script>alert('no tiene permiso de administrador');window.location= '../index.php'</script>";}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    
<meta charset="utf-8">
<title>Imagen Producto</title>
<link rel="stylesheet" href="../css/img-promocionar.css">
<link rel="stylesheet" type="text/css" href="../css/estilocrud.css">
<!--link's para el modal /Jquery/ajax/bootstrap-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="../js/crudImg.js"></script>
    <!-- close-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="https://file.myfontastic.com/R24SJqdjLg54K9R846pCMb/icons.css" rel="stylesheet">
<!-- ALERT'S -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>
<body>
<!-- agregar main nav -->
<nav class="main-nav">
        <div class="container container--flex">
            <span class="icon-menu" id="btnmenu"></span>
             <ul class="menu" id="menu">
                <li class="menu__item"><a href="../index.php" class="menu__link menu__link--select">Inicio</a></li>
                <li class="menu__item"><a href="form-producto.php" class="menu__link">Almacen de Productos</a></li>
                <li class="menu__item"><a href="form-venta.php" class="menu__link">Venta</a></li>
                <li class="menu__item"><a href="../nosotros.php" class="menu__link">Nosotros</a></li>
                <li class="menu__item"><a href="../contacto.php" class="menu__link">Contacto</a></li>
             </ul>
        </div>
</nav> 
<!-- Fin del  main nav -->
<center>
   <br>
   <br>
    <form enctype="multipart/form-data"> 
       <h3 class="subtittle1">Poner Productos a la venta </h3>
       <h6 class="subtittle2">Lista de Productos del Almacen</h6>
       <!-- combo box -->
	   <select name="combo" id="combo" class="selectproducto">
      
      </select> <br>
       <!-- fin del combo box-->
       <input class="file" required type="file" name="image" id="image">  
       <input class="file" required type="button" name="insert" id="insert" onclick="guardarImagen()" value="Guardar Imagen">  
    </form>  
</center>	
<center>
    <table>
				<thead>
					<tr>
						<th> Codigo Producto </th>
						<th> Nombre Producto </th>
						<th> Cantidad </th>
						<th> Precio Venta </th>
						<th> Imagen </th>
						<th colspan="2"> Operaciones </th>
					</tr>
				</thead>  <!--w@asamanAR22-->
				<tbody id="tbodyList">
			
				</tbody>
	</table>
	<br>
	<br>
</center>
<!-- modal para la venta -->
<div id="modal-venta" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog">
  <form action="../controlador/insertarVentaProducto.php"  method="post">
   <div class="modal-content">
        <div class="modal-header">
				<div class="modal-title">
					<h3>Producto</h3>
				</div>
			</div>
			<div class="modal-body">
			<input type="hidden" id="idproducto" value="" name="idproducto">
				<div class="form-group">
					<label for="txtnombre" >Nombre Del Producto</label>
					<input  readonly type="text" class="form-control" name="txtnombre" id="txtnombre" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtcantidad" >Precio</label>
					<input  readonly type="text" class="form-control" name="txtprecio" id="txtprecio" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtprecio" >Cantidad en Stock</label>
					<input  readonly type="text" class="form-control" name="txtcantidad" id="txtcantidad" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtventa" >Cantidad a Vender</label>
					<input type="number" class="form-control" name="txtventa" id="txtventa" value="" placeholder="">
				</div>
			</div>

          <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" id="delete" type="button" onclick="venderProducto()">Vender</button>
      	</div>	
   </div>
  </form>
 </div>	
</div>
<!--termina el modal para la venta-->

<!-- modal para la imagen -->
<div id="modal-imagen" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog">
  <form  enctype="multipart/form-data" >
   <div class="modal-content">
        <div class="modal-header">
				<div class="modal-title">
					<h3>Imagen</h3>
				</div>
			</div>
			<div class="modal-body">
			<input type="hidden" id="idproductoimg" value="" name="idproductoimg">
      <input type="hidden" id="txtidimg" value="" name="txtidimg">
				<div class="form-group">
					<label for="txtnombre" >Nombre Del Producto</label>
					<input type="text" class="form-control" name="txtnombreimagen" id="txtnombreimagen" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtcantidad" >Cantidad</label>
					<input   type="number" class="form-control" name="txtcantidadimagen" id="txtcantidadimagen" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtprecio" >Precio Venta</label>
					<input  type="number" step = "any"  class="form-control" name="txtprecioimagen" id="txtprecioimagen" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtimagen" >Imagen Del Producto</label> <br>
					<img  id="txtimagen" name="txtimagen" src=""> <br>
				</div>
        <input type= "file" id="txtimage" name="txtimage" value="Escoger img">
			</div>
        <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" type="button" onclick="actualizarImg()">Guardar Cambios</button>
      	</div>	
   </div>
  </form>
 </div>	
</div>
<!--termina el modal para la imagen-->
</body>
<script>listarImgProducto()</script>
<script>listarComboBox()</script>
<script src="../js/menu.js"></script>
</html> 