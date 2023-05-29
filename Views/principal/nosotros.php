<?php include_once 'Views/template-principal/header.php'; ?>

    <!-- Start Content Page -->
    <div class="container-fluid bg-primary py-5">
        <div class="col-md-6 m-auto text-center text-white">
            <h1>Bienvenido a RMV Villar Import</h1>
            <p>
                Crear tu cuenta para acceder a la compra de nuestros productos, de calidad al mejor precio.
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <!--<form class="col-md-8 m-auto" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Nombres</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nombres Completos">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Apellidos</label>
                        <input type="text" class="form-control mt-1" id="apellidos" name="apellidos" placeholder="Apellidos Completos">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="Contraseña">Contraseña</label>
                    <input type="password" class="form-control mt-1" id="Contraseña" name="Contraseña" placeholder="Contraseña">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Dirección">Dirección</label>
                    <textarea class="form-control mt-1" id="Dirección" name="Dirección" placeholder="Dirección" rows="4"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Let’s Talk</button>
                    </div>
                </div>
            </form>-->
            
            <!--Login-->
            <form id="frmAcceso" name="frmAcceso" class="col-md-4 m-auto" method="POST" role="form">
                <div class="row">
                    <h1>Iniciar Sesión</h1>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputemail">Correo Electronico</label>
                        <input type="email" class="form-control mt-1" id="correo"name="correo" placeholder="Ingresar Correo">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                    <label for="inputsubject">Contraseña</label>
                    <input type="password" class="form-control mt-1" id="clave" name="clave" placeholder="Clave de acceso">
                </div>
                </div>
                
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-outline-primary btn-sm px-3" onclick="User_Acesso_Login(event);"><i class="fas fa-sign-in-alt"></i> Acceder</button>
                    </div>
                </div>
            </form>
            <!--End Login-->
        </div>
    </div>
    <!-- End Contact -->

    <?php include_once 'Views/template-principal/footer.php'; ?>

    <!-- SCRIPT acceso-->
    <script src="<?php echo BASE_URL; ?>assets/js/acceso.js"></script>
</body>

</html>