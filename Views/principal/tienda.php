<?php include_once 'Views/template-principal/header.php'; ?>

<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h4 class="mb-0">Productos Disponibles</h4><br>
        </div>
        <!--<div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Gender
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Men</a></li>
                            <li><a class="text-decoration-none" href="#">Women</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Sale
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Sport</a></li>
                            <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Bag</a></li>
                            <li><a class="text-decoration-none" href="#">Sweather</a></li>
                            <li><a class="text-decoration-none" href="#">Sunglass</a></li>
                        </ul>
                    </li>
                </ul>
            </div>-->

        <div class="col-lg-12">
            <div class="row">
                <!-- CARD PRODUCTO-->
                <?php
                if (empty($data['productos'])) {
                    echo '<h4 class="mb-2">No hay productos disponibles.</h4>';
                } else {
                    foreach ($data['productos'] as $producto) { ?>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="<?php echo BASE_URL . $producto['imagen']; ?>"
                                        height="320">
                                    <div
                                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2"
                                                    href="<?php echo BASE_URL . 'principal/detalle/' . $producto['IdProducto']; ?>"><i
                                                        class="fas fa-eye"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2 btnAgregarCarrito"
                                                    prod="<?php echo $producto['IdProducto']; ?>" href="#"><i
                                                        class="fas fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="<?php echo BASE_URL . 'principal/detalle/' . $producto['IdProducto']; ?>"
                                        class="h3 text-decoration-none">
                                        <?php echo $producto['nombre']; ?>
                                    </a>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <p>
                                                <?php echo $producto['marca']; ?>
                                            </p>
                                        </li>
                                    </ul>
                                    <h4 class="text-center mb-0">
                                        <b>
                                            <?php echo MONEDA . ' ' . $producto['precio']; ?>
                                        </b>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
                <!--END CARD PRODUCTO-->

            </div>
            <!-- PAGINACION -->
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <?php
                    $anterior = $data['pagina'] - 1;
                    $siguiente = $data['pagina'] + 1;
                    $url = BASE_URL . 'principal/tienda/';

                    if ($data['pagina'] > 1) {
                        ?>
                        <li class="page-item">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                                href="<?php echo $url . $anterior; ?>">Anterior</a>
                        </li>
                        <?php
                    }

                    if ($data['total'] >= $siguiente) {
                        ?>
                        <li class="page-item">
                            <a class="page-link antive rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                                href="<?php echo $url . $siguiente; ?>">Siguiente</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->

<?php include_once 'Views/template-principal/footer.php'; ?>
</body>

</html>