<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
    //Editar registro
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    
    $sentencia=$conexion->prepare("SELECT * FROM tb_symptom_record WHERE record_id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    
    $name=$registro['symptom_name'];
    $user=$registro['user_id'];
    $date=$registro['symptom_date'];
    $description=$registro['symptom_description'];
    $intensity=$registro['symptom_intensity'];
    }

if($_POST){
    // Recepcionamos los valores del formulario
    $name=(isset($_POST['symptom_name']))?$_POST['symptom_name']:"";
    $user=(isset($_POST['user_id']))?$_POST['user_id']:"";
    $date=(isset($_POST['symptom_date']))?$_POST['symptom_date']:"";
    $description=(isset($_POST['symptom_description']))?$_POST['symptom_description']:"";
    $intensity=(isset($_POST['symptom_intensity']))?$_POST['symptom_intensity']:"";

    $sentencia=$conexion->prepare("UPDATE tb_symptom_record
    SET record_id=:id, symptom_name=:name, symptom_date=:date, symptom_description=:description, symptom_intensity=:intensity
    WHERE record_id=:id;");

$sentencia->bindParam(":id",$txtID);
$sentencia->bindParam(":name",$name);
$sentencia->bindParam(":date",$date);
$sentencia->bindParam(":description",$description);
$sentencia->bindParam(":intensity",$intensity);

    $sentencia->execute();

    header("Location:./../../index.php");
}
include("../../templates/header.php");
?>
<h1><a class="navbar-brand" href="./login.php">
    Síntomas
</a></h1>
<div class="card">
    <div class="card-header">
        Editar síntoma
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
        <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
        <div class="mb-3">
          <label for="symptom_name" class="form-label">Nombre</label>
          <input type="text" value="<?php echo $name;?>"
            class="form-control" name="symptom_name" id="symptom_name" aria-describedby="helpId" placeholder="Nombre">
        </div>

        <div class="mb-3">
          <label for="symptom_description" class="form-label">Descripción</label>
          <input type="text" value="<?php echo $description;?>"
            class="form-control" name="symptom_description" id="symptom_description" aria-describedby="helpId" placeholder="Descripción">
        </div>

        <div class="mb-3">
          <label for="symptom_intensity" class="form-label">Intensidad</label>
          <input type="text" value="<?php echo $intensity;?>"
            class="form-control" name="symptom_intensity" id="symptom_intensity" aria-describedby="helpId" placeholder="Intensidad">
        </div>

        <div class="mb-3">
          <label for="symptom_date" class="form-label">Fecha</label>
          <input type="date" value="<?php echo $date;?>"
            class="form-control" name="symptom_date" id="symptom_date" aria-describedby="helpId" placeholder="Fecha">
        </div>

        <button type="submit" class="btn btn-success">Modificar</button>
        <a name="" id="" class="btn btn-primary" href="./../../index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php
include("../../templates/footer.php");
?>