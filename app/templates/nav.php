<nav class="navbar navbar-expand-lg fixed-top" id="loginNav">
    <div class="container">
        <a class="navbar-brand-login" href="./../../../index.php">Malaria App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="/malariaapp#app">App</a></li>
                <li class="nav-item"><a class="nav-link" href="/malariaapp#portfolio">Malaria</a></li>
                <li class="nav-item"><a class="nav-link" href="./../../../mapa.php">Mapa</a></li>
                <li class="nav-item"><a class="nav-link" href="/malariaapp#team">Equipo</a></li>
                <li class="nav-item"><a class="nav-link nav-login" href="./../../../login.php">
                        <?php
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