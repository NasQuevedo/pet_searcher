<div class="row">
    <div class="col-sm-6 unlogged-forms">
        <form method="post" action="#" enctype="multipart/form-data">
            <h2 class="display-6">PQRS</h2>
            <div id="success-lost" class="alert alert-success" role="alert" style="display:none;"></div>
            <div id="error-lost" class="alert alert-danger" role="alert" style="display:none;"></div>
            <div id="warning-lost" class="alert alert-warning" role="alert" style="display:none;"></div>
            <div class="mb-3">
                <label for="email"class="label-control">Para *</label>
                <input type="email" id="email" class="form-control-plaintext" value="petsearcherproject@gmail.com" readonly/>
            </div>
            <div class="mb-3">
                <label for="email"class="label-control">De *</label>
                <input type="email" id="email" class="form-control" placeholder="correo@ejemplo.com"/>
            </div>
            <div class="mb-3">
                <label for="pqrs" class="label-control">PQRS *</label>
                <select id="pqrs" class="form-control">
                    <option value="">-- Seleccionar --</option>
                    <option value="1">Pregunta</option>
                    <option value="2">Queja</option>
                    <option value="3">Reclamo</option>
                    <option value="4">Sugerencia</option>
                </select>
                <div id="pqrs-error" class="form-text" style="color:red; display:none;">El PQRS es requerido</div>
            </div>
            <div class="mb-3">
                <label for="subject" class="label-control">Asunto *</label>
                <input type="text" id="subject" name="subject" class="form-control" placeholder="Asunto" />
                <div id="subject-error" class="form-text" style="color:red; display:none;">El Asunto es requerido</div>
            </div>
            <div class="mb-3">
                <label for="message" class="label-control">Mensaje *</label>
                <textarea class="form-control" id="message" name="message" placeholder="Dejanos saber tu opinión ... "></textarea>
                <div id="breed-error" class="form-text" style="color:red; display:none;">El Raza es requerido</div>
            </div>
            <div class="mb-3">
                <label for="attachment" class="form-label">Adjunto</label>
                <input class="form-control" type="file" id="attachment">
            </div>
            <button type="button" id="save" class="btn btn-primary">Enviar</button>
            <button type="button" id="clear" class="btn">Limpiar</button>
        </form>
    </div>
    <div id="lost-img" class="col-sm-6">
        
    </div>
    <div id="lost-table" class="col-sm-6" style="display:none;">
        <table id="table" class="table table-hover"></table>
    </div>
</div>