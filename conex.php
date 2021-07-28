<?php  
//PDO PHP Data Object
$motor="mysql";
$servidor="localhost";
$base="ing_web_tienda";
$usuario="root";
$password="";
$cadena="$motor:host=$servidor;dbname=$base";
$cnx= new PDO($cadena,$usuario,$password);
?>