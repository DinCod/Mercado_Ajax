<?php
session_start();
error_reporting(0);
$sesion= $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mi Tienda | Contacto</title>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="css/contacto.css">
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
                <h1 class="logo" style="padding: 0 0 0 16px;">Mi Tienda</h1>
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
                <li class="menu__item"><a href="nosotros.php" class="menu__link">Nosotros</a></li>
                <li class="menu__item"><a href="contacto.php" class="menu__link menu__link--select">Contacto</a></li>
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
        <img src="img/contacto.jpg" alt="" class="banner__img">
        <div class="banner__content">Déjanos un Mensaje</div>
    </section>

    <main class="main">
    <section class="group contact">
          <h2 class="group__title">Contáctanos</h2>
      <div class="container container--flex">
          <div class="contact-information column column--50" >
            <h3 class="column__title">Informacion de Contacto</h3>
            <p class="column__txt">Para nosotros como representantes de tus necesidades y benficios como cliente, es importante que nos mandes tus sugerencias, quejas, promociones y productos nuevos para poder expandir nuestro trabajo y lograr el bienestar de nuestros clientes, asi que ¡¡que esperas para mandarnos tus opiniones y beneficios!!</p>
            <p class="column__txt"><span class="icon-phone"></span> Telefono: 918 504 709</p>
            <p class="column__txt"><span class="icon-location"></span>Asoc. Villa Santa Rosa de Huachipa, Perú</p>
            <p class="column__txt"><span class="icon-mail"></span> Correo: claudiapaquiyaurisoto@gmail.com</p>
            <div class="social-icon">
            <a href="" class="social-icon__link"><span class="icon-facebook"></span></a>
            <a href="" class="social-icon__link"><span class="icon-twitter"></span></a>
            <a href="" class="social-icon__link"><span class="icon-mail"></span></a>
            </div>
          </div>
          <form action="enviarCorreo.php" method="post" class="formulario column column--50">
             <label for="" class="formulario__label">Nombre:</label>
             <input type="text" class="formulario__input-txt" name="nombre">
             <label for="" class="formulario__label">Correo:</label>
             <input type="text" class="formulario__input-txt" name="correo">
             <label for="" class="formulario__label">Teléfono:</label>
             <input type="text" class="formulario__input-txt" name="telefono">
             <label for="" class="formulario__label">Mensaje:</label>
             <textarea name="mensaje" id="" cols="30" rows="10" class="formulario__textarea"></textarea>
             <input type="submit" class=" btn formulario__btn" value="Enviar">
          </from>
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
                   <p class="column_txt">Asoc. Villa Santa Rosa de Huachipa, Perú</p>
                   <p class="column_txt">Teléfono: 918 504 709</p>
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