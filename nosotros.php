<?php
session_start();
error_reporting(0);
$sesion= $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mi Mercado | Nosotros</title>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="css/nosotros.css">
<link href="https://file.myfontastic.com/R24SJqdjLg54K9R846pCMb/icons.css" rel="stylesheet">
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
                <h1 class="logo" style="padding: 0 0 0 16px;" >Mi Mercado</h1>
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
                <li class="menu__item"><a href="index.php" class="menu__link">Inicio</a></li>
                <li class="menu__item"><a href="nosotros.php" class="menu__link menu__link--select">Nosotros</a></li>
                <li class="menu__item"><a href="contacto.php" class="menu__link">Contacto</a></li>
             </ul>
            <div class="social-icon">
                <?php
                if(!isset($sesion)){
                ?>
                <a href="Form-Login/login.php" class="social-icon__link"><span class="icon-user"></span></a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <section class="banner">
        <img src="img/nosotros.jpg" alt="" class="banner__img">
        <div class="banner__content">Mi Tienda, Todo Acerca de Nosotros</div>
    </section>
    <main class="main">
        <section class="group group--color">
            <div class="container">
                <h2 class="main__title">Sobre Nosotros</h2>
                <p class="main__txt">Nuestro equipo de Trabajo "Abarrotes Cludia", somos una familia emprendedora que viene trabajando desde muchos años atras en el rubro de las ventas de productos para tu consumo en el hogar</p>
            </div>
        </section>
        <!--About us :D-->
    <section class="group our-team">
         <h2 class="group__title">Nuestro Equipo</h2>

         <div class="container container--flex">
             <div class="column column--33">
                 <h3 class="our-team__title">Claudia Soto</h3>
                 <img src="img/user2.jpg" alt="" class="our-team__img">
                 <p class="our-team__txt">Dueña de la tienda-puesto "Abarrotes Claudia"</p>
             </div>
             <div class="column column--33">
                 <h3 class="our-team__title">Fernando Rodriguez</h3>
                 <img src="img/user1.jpg" alt="" class="our-team__img">
                 <p class="our-team__txt">Esposo-conviviente y Administrador de la compra de productos en "Abarrotes Claudia"</p>
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
                   <p class="column_txt">Teléfono: 925-914-220</p>
                   <p class="column_txt">claudiapaquiyaurisoto@gmail.com</p>
                </div> 
                <div class="column column--33">
                   <h2 class="column__title">Síguenos en nuestras redes</h2>
                   <p class="column_txt"><a href="" class="icon-facebook">Facebook</a></p>
                </div>
                <p class="copy">© 2021 Mi Tienda | Todos los derechos reservados</p>
            </div>
        </footer>
    <script src="js/menu.js"></script>
</body>
</html>