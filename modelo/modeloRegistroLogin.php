<?php 
class ModeloRegistro{
private $nombre;
private $correo;
private $contraseña;
/*----------------------------------------------*/
public function setNombre($nombre){
    $this->nombre=$nombre;
}
/*----------------------------------------------*/
public function setCorreo($correo){
    $this->correo=$correo;
}
/*----------------------------------------------*/
public function setContraseña($contraseña){
    $this->contraseña=$contraseña;
}
/*----------------------------------------------*/
public function registrarUsuario(){
    require_once("../conex.php");
    $existe="SELECT * FROM usuario WHERE username ='" . $this->correo . "'";
    $rs=$cnx->query($existe) or die("error $existe"); 
    if($rs->rowCount() > 0){
      echo "<script>
      alert('El usuario o  email ya existe');
      window.location= '../vista/form-registro.php'
      </script>";
    }else{
      require_once("../conex.php");
      $sql="INSERT INTO usuario (nombre,username,contraseña) VALUES ('".$this->nombre."','".$this->correo."','".$this->contraseña."')"; 
      $cnx->query($sql) or die("error $sql");
      header("Location: ../vista/form-login.php");    
    }
}
/*----------------------------------------------*/
public function validarUsuario(){
     require_once("../conex.php");  
     $sql="SELECT * FROM usuario WHERE username ='" .$this->correo. "'  and contraseña ='" . $this->contraseña . "'";    
     $rs = $cnx->query($sql);
     if($rs->rowCount() > 0){
        session_start();
        $_SESSION['usuario'] = $this->correo;
        header("Location: ../index.php");  
     }else{
        echo "<script>
        alert('Verifique su usuario o contraseña');
        window.location= '../vista/form-login.php'
        </script>";
      }
}
/*----------------------------------------------*/
}
?>