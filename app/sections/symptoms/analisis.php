<?php
session_start();
include("../../bd.php");
    $sentencia=$conexion->prepare("SELECT *, count(*) as n_symptoms 
    FROM tb_symptom_record WHERE user_id=:sesion_id");
    $sentencia->bindParam(":sesion_id",$_SESSION['user_id']);
    $sentencia->execute();
    $lista_sintomas=$sentencia->fetch(PDO::FETCH_LAZY);

include("../../templates/header.php");
?>
<main class="container" style="background-image: url(./assets/img/header-bg.jpg);">
<section >
<h2><span class="navbar-brand-login">
<?php
        if($lista_sintomas['n_symptoms'] >= 3){
          echo "¡Deberías consultar a un médico!";
        }else{
          echo "Tus síntomas no parecen estar relacionados con la malaria.";
        }
        ?>
</span></h2>
<h4><span class="navbar-brand">
<?php
        if($lista_sintomas['n_symptoms'] >= 3){
          echo "Presentas síntomas intrinsecamente asociados con la malaria";
        }else{
          echo "Si estos persisten, consulta a un médico";
        }
        ?>
</span></h4>
<h4><span class="navbar-brand">
<?php
        if($lista_sintomas['n_symptoms'] >= 3){
          echo "La atención tardía podría traer graves consecuencias";
        }?>
</span></h4>
</main>
</section>

<?p
include("../../templates/footer.php");
?>