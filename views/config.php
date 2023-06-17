<?php 
    if (isset($_SESSION['id'])) {
      $submodule = 'basics';
      if (isset($_GET['submodule'])) {
        $submodule = $_GET['submodule'];
      }  
?>
<div class="row">
    <div class="col-sm-3">
        <input type="hidden" id="id" value="<?php echo $_SESSION['id']; ?>" />
        <img style="border-radius: 100%;" src="./img/user/default.png" class="img-thumbnail" alt="" />
        <h2 class="display-6"><?php echo $_SESSION['name'] . ' ' . $_SESSION['last_name']; ?></h2>
        <div class="list-group">
        <a href="index.php?module=config" class="list-group-item list-group-item-action active" aria-current="true">
            Información Basica
        </a>
        <a href="index.php?module=config&submodule=password" class="list-group-item list-group-item-action">Contraseña</a>
        <a href="index.php?module=config&submodule=account" class="list-group-item list-group-item-action">Cuenta</a>
        </div>
    </div>
    <?php 
        if (file_exists('./views/submodules/' . $submodule . '.php')) {
            require_once('./views/submodules/' . $submodule . '.php');
        } else {
            echo "Page not Found";
        }
    ?>
</div>
<script src="./js/config.js"></script>
<?php 
    } else {
        require_once('./views/error-not-login.php');
    }
?>