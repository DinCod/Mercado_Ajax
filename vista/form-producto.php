<?php
session_start();
error_reporting(0);
$dato= $_SESSION['usuario'];
$tipe=$_SESSION['tipo'];
if($dato==null){
    header("Location: form-login.php");
}else{
	if($tipe==null){
		echo "<script>
		alert('no tiene permiso de administrador');
		window.location= '../index.php'
		 </script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi Tienda | Almacen</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="../css/estilocrud.css">
	<link rel="stylesheet" type="text/css" href="../css/formproducto.css">
	<link href="https://file.myfontastic.com/R24SJqdjLg54K9R846pCMb/icons.css" rel="stylesheet">
	<script src="../js/crudProducto.js"></script>
</head>
<body>
<img  class="all" src="../img/almacen.jpg" alt="">
<nav class="main-nav">
    <div class="container container--flex">
        <span class="icon-menu" id="btnmenu"></span>
        <ul class="menu" id="menu">
                <li class="menu__item"><a href="../index.php" class="menu__link ">Inicio</a></li>
				<li class="menu__item"><a href="#" class="menu__link menu__link--select">Almacen de Producto</a></li>
				<li class="menu__item"><a href="form-imgProducto.php" class="menu__link ">Imagen Producto</a></li>
                <li class="menu__item"><a href="../nosotros.php" class="menu__link">Nosotros</a></li>
                <li class="menu__item"><a href="../contacto.php" class="menu__link">Contacto</a></li>
        </ul>
    </div>
</nav> 
<div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
			   <div class="table-title">
				  <div class="row">
					<div class="col-6">
						<h3>Almacen De Productos</h3>
					</div>
					<div class="col-6">
						<button href="#modalfrm" class="btn btn-success" onclick="nuevo()"  data-toggle="modal">Agregar</button>
					</div>
				</div>
			</div>	
	    <div class="row">
			<div class="col-2">
				<h4>Buscar</h4>
			</div>
			<div class="col-8">
	<input class="form-control" type="text" name="txtbusca" id="txtbusca" value="" placeholder="Buscar por: Nombre, Precio de Compra o Categorias" onkeyup="listado()" >
			</div>	
			<div class="col-2">
					
			</div>	
		</div>	
		
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Cod</th>
					<th>Nombre Producto</th>
					<th>Precio Compra</th>
					<th>Precio Venta</th>
					<th>Cantidad</th>
					<th>Categoria</th>
					<th colspan="2">Acciones</th>
				</tr>
			</thead>
			<tbody id="registros">
				
			</tbody>
		</table>


		
	</div>
	</div>
</div>

<div id="modalfrm" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog">
  <form>
   <div class="modal-content">
   
			<div class="modal-header">
				<div class="modal-title">
					<h3>Producto</h3>
				</div>
			</div>

			<div class="modal-body">
			<input type="hidden" id="idproducto" value="">
				<div class="form-group">
					<label for="txtnombre" >Nombre Producto</label>
					<input type="text" class="form-control" name="txtnombre" id="txtnombre" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtcantidad" >Cantidad del producto</label>
					<input type="number" class="form-control" name="txtcantidad" id="txtcantidad" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtprecio" >Precio de Compra</label>
					<input type="number" step = "any" class="form-control" name="txtprecio" id="txtprecio" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtprecioventa" >Precio de Venta</label>
					<input type="number" step = "any" class="form-control" name="txtprecioventa" id="txtprecioventa" value="" placeholder="">
				</div>
               
    <div class="form-group">
	<label for="txtcategoria" >Categoria</label>
	<select name="txtcat" id="txtcat"   class="form-control">  
                 <?php
                 require_once("../conex.php");
                 $sql = "SELECT *  FROM  categoria";
                 $rs = $cnx->query($sql) or die ("error $sql");
                 while($reg=$rs->fetchObject()){
                	$id=$reg->idcategoria;
                	$cat=$reg->categoria;
                 ?>
                 <option name="txtcat" id="txtcat" value="<?php echo $id;?>"><?php echo $cat?></option>
                 <?php
                 }
                 ?>
    </select>	
        </div>


			</div>

            <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" type="button" onclick="guardar()">Guardar</button>
      	    </div>	
   
   </div>
  </form>
 </div>	
</div>

</body>
<script src="../js/menu.js"></script>
<script>listado()</script>
</html>