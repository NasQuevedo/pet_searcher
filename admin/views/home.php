<section id="home">
    <div class="row">
        <div id="welcome" class="col-sm-12">
            <h3>Hola!</h3>
            <h2 class="display-6"><?php echo $_SESSION['name'] . ' '. $_SESSION['last_name']; ?></h2>
            <p class="lead">Como administrador podras gestionar usuarios, caracteristicas de las mascotas y ver las quejas, reclamos o sugerencias de los usuarios</p>
        </div>
    </div>
</section>

<section id="main-services-section">
    <div class="row">
        <div id="search" class="col-sm-4">
            <h4>Usuarios</h4>
            <p>Podra crear, editar, eliminar y consultar a los usuarios</p>
            <img src="./icons/users.png" src="users" />
        </div>
        <div id="found" class="col-sm-4">
            <h4>Caracteristicas</h4>
            <p>Podra gestionar las caracteristicas de las mascotas</p>
            <img src="./icons/characteristics.png" src="users" />
        </div>
        <div id="match" class="col-sm-4">
            <h4>PQRs</h4>
            <p>Podra ver las preguntas quejas y reclamos de los usuarios</p>
            <img src="./icons/pqrs.png" src="users" />
        </div>
    </div>
</section>

<section>
    <div class="row">
        <div id="community" class="col-sm-12">
            <h2>Comunidad</h2>
            <p>Tambien podras ser parte de la comunidad</p>
            <img src="./icons/community.png" alt="community" style="width: 20%;" />
        </div>
    </div>
</section>