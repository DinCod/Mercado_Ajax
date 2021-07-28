<?php
require_once("conex.php");
session_start();
$usuario=$_SESSION['usuario'];
if($usuario==null){
  header("Location: vista/form-login.php");
}
$sql="SELECT SUM(total_pagar) AS totalgasto FROM historial_compra WHERE usuario='$usuario'";
$rs= $cnx->query($sql);  
$row=$rs->fetchObject();                
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mi tienda | Carrito</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <script src="js/appVenta.js"></script>
  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="vista/form-venta.php">Mi tienda | Ver productos</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" id="main">
            <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width:261px">Nº</th>
                      <th>Nombre Producto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>
                     <div class=""><h4>Buscar</h4></div>
	                   <input style="width: 450px;" class="form-control" type="text" name="txtbuscar" id="txtbuscar" value="" placeholder="Fecha / Nombre Producto" onkeyup="listarHistorial()" >
                     <br>
                    <div class="row-4">
                       <div class="pull-left">
                        <a href="vista/form-venta.php" class="btn btn-info">Seguir Comprando</a>
                       </div>
                    </div>
                  <tbody id="historial">
                  </tbody>
                  <tfoot">
                  <br>
                  <?php if($row->totalgasto == null) { ?>
                    <th style="font-size:1.4em;">TOTAL GASTADO:S/0</th>
                  <?php }else{ ?>
                    <th style="font-size:1.4em;">TOTAL GASTADO: <?php echo 'S/'.$row->totalgasto ?></th>
                  <?php } ?>
                  </tfoot>
            </table>
            
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>listarHistorial()</script>
  </body>
</html>