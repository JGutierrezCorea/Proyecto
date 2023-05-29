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
            <!--<li class="breadcrumb-item active">Dashboard v2</li>-->
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
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-pie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Productos Registrados</span>
              <span class="info-box-number">
                <?php echo $data['cant_p']['total']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-pie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Categorias Registradas</span>
              <span class="info-box-number"><?php echo $data['cant_c']['total']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'Views/templade-admin/footer.php'; ?>

</body>

</html>