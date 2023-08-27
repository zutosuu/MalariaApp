<?php
session_start();
include("../../bd.php");
if ($_POST) {
    // Recepcionamos los valores del formulario 					
    $nombre = (isset($_POST['symptom_name'])) ? $_POST['symptom_name'] : "";
    $user = (isset($_POST['user_id'])) ? $_POST['user_id'] : "";
    $date = (isset($_POST['symptom_date'])) ? $_POST['symptom_date'] : "";
    $description = (isset($_POST['symptom_description'])) ? $_POST['symptom_description'] : "";
    $intensity = (isset($_POST['symptom_intensity'])) ? $_POST['symptom_intensity'] : "";
    $sentencia = $conexion->prepare("INSERT INTO tb_symptom_record
    VALUES (NULL, :nombre, :user, :description, :intensity,:date);");

    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":user", $_SESSION['user_id']);
    $sentencia->bindParam(":date", $date);
    $sentencia->bindParam(":description", $description);
    $sentencia->bindParam(":intensity", $intensity);

    $sentencia->execute();

    header("Location:./../../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Síntoma</title>
    <?php include("./../../templates/header.php"); ?>
</head>

<body id="page-top">
    <header>
        <!-- Navigation-->
        <?php include("./../../templates/nav.php"); ?>
    </header>
    <main class="container">
        <section>
            <h1><a class="navbar-brand" href="./login.php">
                    Síntomas
                </a></h1>
            <div class="card">
                <div class="card-header">
                    Registrar síntomas
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="mb-3">
                            <label for="symptom_name" class="form-label">Nombre</label>
                            <select name="symptom_name" class="form-select">
                                <?php
                                $sintomas = ["Fiebre", "Escalofríos", "Sudoración", "Dolor de cabeza", "Fatiga", "Dolor muscular y articular", "Náuseas y vómitos", "Dolor abdominal", "Anemia", "Confusión mental", " Convulsiones", "Coma"];
                                foreach ($sintomas as $sintoma) {
                                    echo "<option value=\"$sintoma\">$sintoma</option>";
                                }
                                ?>
                            </select></div>
                            <div class="mb-3">
                                <label for="symptom_description" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="symptom_description"
                                    id="symptom_description" aria-describedby="helpId" placeholder="Descripción">
                            </div>

                            <div class="mb-3">
                                <label for="symptom_intensity" class="form-label">Intensidad</label>
                                <select name="symptom_intensity" class="form-select">
                                    <?php
                                    $intensidades = ["Muy alta", "Alta", "Intermedia", "Baja", "Muy baja", "Ninguna"];
                                    foreach ($intensidades as $intensidad) {
                                        echo "<option value=\"$intensidad\" $selected>$intensidad</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="symptom_date" class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="symptom_date" id="symptom_date"
                                    aria-describedby="helpId" placeholder="Fecha">
                            </div>

                            <button type="submit" class="btn btn-success">Agregar</button>
                            <a name="" id="" class="btn btn-primary" href="./../../index.php" role="button">Cancelar</a>
                    </form>
                </div>
            </div>
            </div>
        </section>
    </main>
    </section>
    </main>
    <footer>
        <p>2023, Costa Rica, Steven Morales Fallas </p>
        <p>+506 61304830 / fallasmoraless@gmail.com</p>
    </footer>
</body>

</html>