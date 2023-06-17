<?php
    session_start();
    $module = 'login';
    $login = false;
    if (isset($_SESSION['id'])) {
        $module = 'home';
        $login = true;
    }

    if (isset($_GET['module'])) {
        $module = $_GET['module'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pet Searcher</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link href="./css/index.css" rel="stylesheet" />
        <?php if ($login) { ?>
            <link href="./css/user.css" rel="stylesheet" />
            <link href="./css/characteristics.css" rel="stylesheet" />
        <?php } ?>

        <script src="./lib/jquery-3.7.0.min.js"></script>
    </head>
    <body>
    <header id="header" class="container-fluid">
            <nav id="navbar" class="navbar navbar-expand-lg border-bottom border-bottom-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Pet Searcher</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="../">Home</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Admin</a>
                            </li>
                            <?php if ($login) { ?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php?module=users">Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php?module=characteristics">Caracteristicas</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php if ($login) { ?>
                            <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $_SESSION['email']; ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a id="setup" class="dropdown-item" href="#">Configuración</a></li>
                                        <li><a id="logout" class="dropdown-item" href="#">Cerrar Sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container-fluid">
            <?php require_once('./views/' . $module .  '.php'); ?>
        </div>

        <?php if ($login) {?>
            <footer id="footer" class="container-fluid" style="background-color: black; color: white;">
                <div id="footer-second" class="row">
                    <p>Todos los derecho reservados - Pet Search 2023</p>
                </div>
            </footer>
        <?php } ?>
        <script src="./js/index.js"></script>
    </body>
</html>