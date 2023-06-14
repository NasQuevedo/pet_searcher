<?php
    if (isset($_SESSION['id'])) {
?>
<div class="row">
    <div id="match-form" class="col-sm-12">
        <form class="row g-3">
            <input type="hidden" id="user-id" value="<?php echo $_SESSION['id']; ?>" />
            <div class="col-auto">
                <label for="genre" class="visually-hidden">Sexo</label>
                <select id="genre" class="form-control">
                    <option value="">Sexo</option>
                    <option value="1">Macho</option>
                    <option value="2">Hembre</option>
                </select>
            </div>
            <div class="col-auto">
                <label for="pet-type" class="visually-hidden">Tipo</label>
                <select id="pet-type" class="form-control">
                    <option value="">Tipo</option>
                </select>
            </div>
            <div class="col-auto">
                <label for="breeds" class="visually-hidden">Raza</label>
                <select id="breeds" class="form-control">
                    <option value="">Raza</option>
                </select>
            </div>
            <div class="col-auto">
                <label for="pet-color" class="visually-hidden">Color</label>
                <select id="pet-color" class="form-control">
                    <option value="">Color</option>
                </select>
            </div>
            <div class="col-auto">
                <label for="pet-color" class="visually-hidden">Color de Ojos</label>
                <select id="pet-color" class="form-control">
                    <option value="">Color de Ojos</option>
                </select>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div id="match-space" class="co-sm-12">
        <img id="match-img" src="./icons/match.png" alt="match" />
    </div>
</div>
<script src="./js/pet.js"></script>
<script src="./js/search.js"></script>
<?php 
    } else {
        require_once('./views/error-not-login.php');
    }
?>