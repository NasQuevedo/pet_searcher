<?php 
    if (isset($_SESSION['id'])) {
?>
<div class="row">
    <div id="found-img" class="col-sm-6">
        <img src="./icons/find.png" alt="found" />
    </div>
    <div id="found-table" class="col-sm-6" style="display:none;">
        <table id="table" class="table table-hover"></table>
    </div>
    <div class="col-sm-6" id="found-form">
        <form action="#" enctype="multipart/form-data">
            <h2>Encontrada</h2>
            <div id="success-found" class="alert alert-success" role="alert" style="display:none;"></div>
            <div id="error-found" class="alert alert-danger" role="alert" style="display:none;"></div>
            <p>Por favor ingresa todos los datos de la mascota encontrada</p>
            <input type="hidden" id="user-id" value="<?php echo $_SESSION['id']; ?>" />
            <div class="mb-3">
                <label class="label-control">Nombre (Solo si existe manera de identificarlo)</label>
                <input type="text" id="name" class="form-control" placeholder="Primera letra mayuscula, ej. (Tayra, Maggie, Sally, etc...)"/>
            </div>
            <div class="mb-3">
                <label class="label-control">Sexo</label>
                <select id="genre" class="form-control">
                    <option value="">-- Seleccionar --</option>
                    <option value="1">Macho</option>
                    <option value="2">Hembra</option>
                </select>
                <div id="genre-error" class="form-text" style="color:red; display:none;">El Sexo es requerido</div>
            </div>
            <div class="mb-3">
                <label class="label-control">Tipo</label>
                <select id="pet-type" class="form-control">
                    <option value="">-- Seleccionar --</option>
                </select>
                <div id="type-error" class="form-text" style="color:red; display:none;">El Tipo es requerido</div>
            </div>
            <div class="mb-3">
                <label class="label-control">Raza</label>
                <select id="breeds" class="form-control">
                    <option value="">-- Seleccionar --</option>
                </select>
                <div id="breed-error" class="form-text" style="color:red; display:none;">El Raza es requerido</div>
            </div>
            <div class="mb-3">
                <label class="label-control">Color</label>
                <select id="pet-color" class="form-control">
                    <option value="">-- Seleccionar --</option>
                </select>
                <div id="color-error" class="form-text" style="color:red; display:none;">El Color es requerido</div>
            </div>
            <div class="mb-3">
                <label class="label-control">Color de Ojos</label>
                <select id="pet-eye-color" class="form-control">
                    <option value="">-- Seleccionar --</option>
                </select>
                <div id="color-eye-error" class="form-text" style="color:red; display:none;">El Color de Ojos es requerido</div>
            </div>
            <div class="mb-3">
                <label for="pet-photo" class="form-label">Foto</label>
                <input class="form-control" type="file" id="pet-photo">
            </div>
            <button type="button" id="save" class="btn btn-primary">Guardar</button>
            <button type="button" id="clear" class="btn">Limpiar</button>
        </form>
    </div>
</div>
<script src="./js/pet.js"></script>
<script src="./js/found.js"></script>
<?php 
    } else {
        require_once('./views/error-not-login.php');
    }
?>