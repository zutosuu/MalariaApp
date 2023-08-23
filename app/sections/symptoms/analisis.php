<?php
include("../../templates/header.php");
include("../../bd.php");
$sentencia = $conexion->prepare("SELECT *, count(*) as n_symptoms 
    FROM tb_symptom_record WHERE user_id=:sesion_id");
$sentencia->bindParam(":sesion_id", $_SESSION['user_id']);
$sentencia->execute();
$lista_sintomas = $sentencia->fetch(PDO::FETCH_LAZY);
?>
<main class="container">
  <section>
  </section>
</main>

<?
include("../../templates/footer.php");
?>