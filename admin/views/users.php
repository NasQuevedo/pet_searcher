<?php

?>
<div class="row">
    <div id="user-form" class="col-sm-4">
        <form>
            <h2 class="display-6">Crear Usuario</h2>
            <input type="hidden" id="user-id" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" id="id" value="" />
            <p>Lo campos con (*) son requeridos</p>
            <div class="mb-3">
                <label for="name" class="label-control">Nombre *</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" />
            </div>
            <div class="mb-3">
                <label for="last-name" class="label-control">Apellido *</label>
                <input type="text" class="form-control" id="last-name" name="last-name" placeholder="apellido" />
            </div>
            <div class="mb-3">
                <label for="email" class="label-control">E-Mail *</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="correo@ejemplo.com" />
            </div>
            <div class="mb-3">
                <label for="user-type" class="label-control">Tipo *</label>
                <select class="form-control" id="user-type">
                    <option value="">-- Seleccionar --</option>
                </select>
            </div>            
            <div class="mb-3">
                <label for="phone" class="label-control">Telefono</label>
                <input class="form-control" type="number" id="phone" name="phone" placeholder="3332221144"/>
            </div>
            <div class="mb-3">
                <label for="address" class="label-control">Dirección</label>
                <input class="form-control" type="text" id="address" name="address" placeholder="Crr 1 # 2 - 33" />
            </div>
            <div class="mb-3">
                <label for="url" class="label-control">Link red social</label>
                <input class="form-control" type="text" id="url" name="url" placeholder="Link red social (Facebook, Twitter, LinkedIn)"/>
            </div>
            <button type="button" id="create-user" class="btn btn-primary">Enviar</button>
            <button type="button" id="clear" class="btn">Limpiar</button>
        </form>
    </div>
    <div class="col-sm-8">
        <table id="users" class="table table-hover">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>F. Creación</th>
                <th></th>
                <th></th>
            </thead>
        </table>
    </div>
</div>
<script src="./js/user.js"></script>
<?php 

?>