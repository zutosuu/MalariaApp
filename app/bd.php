<?php
$servidor="localhost";
$db="db_app_malaria";
$usuario="root";
$contrasena="";

try{
    $conexion=new PDO("mysql:host=$servidor;dbname=$db",$usuario,$contrasena);
    //echo "Conexión realizada!";
}catch(Exception $error){
    echo $error->getMessage();
}
?>