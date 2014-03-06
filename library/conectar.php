<?php
  $Usuario="root";  /*root*/
  $Password="";
  $Servidor="localhost"; /*localhost*/
  $BaseDeDatos="bd_colegio";
  $conexion=mysql_connect($Servidor,$Usuario,$Password) or die("Error: El servidor no puede conectar con la base de datos");
  $descriptor=mysql_select_db($BaseDeDatos,$conexion);
?>
