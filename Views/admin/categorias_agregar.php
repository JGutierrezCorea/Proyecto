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
            <li class="breadcrumb-item active">Categorias</li>
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
        <div class="col-sm-12 col-md-6 col-xl-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos de la Categoria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="frmRegCategoria" name="frmRegCategoria" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <img id="img_preview" src="<?php echo BASE_URL . 'Imagen/Categorias/' ?>categoria-default.jpg"
                      class="product-image" alt="Product Image">
                    <div class="form-group">
                      <label for="exampleInputFile">Imagen de Producto</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="imgCateg" name="imgCateg"
                            onchange="previewImage(event, '#img_preview')">
                          <label class="custom-file-label" for="exampleInputFile">Archivo de Imagen</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre Categoria</label>
                      <input type="email" class="form-control" name="nombre" id="nombre"
                        placeholder="Ingresar Nombre de la Categoria">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success" onclick="guardar_categoria(event);"><i
                    class="far fa-save"></i> Registrar Categoria</button>
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

<script src="<?php echo BASE_URL . 'assets/js' ?>/admin/categorias.js"></script>

</body>

</html>