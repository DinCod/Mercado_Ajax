<?php
session_start();
error_reporting(0);
$sesion= $_SESSION['usuario'];
require_once("conex.php");  
                 $sql="SELECT a.idadministrador, a.idusuario,a.tipo 
                 FROM usuario u inner join administrador a on u.idusuario=a.idusuario 
                 WHERE username = '$sesion'";    
                 $rs = $cnx->query($sql);
                 if($rs->rowCount() > 0){
                    $_SESSION['tipo']="admin";
                    $tipe=$_SESSION['tipo'];
                 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mi Tienda | Inicio</title>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    
<link rel="stylesheet" href="css/estilo.css">
<link href="https://file.myfontastic.com/R24SJqdjLg54K9R846pCMb/icons.css" rel="stylesheet">
</head>
<body>

<?php
if($sesion != null){
?>
<nav class="main-nav" style="height: 100%; background:black;" >
   <div class="container container--flex">
     <h4 class="user" style="" >Bienvenido : <?php  echo $sesion ?></h4>
     <a  class="icon-out" href="cerrarsesion.php"  style="color: white; text-decoration: none;" >Cerrar Sesión</a>
   </div>  
</nav>
<?php }?>

    <header class="main-header">
        <div class="container container--flex"> 
            <div class="logo-container column column--50">
                <h1 class="logo" style="padding: 0 0 0 16px;" >Mi Tienda</h1>
            </div>
            <div class="main-header__contactInfo column column--50 ">
                <p class="main-header__contactInfo__phone">
                <span class="icon-phone">918 504 709</span>
                </p>
                <p class="main-header__contactInfo__address">
                    <span class="icon-location">Asoc. Villa Santa Rosa de Huachipa, Perú</span>
                </p>
            </div>
        </div>
    </header>
    
    <nav class="main-nav">
        <div class="container container--flex">
            <span class="icon-menu" id="btnmenu"></span>
             <ul class="menu" id="menu">
             <li class="menu__item"><a href="vista/form-venta.php" class="menu__link">Productos en Venta</a></li>
               <?php
                if($sesion != null && $tipe=="admin"){ ?>
                <li class="menu__item"><a href="vista/form-producto.php" class="menu__link">Almacen De Productos</a></li> 
               <?php }?>
                <li class="menu__item"><a href="nosotros.php" class="menu__link">Nosotros</a></li>
                <li class="menu__item"><a href="contacto.php" class="menu__link">Contacto</a></li>
             </ul>
            <div class="social-icon">
                <?php
                if(!isset($sesion)){
                ?>
                <a href="vista/form-login.php" class="social-icon__link"><span class="icon-user"></span></a>
                <?php } ?>
            </div>
        </div>
    </nav>
    
    <section class="banner">
        <img src="img/presentacion.jpg" alt="" class="banner__img">
        <div class="banner__content">Abarrotes Claudia 'BBB'</div>
    </section>
    
    <main class="main">
        <section class="group group--color">
            <div class="container">
                <h2 class="main__title">Bienvenido a Mi Tienda 'BBB'</h2>
                <p class="main__txt">Asoc. Villa Santa Rosa de Huachipa, Perú
918 504 709
Tienda "Abarrotes Claudia" encontraras los mejores productos para abastecer tu casa con alimentos destacados y de gran calidad con los mejores precios para tu bolsillo en tiempos de pandemia</p>
            </div>
        </section>
        <section class="group main__about__description">
            <div class="container container--flex">
                <div class="column column--50">
                    <img src="img/Paq.jpg" alt="">
                </div>
                <div class="column column--50">
                    <h3 class="column__title">¿Que Somos?</h3>
                    <p class="column__txt">Somos una tineda de abarrotes ubicado en "Mi Mercado" con exactamente 6 años de vigencia donde abastece a la totalidad de la comunidad y es la principal recreación para los visitantes y pobladores</p>
                </div>
            </div>
        </section>
    </main>
    <footer class="main-footer">
            <div class="container container--flex">
                <div class="column column--33">
                   <h2 class="column__title">¿Por qué visitarnos?</h2>
                   <p class="column_txt">Tenemos años de experiencia en la venta de abarrotes para tu hogar con lo que podras ver los beneficios y productos que te interesen y ademas podras pagar en dos diferentes formas al contado y en cuotas factibles</p>
                </div>
                <div class="column column--33">
                   <h2 class="column__title">Contáctanos</h2>
                   <p class="column_txt">Ovalo central-Santa Rosa</p>
                   <p class="column_txt">Teléfono: 918 504 709</p>
                   <p class="column_txt">claudiapaquiyaurisoto@gmail.com</p>
                </div> 
                <div class="column column--33">
                   <h2 class="column__title">Síguenos en nuestras redes</h2>
                   <p class="column_txt"><a href="" class="icon-facebook">Facebook</a></p>
                </div>
                
                <p class="copy">© 2021 Mi mercado | Todos los derechos reservados</p>
                
                
            </div>
        </footer>
    <script src="js/menu.js"></script>
</body>
</html>