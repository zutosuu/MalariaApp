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
    $sentencia = $conexion->prepare('INSERT INTO tb_symptom_record
    VALUES (NULL, :nombre, :user, :description, :intensity,:date);');

    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":user", $_SESSION['user_id']);
    $sentencia->bindParam(":date", $date);
    $sentencia->bindParam(":description", $description);
    $sentencia->bindParam(":intensity", $intensity);

    $sentencia->execute();

    header("Location:./../../index.php");
}

//Abrir archivos CSV
$archiv_provincias = '../../../csv/provincias.csv';
$archiv_cantones = '../../../csv/cantones.csv';
$archiv_distritos = '../../../csv/distritos.csv';

$gestor_provincias = fopen($archiv_provincias, 'r');
$gestor_cantones = fopen($archiv_cantones, 'r');
$gestor_distritos = fopen($archiv_distritos, 'r');

if ($gestor_provincias !== false and $gestor_cantones !== false and $gestor_distritos !== false) {
    // Aquí almacenaremos los datos del CSV
    $provincias = array();
    $cantones = array();
    $distritos = array();
    $agregar = false; //Evita que se agregue la primera línea

    while (($fila = fgetcsv($gestor_provincias)) !== false) {
        if ($agregar) {
            $provincias[] = $fila; // Agrega la fila actual al array de datos
        }
        $agregar = True;
    }

    $agregar = false; //Evita que se agregue la primera línea
    while (($fila = fgetcsv($gestor_cantones)) !== false) {
        if ($agregar) {
            $cantones[] = $fila; // Agrega la fila actual al array de datos
        }
        $agregar = True;
    }

    $agregar = false; //Evita que se agregue la primera línea
    while (($fila = fgetcsv($gestor_distritos)) !== false) {
        if ($agregar) {
            $distritos[] = $fila; // Agrega la fila actual al array de datos
        }
        $agregar = True;
    }

    fclose($gestor_provincias);
    fclose($gestor_cantones);
    fclose($gestor_distritos);
} else {
    echo "No se pudo abrir el archivo CSV.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Exposición</title>
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
                    Exposiciones a Zonas de Riesgo
                </a></h1>
            <div class="card">
                <div class="card-header">
                    Registrar exposición
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                            <div class="mb-3">
                                <label for="exposure_descrip" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="exposure_descrip" id="exposure_descrip"
                                    aria-describedby="helpId" placeholder="Descripción de la exposición">
                            </div>
                            
                            <div class="mb-3">
                            <label for="exposure_province" class="form-label">Provincia</label>
                            <select name="exposure_province" class="form-select">
                                <?php
                                foreach ($provincias as $provincia) {
                                    echo "<option value=\"$provincia[1]\">$provincia[1]</option>";
                                }
                                ?>
                            </select></div>

                            <div class="mb-3">
                            <label for="exposure_canton" class="form-label">Cantones</label>
                            <select name="exposure_canton" class="form-select">
                                <?php
                                foreach ($cantones as $canton) {
                                    echo "<option value=\"$canton[2]\">$canton[2]</option>";
                                }
                                ?>
                            </select></div>

                            <div class="mb-3">
                            <label for="exposure_district" class="form-label">Distritos</label>
                            <select name="exposure_district" class="form-select">
                                <?php
                                foreach ($distritos as $distrito) {
                                    echo "<option value=\"$distrito[2]\">$distrito[2]</option>";
                                }
                                ?>
                            </select></div>

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