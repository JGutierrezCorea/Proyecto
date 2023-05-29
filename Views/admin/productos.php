<?php include_once 'Views/templade-admin/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">PANEL ADMINISTRATIVO</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v2</li>
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
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Agregar Producto</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-12">
                      <img src="<?php echo BASE_URL . 'assets/' ?>dist/img/prod-1.jpg" class="product-image"
                        alt="Product Image">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Imagen de Producto</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Archivo de Imagen</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-12 form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="col-md-12  form-group">
                        <label for="exampleInputPassword1">Marca</label>
                        <input type="text" class="form-control" placeholder="Marca del producto">
                      </div>
                      <div class="col-md-12  form-group">
                        <label for="exampleInputPassword1">Modelo</label>
                        <input type="text" class="form-control" placeholder="Modelo del producto">
                      </div>
                      <div class="col-md-6  form-group">
                        <label for="exampleInputPassword1">Color</label>
                        <input type="text" class="form-control" placeholder="Color del producto">
                      </div>
                      <div class="col-md-6 form-group">
                        <label for="exampleInputPassword1">Dimensiones</label>
                        <input type="text" class="form-control" placeholder="Ingresar dimensiones">
                      </div>
                    </div>

                    <!--PESOS-->
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="exampleInputPassword1">Peso Bruto</label>
                        <input type="text" class="form-control" placeholder="Ingresar peso">
                      </div>
                      <div class="col-md-6 form-group">
                        <label for="exampleInputPassword1">Peso Neto</label>
                        <input type="text" class="form-control" placeholder="Ingresar peso">
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="exampleInputPassword1">Garantia</label>
                        <input type="text" class="form-control" placeholder="Ingresar garantia">
                      </div>
                      <div class="col-md-4 form-group">
                        <label for="exampleInputPassword1">Precio</label>
                        <input type="text" class="form-control" placeholder="Ingresar Precio S/.">
                      </div>
                      <div class="col-md-4 form-group">
                        <label for="exampleInputPassword1">Cantidad</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>

                  </div>
                </div>



              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Registrar Producto</button>
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

<script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert("Form successful submitted!");
      }
    });
    $('#quickForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 5
        },
        terms: {
          required: true
        },
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>

</body>

</html>