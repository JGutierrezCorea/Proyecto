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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Categorias registradas en el sistema (Activos / Inactivos)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12 col-md-6"></div>
                  <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                  <div class="col-sm-12 table-responsive">
                    <table class="table table-bordered table-hover dataTable dtr-inline"
                      aria-describedby="example2_info" id="tbCategorias">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Nombre de la Categoria</th>
                          <th>Fecha de Registro</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->

  <!-- Modal editar productos-->
  <div class="modal fade" id="modalEditarCategoria" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="far fa-edit"></i> Detalles de la Categoria</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="frmActCategoria" name="frmActCategoria" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-12">
                    <img id="img_preview" src="" class="product-image" alt="Product Image">
                    <!--<img id="img_preview" src="<?php echo BASE_URL . 'Imagen/Categorias/' ?>categoria-default.jpg"
                      class="product-image" alt="Product Image">-->
                  </div>
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
                <!--ID CATEGORIA-->
                <input type="hidden" class="form-control" name="IdCateg" id="IdCateg">
                <!--**********************************-->
                <div class="col-md-12 form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm" onclick="actualizar_categoria(event);"><i
                  class="far fa-save"></i>
                Actualizar Producto</button>
              <a href="#" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fas fa-times"></i> Cerrar
              </a>
            </div>
          </form>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!--FIN MODAL PRODUCTOS-->

</div>
<!-- /.content-wrapper -->

<?php include_once 'Views/templade-admin/footer.php'; ?>

<script src="<?php echo BASE_URL . 'assets/js' ?>/admin/categorias.js"></script>

</body>

</html>