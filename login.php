<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Malaria App</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
<?php include("templates/nav.php");?>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="mb-3">
                  <label for="user_gmail" class="form-label">Correo Electrónico</label>
                  <input type="text" class="form-control" name="user_gmail" id="user_gmail" aria-describedby="helpId"
                    placeholder="">
                </div>

                <div class="mb-3">
                  <label for="user_password" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="user_password" id="user_password"
                    aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                </div>
                <input name="" id="" class="btn btn-primary" type="submit" value="Entrar">
              </form>
            </div>
            <div class="card-footer text-muted">
            </div>
            <br>
            <?php
            if ($_SESSION) {
              echo '<a class="btn btn-primary b" href="logout.php" role="button">Cerrar Sesión</a> <br>';
            }
            ?>
            <a name="" id="" class="btn btn-success b" href="./app/sections/users/crear.php" role="button">Crear
              Usuario</a>
          </div>
        </div>

      </div>
    </div>

  </section>
  <div class="popup" id="miPopup">
    <h2>Inicio de Sesión Fallido</h2>
    <p>Las credenciales proporcionadas son incorrectas.</p>
    <button class="btn btn-primary" onclick="cerrarPopup()">Cerrar</button>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
  <script>
    // Función para mostrar el pop-up
    function mostrarPopup() {
      var popup = document.getElementById("miPopup");
      popup.style.display = "block";
    }

    // Función para cerrar el pop-up
    function cerrarPopup() {
      var popup = document.getElementById("miPopup");
      popup.style.display = "none";
    }
  </script>
</body>

</html>

<?php
if ($_POST) {
  $gmail = (isset($_POST['user_gmail'])) ? $_POST['user_gmail'] : "";
  $password = (isset($_POST['user_password'])) ? $_POST['user_password'] : "";

  $sentencia = $conexion->prepare("SELECT *, count(*) as n_users 
    FROM tb_users WHERE user_gmail=:gmail");
  $sentencia->bindParam(":gmail", $gmail);
  $sentencia->execute();
  $lista_usuarios = $sentencia->fetch(PDO::FETCH_LAZY);

  if ($lista_usuarios['n_users'] > 0) {
    $sentencia = $conexion->prepare("SELECT *, count(*) as n_users 
      FROM tb_users WHERE user_gmail=:gmail AND user_password=:password");

    $sentencia->bindParam(":gmail", $gmail);
    $sentencia->bindParam(":password", $password);
    //print_r($sentencia);
    $sentencia->execute();
    $lista_usuarios = $sentencia->fetch(PDO::FETCH_LAZY);
    if ($lista_usuarios['n_users'] > 0) {
      $_SESSION['user_id'] = $lista_usuarios['user_id'];
      $_SESSION['user_name'] = $lista_usuarios['user_name'];
      header("LOCATION:./app");
    } else {
      echo '<script>
            mostrarPopup();
        </script>';
    }
  }else{
    echo '<script>
            mostrarPopup();
        </script>';
  }
}
?>