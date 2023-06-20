<div class="row">
    <div class="col-sm-6 unlogged-forms">
        <div class="card" style="width: 20rem;">
            <img src="./img/user/default.png" class="card-img-top" alt="professional img">
            <div class="card-body">
                <h5 class="card-title">Nombre</h5>
                <ul>
                    <li class="card-text">(333) 3333333</li>
                    <li class="card-text">Crr 1 # 2 - 34</li>
                    <li class="card-text">http://ejemplo.com/perfil</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6 unlogged-forms">
        <form method="post" action="#" enctype="multipart/form-data">
            <h2 class="display-6">Educación</h2>
            <div id="success-lost" class="alert alert-success" role="alert" style="display:none;"></div>
            <div id="error-lost" class="alert alert-danger" role="alert" style="display:none;"></div>
            <div id="warning-lost" class="alert alert-warning" role="alert" style="display:none;"></div>
            <div class="mb-3">
                <label for="professional" class="label-control">Profesional *</label>
                <select id="professional" class="form-control">
                    <option value="">-- Seleccionar --</option>
                </select>
                <div id="professional-error" class="form-text" style="color:red; display:none;">El profesional es requerido</div>
            </div>
            <div class="mb-3">
                <label for="to" class="label-control">Para *</label>
                <input type="email" id="to" class="form-control-plaintext" value="" readonly/>
            </div>
            <div class="mb-3">
                <label for="from" class="label-control">De *</label>
                <input type="email" id="from" class="form-control" placeholder="correo@ejemplo.com"/>
            </div>
            <div class="mb-3">
                <label for="subject" class="label-control">Asunto *</label>
                <input type="text" id="subject" name="subject" class="form-control" placeholder="Asunto" />
                <div id="subject-error" class="form-text" style="color:red; display:none;">El Asunto es requerido</div>
            </div>
            <div class="mb-3">
                <label for="message" class="label-control">Mensaje *</label>
                <textarea class="form-control" id="message" name="message" placeholder="Dejame un mensaje ... "></textarea>
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
</div>