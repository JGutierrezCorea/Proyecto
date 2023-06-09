<?php include_once 'Views/template-principal/header.php'; ?>

<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h2 text-dark text-decoration-none mr-3" href="#">Categoria Seleccionada - <?php echo $data['title-sub']['nombre']; ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <!-- CARD PRODUCTO-->
                <?php foreach ($data['productos'] as $producto) { ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid"
                                    src="<?php echo BASE_URL . $producto['imagen']; ?>">
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2"
                                                href="<?php echo BASE_URL . 'principal/detalle/' . $producto['IdProducto']; ?>"><i
                                                    class="far fa-eye"></i></a></li>
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
                                <h4 class="text-center mb-0">
                                    <?php echo $producto['categoria']; ?>
                                </h4>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <p>
                                        <b>Marca:
                                            <?php echo $producto['marca']; ?>
                                        </b>
                                    </p>
                                </ul>
                                <h4 class="text-center mb-0">
                                    <?php echo MONEDA . ' ' . $producto['precio']; ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--END CARD PRODUCTO-->

            </div>

            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <?php
                    $anterior = $data['pagina'] - 1;
                    $siguiente = $data['pagina'] + 1;
                    $url = BASE_URL . 'principal/categorias/' . $data['IdCateg'];
                    if ($data['pagina'] > 1) {
                        ?>
                        <li class="page-item">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                                href="<?php echo $url . '/' . $anterior; ?>">Anterior</a>
                        </li>
                        <?php
                    }

                    if ($data['total'] >= $siguiente) {
                        ?>
                        <li class="page-item">
                            <a class="page-link antive rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                                href="<?php echo $url . '/' . $siguiente; ?>">Siguiente</a>
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