<?php 
    session_start();
    require_once('./model/db.class.php');

    $connection = new Db();
    $connect = $connection->connect();
    if ($connect) {
       $module = 'home';

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
        <?php if (isset($_SESSION['id'])) { ?>
            <link href="./css/lost.css" rel="stylesheet" />
            <link href="./css/found.css" rel="stylesheet" />
            <link href="./css/match.css" rel="stylesheet" />
            <link href="./css/config.css" rel="stylesheet" />
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
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <?php if(!isset($_SESSION['email']) || (isset($_SESSION['email']) && $_SESSION['user_type_id'] === 1)) { ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="./admin/">Admin</a>
                            </li>
                            <?php } ?>
                            <?php if (isset($_SESSION['email'])) {?>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="index.php?module=lost">Perdida</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="index.php?module=found">Encontrada</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="index.php?module=search">Buscar</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php if (!isset($_SESSION['email'])) {?>
                            <button id="signup-btn" class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Registro</button>
                        <?php } else { ?>
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $_SESSION['email']; ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a id="setup" class="dropdown-item" href="index.php?module=config">Configuración</a></li>
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
            <?php 
                if(file_exists('./views/'.$module. '.php')) {
                    require_once('./views/'.$module. '.php');
                }else {
                    require_once('./views/error404.php');
                }
            ?> 
        </div>
        
        <footer id="footer" class="container-fluid" style="background-color: black; color: white;">
            <div id="footer-first" class="row">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-3" id="contact-us">
                    <h5>Contactanos</h5>
                    <ul>
                        <li>Envianos un E-Mail</li>
                        <li>(+57) 321 6055462</li>
                        <li>Crr 3 # 8 -23 sur</li>
                        <li>Bogota D.C</li>
                    </ul>
                </div>
                <div class="col-sm-3" id="other-services">
                    <h5>Otro Servicios</h5>
                    <ul>
                        <li>Educación</li>
                        <li>Acompañamiento</li>
                        <li>PQRs</li>
                    </ul>
                </div>
            </div>
            <div id="footer-second" class="row">
                <p>Todos los derecho reservados - Pet Search 2023</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="./js/index.js"></script>
    </body>
</html>
<?php 
    } else {
?>
    <h2>Upss!!</h2>
    <p>Algo salio mal<p>
<?php
    }
?>