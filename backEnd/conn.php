<?php
class Conexion{	  
  public static function Conectar() {          
      define('servidor', 'localhost');
      define('nombre_bd', 'audio_lab');
      define('usuario', 'root');
      define('password', '');					        
      $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
      try{
          $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          return $conexion;
      }catch (Exception $e){
          die("El error de Conexión es: ". $e->getMessage());
      }
  }
}
?>