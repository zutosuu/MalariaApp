<?php session_start(); ?>

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
    <link href="./../../../css/bootstrap.css" rel="stylesheet" />
    <link href="./../../../css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg fixed-top" id="loginNav">
            <div class="container">
                <a class="navbar-brand-login" href="./../../../index.php">Malaria App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <b>
                            <li class="nav-item"><a class="nav-link" href="/malariaapp#app">App</a></li>
                        </b>
                        <b>
                            <li class="nav-item"><a class="nav-link" href="/malariaapp#portfolio">Malaria</a></li>
                        </b>
                        </b>
                    <b>
                        <li class="nav-item"><a class="nav-link" href="./../../../mapa.php">Mapa</a></li>
                    </b>
                        <b>
                            <li class="nav-item"><a class="nav-link" href="/malariaapp#team">Equipo</a></li>
                        </b>
                        <b>
                            <li class="nav-item"><a class="nav-link nav-login" href="./../../../login.php">
                                    <?= $_SESSION ? $_SESSION['user_name'] : 'Iniciar Sesión' ?>
                                </a></li>
                        </b>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <section>