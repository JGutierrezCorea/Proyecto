<?php
if (!isset($_SESSION)) {
  header('Location: ' . BASE_URL);
  die();
}
include_once 'Views/templade-admin/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">SISTEMA DE GESTION DE VENTAS - RMV VILLAR</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>usuarios/admin">Inicio</a></li>
            <li class="breadcrumb-item active">Productos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos de Productos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="frmRegProducto" name="frmRegProducto" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 col-xl-4">
                    <div class="col-12">
                      <img id="img_preview" src="<?php echo BASE_URL . 'Imagen/Productos/' ?>product-default.jpg"
                        class="product-image" alt="Product Image">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Imagen de Producto</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="imgProducto" name="imgProducto"
                            onchange="previewImage(event, '#img_preview')">
                          <label class="custom-file-label" for="exampleInputFile">Archivo de Imagen</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-8">
                    <div class="row">
                      <div class="col-md-12 col-xl-6 form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="email" class="form-control" name="nombre" id="nombre"
                          placeholder="Ingresar Nombre del Producto">
                      </div>
                      <div class="col-md-12 col-xl-6 form-group">
                        <label>Seleccionar Categoria</label>
                        <select class="form-control" id="cbCateg" name="cbCateg">
                          <?php
                          foreach ($data['categorias'] as $cat) {
                            ?>
                            <option value="<?php echo $cat['IdCateg']; ?>"><?php echo $cat['nombre']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-6 form-group">
                        <label for="exampleInputPassword1">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca"
                          placeholder="Marca del producto">
                      </div>
                      <div class="col-md-6  form-group">
                        <label for="exampleInputPassword1">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo"
                          placeholder="Modelo del producto">
                      </div>
                      <div class="col-md-6  form-group">
                        <label for="exampleInputPassword1">Color</label>
                        <input type="text" class="form-control" id="color" name="color"
                          placeholder="Color del producto">
                      </div>
                      <div class="col-md-6 form-group">
                        <label for="exampleInputPassword1">Dimensiones</label>
                        <input type="text" class="form-control" id="dimensiones" name="dimensiones"
                          placeholder="Ingresar dimensiones">
                      </div>
                    </div>

                    <!--PESOS-->
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="exampleInputPassword1">Peso Bruto</label>
                        <input type="text" class="form-control" id="peso_bruto" name="peso_bruto"
                          placeholder="Ingresar peso">
                      </div>
                      <div class="col-md-6 form-group">
                        <label for="exampleInputPassword1">Peso Neto</label>
                        <input type="text" class="form-control" id="peso_neto" name="peso_neto"
                          placeholder="Ingresar peso">
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6 col-xl-4 form-group">
                        <label for="exampleInputPassword1">Garantia</label>
                        <input type="text" class="form-control" id="garantia" name="garantia"
                          placeholder="Ingresar garantia">
                      </div>
                      <div class="col-md-6 col-xl-4 form-group">
                        <label for="exampleInputPassword1">Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio"
                          placeholder="Ingresar Precio S/.">
                      </div>
                      <div class="col-md-6 col-xl-4 form-group">
                        <label for="exampleInputPassword1">Cantidad</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad">
                      </div>
                      <div class="col-md-12 form-group">
                        <label>Detalles Adicionales</label>
                        <textarea class="form-control" rows="5" id="detalles" name="detalles"
                          placeholder="Descripción del producto..."></textarea>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success" onclick="guardar_producto(event);"><i
                    class="far fa-save"></i> Registrar Producto</button>
                <button type="button" class="btn btn-danger" onclick="limpiar();"><i class="far fa-trash-alt"></i>
                  Limpiar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'Views/templade-admin/footer.php'; ?>

<!-- jquery-validation -->
<script src="<?php echo BASE_URL . 'assets/dist' ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist' ?>/plugins/jquery-validation/additional-methods.min.js"></script>

<script src="<?php echo BASE_URL . 'assets/js' ?>/admin/productos.js"></script>

</body>

</html>