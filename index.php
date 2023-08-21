<?php
session_start();
include("app/bd.php");
?>

<!DOCTYPE html>
<html lang="en">
<header>
    <title>Malaria App</title>
    <?php include("templates/header.php"); ?>
</header>

<body id="page-top">
    <!-- NAVIGATION BAR-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="./login.php">Malaria App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <!--Elements-->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/malariaapp#app">App</a></li>
                    <li class="nav-item"><a class="nav-link" href="/malariaapp#portfolio">Malaria</a></li>
                    <li class="nav-item"><a class="nav-link" href="./mapa.php">Mapa</a></li>
                    <li class="nav-item"><a class="nav-link" href="/malariaapp#team">Equipo</a></li>
                    <li class="nav-item"><a class="nav-link nav-login" href="./app">
                            <?php //Menu Login
                            if (isset($_SESSION['user_name'])) {
                                echo $_SESSION['user_name'];
                            } else {
                                echo 'Iniciar Sesión';
                            }
                            ?>
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- COVERPAGE-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Enfermedad parasitaria</div>
            <div class="masthead-heading text-uppercase">Malaria o Paludismo</div>
            <a class="btn btn-primary btn-xl text-uppercase header-btn" href="./login.php">Cuidate y hace un cambio</a>
        </div>
    </header>

    <!-- MALARIA APP INFORMATION-->
    <section class="page-section" id="app">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Malaria App</h2>
                <h3 class="section-subheading text-muted">Desarrollada con el fin de mitigar los efectos de la
                    enfermedad a nivel país y en el mundo.</h3>
            </div>
            <div class="row text-center" id="appInfo">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-solid fa-database fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Recolección de Información</h4>
                    <p class="text-muted">Información valiosa para mejorar el tratamiento de la enfermedad.</p>
                </div>

                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-solid fa-circle-exclamation fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Detección Temprana</h4>
                    <p class="text-muted">Mediante síntomas se puede detectar la enfermedad de manera temprana.</p>
                </div>

                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-solid fa-calendar-days fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Monitorio de la Salud</h4>
                    <p class="text-muted">Se lleva un registro del estado de salud a través de los días.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="text-center"><a class="btn btn-primary btn-xl text-uppercase header-btn" href="./app">Utilizar
                App</a></div>
    </section>

    <!--MALARIA INFORMATION-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Malaria</h2>
                <h3 class="section-subheading text-muted">La mejor forma de prevenir y ayudar es informándote.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Salud ambiental</div>
                            <div class="portfolio-caption-subheading text-muted">Factor clave</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Impacto</div>
                            <div class="portfolio-caption-subheading text-muted">Costa Rica y el mundo</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Contagio</div>
                            <div class="portfolio-caption-subheading text-muted">Agentes infecciosos</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/4.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Síntomas</div>
                            <div class="portfolio-caption-subheading text-muted">Tempranos y tardíos</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Portfolio item 5-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/5.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Secuelas</div>
                            <div class="portfolio-caption-subheading text-muted">Maltratamiento de la enfermedad</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Portfolio item 6-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/6.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Prevención</div>
                            <div class="portfolio-caption-subheading text-muted">Medidas a tomar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--PORTAFOLIO MODALS POPUPS-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Salud Ambiental</h2>
                                <p class="item-intro text-muted">Factor clave</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                <p>La salud pública ambiental, que se refiere a la intersección entre el medioambiente y
                                    la salud pública, aborda los factores ambientales que influyen en la salud humana, y
                                    que incluyen factores físicos, químicos y biológicos, y todos los comportamientos
                                    relacionados con estos.</p>
                                <ul class="list-inline">
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar Ventana
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Impacto</h2>
                                <p class="item-intro text-muted">Costa Rica y el mundo</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                <p>Casi la mitad de la población mundial está expuesta a enfermar de paludismo. Se
                                    calcula que 247 millones de personas de 85 países contrajeron el paludismo en 2021.
                                    Ese mismo año, la enfermedad se cobró aproximadamente 619 000 vidas.</p>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar Ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Contagio</h2>
                                <p class="item-intro text-muted">Agentes infecciosos</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                <p>El paludismo no es contagioso y no puede transmitirse de una persona a otra; la
                                    enfermedad se transmite por la picadura de mosquitos Anopheles hembra. Cinco
                                    especies de parásitos pueden provocar paludismo en el ser humano, dos de las cuales,
                                    Plasmodium falciparum y Plasmodium vivax, constituyen la mayor amenaza. Existen más
                                    de 400 especies diferentes de mosquitos Anopheles y alrededor de 40 de ellas,
                                    denominadas especies vectoras, pueden transmitir la enfermedad.</p>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar Ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Síntomas</h2>
                                <p class="item-intro text-muted">Tempranos y tardíos</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                <p>Los primeros síntomas del paludismo suelen darse entre 10 y 15 días después de la
                                    picadura de un mosquito infectado. Por lo general se tiene fiebre, dolor de cabeza y
                                    escalofríos, aunque estos síntomas pueden ser leves y es difícil atribuirlos al
                                    paludismo. En las zonas con paludismo endémico, las personas que han desarrollado
                                    una inmunidad parcial pueden infectarse, pero no experimentar síntomas (infecciones
                                    asintomáticas).</p>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar Ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 5 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Secuelas</h2>
                                <p class="item-intro text-muted">Maltratamiento de la enfermedad</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                <p>Los problemas de salud que se pueden presentar como consecuencia de la malaria
                                    incluyen:
                                    Infección cerebral (cerebritis),
                                    Destrucción de células sanguíneas (anemia hemolítica),
                                    Insuficiencia hepática,
                                    Meningitis,
                                    Insuficiencia respiratoria a causa de líquido en los pulmones (edema pulmonar),
                                    Ruptura del bazo que lleva a sangrado (hemorragia) masivo interno.
                                </p>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar Ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 6 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                        alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Prevención</h2>
                                <p class="item-intro text-muted">Medidas a tomar</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                <p>El paludismo es una enfermedad prevenible.
                                    Intervenciones de control de vectores. El control de los vectores es el enfoque
                                    principal para prevenir el paludismo y reducir la transmisión. Dos formas de control
                                    anti vectorial son eficaces para las personas que viven en países con paludismo
                                    endémico: los mosquiteros tratados con insecticida y la fumigación de interiores con
                                    insecticidas de acción residual. Más información sobre el control de vectores.
                                    Tratamientos quimiopreventivos y quimioprofilaxis. Aunque están diseñados para
                                    tratar a pacientes que ya han sido infectados, algunos medicamentos antipalúdicos
                                    también se pueden usar para prevenir la enfermedad. Más información sobre los
                                    tratamientos quimiopreventivos.
                                </p>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar Ventana
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TEAM-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Equipo de trabajo</h2>
                <h3 class="section-subheading text-muted">Trabajando por hacer de este mundo, uno mejor.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                        <h4>Camila Montoya</h4>
                        <p class="text-muted">Diseño y Organizacion</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                        <h4>Steven Morales</h4>
                        <p class="text-muted">Programación y Liderazgo</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                        <h4>Fabián Hernández</h4>
                        <p class="text-muted">Investigación y Asistencia</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">La tecnología es y será la herramienta que hace al humano capaz de
                        avanzar hacia ese futuro que busca.</p>
                </div>
            </div>
        </div>
    </section>

    <!--BOOTSTRAP IMPORT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>