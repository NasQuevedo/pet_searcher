<div class="col-sm-4 form characteristics-div">
    <form>
        <h2 class="display-6">Color de Ojos</h2>
        <input type="hidden" id="id" value="" /> 
        <div class="mb-3">
            <label for="name" class="label-control">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" />
        </div>
        <button type="button" id="save" class="btn btn-primary">Enviar</button>
        <button  type="button" id="clear" class="btn">Limpiar</button>
    </form>
</div>
<div class="col-sm-5">
    <table id="colors" class="table table-hover">
        <thead>
            <th>id</th>
            <th>Color</th>
            <th></th>
            <th></th>
        </thead>
    </table>
</div>
<script src="./js/color_eye.js"></script>