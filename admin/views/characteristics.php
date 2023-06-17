<?php
    $submodule = 'type';
    if (isset($_GET['submodule'])) {
        $submodule = $_GET['submodule'];
    }
?>
<div class="row">
    <div class="col-sm-2 characteristics-div">
        <nav class="nav flex-column">
            <a id="type" class="nav-link active" aria-current="page" href="#">Tipos</a>
            <a id="breed" class="nav-link" href="#">Razas</a>
            <a id="color" class="nav-link" href="#">Colores</a>
            <a id="color_eye" class="nav-link" href="#">Colores de Ojos</a>
        </nav>
   </div>
   <?php 
   if (file_exists('./views/submodules/'.$submodule . '.php')) {
        require_once('./views/submodules/' . $submodule . '.php');
   } else {
        echo "Error";
   }
   ?>
</div>
<script src='./js/characteristics.js'></script>