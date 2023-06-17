<?php 
    $name = $_SESSION['name'];
    $lastName = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
    $url = $_SESSION['url'];
?>
<div class="col-sm-9 div-config-form">
    <form>
        <h2>Información Basica</h2>
        <div class="mb-3">
            <label class="label-control">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $name; ?>"/>
        </div>
        <div class="mb-3">
            <label class="label-control">Apellido</label>
            <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Apellido" value="<?php echo $lastName; ?>"/>
        </div>
        <div class="mb-3">
            <label class="label-control">E-Mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="correo@ejemplo.com" value="<?php echo $email; ?>"/>
        </div>
        <div class="mb-3">
            <label class="label-control">Telefono</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="3332221144" value="<?php echo $phone; ?>"/>
        </div>
        <div class="mb-3">
            <label class="label-control">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Crr 1 # 2 - 34" value="<?php echo $address; ?>"/>
        </div>
        <div class="mb-3">
            <label class="label-control">Link red social</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="Url red social de contacto (Facebook, Instagram, Twitter, LinkedIn, ...)" value="<?php echo $url; ?>"/>
        </div>
        <button type="button" id="update-info" class="btn btn-primary">Actualizar</button>
    </form>
</div>