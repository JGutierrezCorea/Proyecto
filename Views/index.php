<?php include_once 'Views/template-principal/header.php'; ?>


<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner bg-primary">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="./<?php BASE_URL; ?>Imagen/Banner/banner1.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-white">
                                <b>RMV VILLAR Import</b><br>Tienda Virtual
                            </h1>
                            <h3 class="h2"><b>GOOJPRT</b></h3>
                            <P class="text-white">
                                Los mejores productos de importación en gaveteros, ticketeras, y muchos más. Además,
                                papel adhesivo y termico para el
                                buen funcionamiento de los productos.
                            </P>
                            <!--<p>
                                Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1).
                                This template is 100% free provided by <a rel="sponsored" class="text-success"
                                    href="https://templatemo.com" target="_blank">TemplateMo</a> website.
                                Image credits go to <a rel="sponsored" class="text-success"
                                    href="https://stories.freepik.com/" target="_blank">Freepik Stories</a>,
                                <a rel="sponsored" class="text-success" href="https://unsplash.com/"
                                    target="_blank">Unsplash</a> and
                                <a rel="sponsored" class="text-success" href="https://icons8.com/" target="_blank">Icons
                                    8</a>.
                            </p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="./<?php BASE_URL; ?>Imagen/Banner/banner2.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-white">
                                <b>RMV VILLAR Import</b><br>Tienda Virtual
                            </h1>
                            <h3 class="h2"><b>XPRINTER</b></h3>
                            <p class="text-white">
                                Una de las mejores marcas en impresoras térmicas portátiles.
                                Imprime con <strong>papel adhesivo o térmico</strong> no necesita tinta. Ademas,
                                compatible con Windows, Android y Ios, con conexion Bluetooh.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="./<?php BASE_URL; ?>Imagen/Banner/banner3.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-white">
                                <b>RMV VILLAR Import</b><br>Tienda Virtual
                            </h1>
                            <h3 class="h2"><b>LECTOR DE CODIGO DE BARRAS</b></h3>
                            <p class="text-white">
                                Los mejores productos de alta calidad a precio justo, lo que su negocio necesita para
                                crecer
                                y tener el control de todas sus ventas. Incorpora tecnologia para codigos de barras y
                                QR.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Inicio Categorias -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1"><b>Categorias de Productos</b></h1>
            <p>
                Nuestra mejor seleccion de productos los encuentras aqui clasificados para una mejor esperiencia.
            </p>
        </div>
    </div>
    <div class="row">
        <?php foreach ($data['categorias'] as $categoria) { ?>
            <div class="col-12 col-md-4 col-xl-2 p-5 mt-3">
                <a href="#"><img src="<?php echo BASE_URL . $categoria['imagen']; ?>"
                        class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">
                    <?php echo $categoria['nombre']; ?>
                </h5>
                <p class="text-center"><a href="<?php echo BASE_URL.'principal/categorias/'.$categoria['IdCateg']; ?>"
                        class="btn btn-outline-primary btn-sm">Ver en tienda</a></p>
            </div>
        <?php } ?>

    </div>
</section>
<!-- Fin Categorias -->


<!-- Inicio Nuevos Productos -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><b>Nuevos Productos</b></h1>
                <p>
                    Visualice los nuevos productos que tenemos para usted, siempre innovando en tecnologia al alcance de
                    su comercio.
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data['nuevos_productos'] as $n_producto) { ?>
                <div class="col-12 col-md-6 col-xl-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo BASE_URL . 'principal/detalle/' . $n_producto['IdProducto']; ?>">
                            <img src="<?php echo BASE_URL.$n_producto['imagen']; ?>" class="card-img-top" alt="..." height="320" >
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    Marca: <b><?php echo $n_producto['marca']; ?></b>
                                </li>
                                <li class="text-muted text-right">
                                    <?php echo MONEDA . ' ' . $n_producto['precio']; ?>
                                </li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">
                                <?php echo $n_producto['nombre']; ?>
                            </a>
                            <br>
                            <a href="<?php echo BASE_URL . 'principal/detalle/' . $n_producto['IdProducto']; ?>"
                                class="btn btn-outline-primary">
                                <i class="far fa-eye"></i> Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Featured Product -->

<?php include_once 'Views/template-principal/footer.php' ?>

</body>

</html>