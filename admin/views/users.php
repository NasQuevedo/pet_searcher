<div class="row">
    <div id="user-form" class="col-sm-4">
        <form>
            <h2 class="display-6">Crear Usuario</h2>
            <input type="hidden" id="id" value="" />
            <div class="mb-3">
                <label class="label-control">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" />
            </div>
            <div class="mb-3">
                <label class="label-control">Apellido</label>
                <input type="text" class="form-control" id="last-name" name="last-name" />
            </div>
            <div class="mb-3">
                <label class="label-control">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" />
            </div>
            <div class="mb-3">
                <label class="label-control">Tipo</label>
                <select class="form-control" id="user-type">
                    <option value="">-- Seleccionar --</option>
                </select>
            </div>
            <button id="create-user" class="btn btn-primary">Enviar</button>
            <button id="clear" class="btn">Limpiar</button>
        </form>
    </div>
    <div class="col-sm-8">
        <table></table>
    </div>
</div>