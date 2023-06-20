<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div id="signup-content" class="modal-content">
            <div class="modal-body">
                <form id="signup-form">
                    <h4>Registro</h4>
                    <div id="success-signup" class="alert alert-success" role="alert" style="display:none;"></div>
                    <div id="error-signup" class="alert alert-danger" role="alert" style="display:none;"></div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" class="form-control" id="name" placeholder="Name"/>
                        <div id="name-error" class="form-text" style="color:red; display:none;">El nombre es requerido</div>
                    </div>
                    <div class="mb-3">
                        <label for="last-name" class="form-label">Apellido *</label>
                        <input type="text" class="form-control" id="last-name" placeholder="Apellido"/>
                        <div id="last-name-error" class="form-text" style="color:red; display:none;">El apellido es requerido</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail *</label>
                        <input type="email" class="form-control" id="email-signup" placeholder="name@example.com"/>
                        <div id="email-error" class="form-text" style="color:red; display:none;">El E-Mail es requerido</div>
                    </div>
                    <div class="mb-3">
                        <label for="password-signup" for="form-label">Password *</label>
                        <input type="password" class="form-control" id="password-signup"/>
                        <div id="password-error" class="form-text" style="color:red; display:none;">La contraseña es requerida</div>
                        <div id="password-length-error" class="form-text" style="color:red; display:none;">La contraseña debe tener por lo menos 8 digitos</div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password-signup" for="form-label">Confirm Password *</label>
                        <input type="password" class="form-control" id="confirm-password-signup"/>
                        <div id="confirm-password-error" class="form-text" style="color:red; display:none;">Debe confirmar la contraseña</div>
                        <div id="no-match-error" class="form-text" style="color:red; display:none;">La contraseña no coincide</div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="show-password">
                        <label class="form-check-label" for="show-password">
                            Mostrar contraseña
                        </label>
                    </div>
                    <button id="signup" type="button" class="btn btn-primary">Registrarse</button>
                    <button id="close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<section id="home">
    <div class="row">
        <div id="welcome" class="col-sm-6">
            <h3>Bienvenido</h3>
            <p class="lead">A la comunidad para la busqueda de mascotas, donde encontradas diversos servicios que te ayudara a encontrar a tu mascota perdida para volver a casa</p>
            <img src="./icons/principal.png" alt="principal" style="width: 20%" />
        </div>
        <div id="div-form" class="col-sm-6">
            <?php if (!isset($_SESSION['email'])) {?>
                <form id="login-form">
                    <h4>Iniciar Sesion</h4>
                    <div id="error-login" class="alert alert-danger" role="alert" style="display:none;"></div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control" id="email" placeholder="correo@example.com"/>
                        <div id="email-login-error" class="form-text" style="color:red; display:none;">El E-Mail es requerido</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" for="form-label">Password</label>
                        <input id="password" type="password" class="form-control" />
                        <div id="password-login-error" class="form-text" style="color:red; display:none;">La Contrasela es requerida</div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="show-password-login">
                        <label class="form-check-label" for="show-password-login">
                            Mostrar contraseña
                        </label>
                    </div>
                    <a href="#">¿Olvido su contraseña?</a><br>
                    <button id="login" type="button" class="btn btn-primary">Iniciar Sesion</button>
                </form>
            <?php } else {?>
                <h1>Hola! </h1>
                <h3 class="display-6">
                    <?php echo $_SESSION['name'] . ' ' . $_SESSION['last_name']; ?>
                </h3>
            <?php } ?>
        </div>
    </div>
</section>

<section id="main-services-section">
    <div class="row">
        <div id="search" class="col-sm-4">
            <h4>Busqueda</h4>
            <p>Busca a tu mascota en la comunidad</p>
            <img src="./icons/search.png" alt="search" />
        </div>
        <div id="found" class="col-sm-4">
            <h4>Encontrada</h4>
            <p>Sube los datos de la mascota encontrada</p>
            <img src="./icons/find.png" alt="find" />
        </div>
        <div id="match" class="col-sm-4">
            <h4>Match</h4>
            <p>El sistema hara match entre la mascota perdida y la encontrada</p>
            <img src="./icons/match.png" alt="match" />
        </div>
    </div>
</section>

<section id="other-services-section">
    <div class="row" style="padding: 2rem; text-align: center;">
        <div class="col-sm-12">
            <h3>Otro Servicios</h3>
        </div>
    </div>

    <div class="row">
        <div id="emotional-help" class="col-sm-6">
            <h4>Ayuda Emocional</h4>
            <p>Contacta a uno de nuestro profesional para un acompañamiento emocional</p>
            <button type="button" id="accompaniment-button" class="btn btn-info">Contactar</button>
        </div>
        <div id="education" class="col-sm-6">
            <h4>Educación</h4>
            <p>Aprende todo sobre el cuidado de tu mascota</p>
            <button type="button" id="education-button" class="btn btn-info">Me interesa!</button>
        </div>
    </div>
</section>

<section>
    <div class="row">
        <div id="community" class="col-sm-12">
            <h2>Comunidad</h2>
            <p>Nuestra idea es crear una comunidad fuerte para la busqueda y rescate de mascotas estraviadas, acompañamiento a sus dueños y educación a los mismo para prevenir accidentes</p>
            <img src="./icons/community.png" alt="community" style="width: 20%;" />
        </div>
    </div>
</section>