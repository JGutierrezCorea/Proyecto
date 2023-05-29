<?php include_once 'Views/template-principal/header.php'; ?>

<section class="bg-primary py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>RMV Villar Import</h1>
                <p>
                    Traemos los mejores productos acorde a sus necesidades, siempre responsable de la calidad y
                    con garantia para una mayor seguridad de nuestros clientes. <br><br>

                    Completa instalación de los equipos que proporcionamos, con los tecnicos capacitados y calificados.
                </p>
            </div>
            <div class="col-md-4">
                <img src="<?php echo BASE_URL; ?>assets/img/about-hero.svg" alt="About Hero">
            </div>
        </div>
    </div>
</section>
<!-- Close Banner -->

<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Nuestros Servicios</h1>
            <p>
                Contamos con delivey a Lima y Provincias para la facilidad de nuestros clientes, garantia hasta por un año en nuestros productos, ofrecemos promociones durante todo el año y la atencion en venta es de 24/7.
            </p>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fas fa-truck"></i></div>
                <h2 class="h5 mt-4 text-center">Delivery Lima - Provincias</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fas fa-shield-alt"></i></div>
                <h2 class="h5 mt-4 text-center">Garantia</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                <h2 class="h5 mt-4 text-center">Promociones</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                <h2 class="h5 mt-4 text-center">Atención 24/7</h2>
            </div>
        </div>
    </div>
</section>
<!-- End Section -->

<!-- Inicio Marcas -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Marcas</h1>
                <p>
                    Con las empresas que trabajamos para garantizar la calidad de los productos.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example"
                            data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="<?php echo BASE_URL; ?>assets/img/logo-colab/xprinter.png"
                                                    alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-4 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="<?php echo BASE_URL; ?>assets/img/logo-colab/goojprt.png"
                                                    alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-4 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                    src="<?php echo BASE_URL; ?>assets/img/logo-colab/gallo.png"
                                                    alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--Fin Marcas-->


<?php include_once 'Views/template-principal/footer.php'; ?>
</body>

</html>