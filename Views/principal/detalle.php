<?php include_once 'Views/template-principal/header.php'; ?>

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <?php
                        $img = BASE_URL.$data['producto']['imagen'];
                        ?>
                        <img class="card-img img-fluid" src="<?php echo $img; ?>" alt="Card image cap" id="product-detail">
                    </div>
                    <!--<div class="row">
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            
                            <div class="carousel-inner product-links-wap" role="listbox">

                                
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo BASE_URL; ?>assets/img/product_single_01.jpg" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo BASE_URL; ?>assets/img/product_single_02.jpg" alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo BASE_URL; ?>assets/img/product_single_03.jpg" alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                

                                
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo BASE_URL; ?>assets/img/product_single_04.jpg" alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo BASE_URL; ?>assets/img/product_single_05.jpg" alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo BASE_URL; ?>assets/img/product_single_06.jpg" alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo BASE_URL; ?>assets/img/product_single_07.jpg" alt="Product Image 7">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo BASE_URL; ?>assets/img/product_single_08.jpg" alt="Product Image 8">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="<?php echo BASE_URL; ?>assets/img/product_single_09.jpg" alt="Product Image 9">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        
                    </div>-->
                
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?php echo $data['producto']['nombre']; ?></h1>
                            <p class="h3 py-2"><?php echo MONEDA . ' ' . $data['producto']['precio']; ?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Categoria:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $data['producto']['categoria']; ?></strong></p>
                                </li>
                                <li class="list-inline-item">
                                    <h6>Marca:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $data['producto']['marca']; ?></strong></p>
                                </li>
                                <li class="list-inline-item">
                                    <h6>Color:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $data['producto']['color']; ?></strong></p>
                                </li>
                            </ul>

                            <h6>Descripción</h6>
                            <p><?php echo nl2br($data['producto']['detalles']); ?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Peso Bruto:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $data['producto']['peso_bruto']; ?></strong></p>
                                </li>
                                <li class="list-inline-item">
                                    <h6>Peso Neto:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $data['producto']['peso_neto']; ?></strong></p>
                                </li>
                            </ul>

                            <h6>Especificaciones</h6>
                            <ul class="list-unstyled pb-3">
                                <li>Modelo: <?php echo $data['producto']['modelo']; ?></li>
                                <li>Dimensiones: <?php echo $data['producto']['dimensiones']; ?></li>
                                <li>Garantia: <?php echo $data['producto']['garantia']; ?></li>
                            </ul>

                            <form action="" method="GET">
                                <input type="hidden" id="IdProducto" value="<?php echo $data['producto']['IdProducto']; ?>">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Cantidad
                                                <input type="hidden" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-primary" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-primary" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-outline-primary btn-lg" name="submit" value="buy">
                                            <i class="fas fa-money-check"></i> Comprar
                                        </button>
                                    </div>
                                    <div class="col d-grid">
                                        <button type="button" class="btn btn-outline-primary btn-lg" id="btnAddMasCarrito" >
                                            <i class="fas fa-cart-plus"></i> Agregar al carrito
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <!--<section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Productos Relacionados</h4>
            </div>

            <div id="carousel-related-product">

                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="<?php echo BASE_URL; ?>assets/img/shop_08.jpg">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.html" class="h3 text-decoration-none">Red Clothing</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>M/L/X/XL</li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$20.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- End Article -->
    
    <?php include_once 'Views/template-principal/footer.php'; ?>

    <!-- Start Slider Script -->
    <script src="<?php echo BASE_URL; ?>assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->


    <!-- Carrito Compras Detalles-->
    <script src="<?php echo BASE_URL; ?>assets/js/modulos/detalle.js"></script>
</body>

</html>