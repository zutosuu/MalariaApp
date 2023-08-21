<?php
include("../../bd.php");

if ($_POST) {
  // Recepcionamos los valores del formulario 
  $gmail = (isset($_POST['user_gmail'])) ? $_POST['user_gmail'] : "";
  $password = (isset($_POST['user_password'])) ? $_POST['user_password'] : "";
  $nombre = (isset($_POST['user_name'])) ? $_POST['user_name'] : "";
  $age = (isset($_POST['user_age'])) ? $_POST['user_age'] : "";
  $weight = (isset($_POST['user_weight'])) ? $_POST['user_weight'] : "";
  $height = (isset($_POST['user_height'])) ? $_POST['user_height'] : "";
  $sentencia = $conexion->prepare("INSERT INTO tb_users
    VALUES (NULL, :gmail, :password, :nombre, :age, :weight, :height);");

  $sentencia->bindParam(":gmail", $gmail);
  $sentencia->bindParam(":password", $password);
  $sentencia->bindParam(":nombre", $nombre);
  $sentencia->bindParam(":age", $age);
  $sentencia->bindParam(":weight", $weight);
  $sentencia->bindParam(":height", $height);

  $sentencia->execute();
  print_r($sentencia);

  header("Location:./../../../login.php");
}

include("../../templates/header.php");
?>

<h1><a class="navbar-brand" href="./login.php">
    Inicio de Sesión
  </a></h1>
<div class="card">
  <div class="card-header">
    Crear Usuario
  </div>
  <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
      <div class="mb-3">
        <label for="user_gmail" class="form-label">Gmail</label>
        <input type="text" class="form-control" name="user_gmail" id="user_gmail" aria-describedby="helpId"
          placeholder="Correo electrónico">
      </div>
      <div class="mb-3">
        <label for="user_password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="user_password" id="user_password" aria-describedby="helpId"
          placeholder="Contraseña segura">
      </div>
      <div class="mb-3">
        <label for="user_name" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="user_name" id="user_name" aria-describedby="helpId"
          placeholder="Nombre">
      </div>

      <div class="mb-3">
        <label for="user_age" class="form-label">Edad</label>
        <input type="numeric" class="form-control" name="user_age" id="user_age" aria-describedby="helpId"
          placeholder="Edad">
      </div>

      <div class="mb-3">
        <label for="user_weight" class="form-label">Peso (Kg)</label>
        <input type="numeric" class="form-control" name="user_weight" id="user_weight" aria-describedby="helpId"
          placeholder="Peso en kilogramos">
      </div>

      <div class="mb-3">
        <label for="user_height" class="form-label">Altura (Cm)</label>
        <input type="numeric" class="form-control" name="user_height" id="user_height" aria-describedby="helpId"
          placeholder="Altura en centímetros">
      </div>

      <button type="submit" class="btn btn-success">Crear</button>
      <a name="" id="" class="btn btn-primary" href="./../../index.php" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">

  </div>
</div>

<?php
include("../../templates/footer.php");
?>