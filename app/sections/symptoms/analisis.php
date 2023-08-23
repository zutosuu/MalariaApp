<?php
session_start();
include("../../bd.php");
$sentencia = $conexion->prepare("SELECT * FROM tb_symptom_record WHERE user_id=:sesion_id");
$sentencia->bindParam(":sesion_id", $_SESSION['user_id']);
$sentencia->execute();
$lista_sintomas = $sentencia->fetch(PDO::FETCH_LAZY);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Crear usuario</title>
  <?php include("./../../templates/header.php"); ?>
</head>

<body id="page-top">
  <header>
    <!-- Navigation-->
    <?php include("./../../templates/nav.php"); ?>
  </header>
  <main class="container">
    <section>
      <h1 style="color:red;">Informe sobre tu salud</h1>
      <?php
      echo count($lista_sintomas);
      if ($lista_sintomas['n_symptoms'] >= 3) {
        echo "¡Deberías consultar a un médico!";
      } else {
        echo "Tus síntomas no parecen estar relacionados con la malaria.";
      }
      ?>
    </section>
  </main>
  <footer>
    <p>2023, Costa Rica, Steven Morales Fallas </p>
    <p>+506 61304830 / fallasmoraless@gmail.com</p>
  </footer>
</body>

</html>