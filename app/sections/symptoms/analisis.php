<?php
session_start();
include("../../bd.php");

// Calcular la fecha de hace 7 días desde hoy
$fechaHoy = new DateTime();
$fechaHoy->setTime(0, 0, 0); // Establecer la hora a las 00:00:00
$fechaHace7Dias = clone $fechaHoy;
$fechaHace7Dias->modify('-7 days');
$fechaHace7Dias = $fechaHace7Dias->format('Y-m-d');

// Consultar registros de síntomas con fecha dentro de los últimos 7 días
$sentencia = $conexion->prepare("SELECT * FROM tb_symptom_record WHERE user_id = :user_id AND symptom_date >= :fecha");
$sentencia->bindParam(":user_id", $_SESSION['user_id']);
$sentencia->bindParam(":fecha", $fechaHace7Dias);
$sentencia->execute();
$lista_síntomas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Crear usuario</title>
  <?php include("./../../templates/header.php"); ?>
</head>

<body>
  <header>
    <!-- Navigation-->
    <?php include("./../../templates/nav.php"); ?>
  </header>
  <main class="container">
    <section>
      <h1>Informe de salud del paciente <?php echo $user_name;?></h1>
      <br>
      <div class="card">
        <div class="card-header" style="background-color: green; color:white;">
          <b>Síntomas de los últimos 7 días</b>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Intensidad</th>
                  <th scope="col">Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($lista_síntomas as $registro) { ?>
                  <tr>
                    <td>
                      <?= $registro['record_id'] ?>
                    </td>
                    <td>
                      <?= $registro['symptom_name'] ?>
                    </td>
                    <td>
                      <?= $registro['symptom_description'] ?>
                    </td>
                    <td>
                      <?= $registro['symptom_intensity'] ?>
                    </td>
                    <td>
                      <?= $registro['symptom_date'] ?>
                    </td>
                    <td>
                    </td>
                  </tr>
                <?php } 
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>
