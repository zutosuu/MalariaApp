<?php
session_start(); // Iniciar la sesión
include("../../bd.php"); // Incluir conexión a la base de datos

//Obtener usuario logeado
$user_id = $_SESSION['user_id'] ? $_SESSION['user_id'] : 0;
//Borrar registros
$sentencia=$conexion->prepare("DELETE FROM tb_chat_messages WHERE message_user=:id");
$sentencia->bindParam(":id",$user_id);
$sentencia->execute();
header("LOCATION: ../../index.php")
?>