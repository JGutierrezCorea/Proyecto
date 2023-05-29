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
          <h1 class="m-0">IMPORT RMV VILLAR - PANEL ADMINISTRATIVO</h1>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Productos registrados en el sistema (Activos / Inactivos)</h3>
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
                      aria-describedby="example2_info" id="tbProductos">
                      <thead>
                        <tr>
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            N°</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Categoria</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Producto</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Marca</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Dimensiones</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Garantia</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Precio</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending">Cantidad</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Estado</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending">Acciones</th>
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
</div>
<!-- /.content-wrapper -->

<!-- Modal mostrar informacion de los productos-->
<div class="modal fade" id="modalProducto" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalle del Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card bg-light d-flex flex-fill">
          <div class="card-header text-muted border-bottom-0">
            <p id="prod_marca_modelo"></p>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-12 col-xl-6">
                <h2 class="lead" id="prod_nombre"></h2>
                <p class="text-muted text-sm" id="prod_categ"></p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li class="small">
                    <span class="fa-li"><i class="fas fa-weight-hanging"></i></span>
                    <p id="prod_peso"></p>
                  </li>
                  <li class="small">
                    <span class="fa-li"><i class="fas fa-palette"></i></span>
                    <p id="prod_color"></p>
                  </li>
                  <li class="small">
                    <span class="fa-li"><i class="fas fa-ruler-combined"></i></span>
                    <p id="prod_dimensiones"></p>
                  </li>
                  <li class="small">
                    <span class="fa-li"><i class="fas fa-shield-alt"></i></span>
                    <p id="prod_garantia"></p>
                  </li>
                  <li class="small">
                    <span class="fa-li"><i class="fas fa-dollar-sign"></i></span>
                    <p id="prod_precio"></p>
                  </li>
                  <li class="small">
                    <span class="fa-li"><i class="fas fa-toggle-on"></i></span>
                    <p id="prod_estado"></p>
                  </li>
                  <li class="small">
                    <span class="fa-li"><i class="fas fa-tags"></i></span>
                    <p id="prod_detalles"></p>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-xl-6 text-center">
                <img src="" alt="user-avatar" class="img-fluid" id="prod_img">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <a href="#" class="btn btn-sm btn-danger" data-dismiss="modal">
                <i class="fas fa-times"></i> Cerrar
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--Fin mostroar informacion de los productos-->

<!-- Modal editar productos-->
<div class="modal fade" id="modalEditarProducto" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="far fa-edit"></i> Detalles del Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmActProducto" name="frmActProducto" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-xl-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-12">
                      <img id="img_preview" src="#"
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
                </div>
              </div>
              <div class="col-md-12 col-xl-6">
                <div class="row">
                  <input type="hidden" class="form-control" name="IdProducto" id="IdProducto">
                  <div class="col-md-12 form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                  </div>
                  <div class="col-md-12 form-group">
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
                  <div class="col-md-12 col-xl-6 form-group">
                    <label for="exampleInputPassword1">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca">
                  </div>
                  <div class="col-md-12 col-xl-6  form-group">
                    <label for="exampleInputPassword1">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo">
                  </div>
                  <div class="col-md-12 col-xl-6  form-group">
                    <label for="exampleInputPassword1">Color</label>
                    <input type="text" class="form-control" id="color" name="color">
                  </div>
                  <div class="col-md-12 col-xl-6 form-group">
                    <label for="exampleInputPassword1">Dimensiones</label>
                    <input type="text" class="form-control" id="dimensiones" name="dimensiones">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-xl-4 form-group">
                <label for="exampleInputPassword1">Peso Bruto</label>
                <input type="text" class="form-control" id="peso_bruto" name="peso_bruto">
              </div>
              <div class="col-md-6 col-xl-4 form-group">
                <label for="exampleInputPassword1">Peso Neto</label>
                <input type="text" class="form-control" id="peso_neto" name="peso_neto">
              </div>
              <div class="col-md-6 col-xl-4 form-group">
                <label for="exampleInputPassword1">Garantia</label>
                <input type="text" class="form-control" id="garantia" name="garantia">
              </div>
              <div class="col-md-6 col-xl-4 form-group">
                <label for="exampleInputPassword1">Precio S/.</label>
                <input type="text" class="form-control" id="precio" name="precio">
              </div>
              <div class="col-md-6 col-xl-4 form-group">
                <label for="exampleInputPassword1">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad">
              </div>
              <div class="col-md-12 form-group">
                <label>Información Adicional</label>
                <textarea class="form-control" rows="5" id="detalles" name="detalles"></textarea>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm" onclick="actualizar_producto(event);"><i
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


<?php include_once 'Views/templade-admin/footer.php'; ?>

<!-- DataTables  & Plugins -->
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script
  src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script
  src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo BASE_URL . 'assets/dist/'; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?php echo BASE_URL . 'assets/js' ?>/admin/productos.js"></script>

</body>

</html>