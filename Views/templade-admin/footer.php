<!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo BASE_URL.'assets/dist/'; ?>plugins/jquery/jquery.min.js"></script>

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

<!-- Bootstrap -->
<script src="<?php echo BASE_URL.'assets/dist/'; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL.'assets/'; ?>dist/js/adminlte.js"></script>


<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>


<!-- jQuery Mapael -->
<script src="<?php echo BASE_URL.'assets/dist/'; ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo BASE_URL.'assets/dist/'; ?>plugins/raphael/raphael.min.js"></script>
<script src="<?php echo BASE_URL.'assets/dist/'; ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo BASE_URL.'assets/dist/'; ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo BASE_URL.'assets/dist/'; ?>plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="<?php echo BASE_URL.'assets/'; ?>dist/js/pages/dashboard2.js"></script> -->

<script>
    const base_url = "<?php echo BASE_URL; ?>";
    const moneda = "<?php echo MONEDA; ?>";
</script>

<script>
  var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
  var currentTheme = localStorage.getItem('theme');
  var mainHeader = document.querySelector('.main-header');

  if (currentTheme) {
    if (currentTheme === 'dark') {
      if (!document.body.classList.contains('dark-mode')) {
        document.body.classList.add("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-light')) {
        mainHeader.classList.add('navbar-dark');
        mainHeader.classList.remove('navbar-light');
      }
      toggleSwitch.checked = true;
    }
  }

  function switchTheme(e) {
    if (e.target.checked) {
      if (!document.body.classList.contains('dark-mode')) {
        document.body.classList.add("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-light')) {
        mainHeader.classList.add('navbar-dark');
        mainHeader.classList.remove('navbar-light');
      }
      localStorage.setItem('theme', 'dark');
    } else {
      if (document.body.classList.contains('dark-mode')) {
        document.body.classList.remove("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-dark')) {
        mainHeader.classList.add('navbar-light');
        mainHeader.classList.remove('navbar-dark');
      }
      localStorage.setItem('theme', 'light');
    }
  }

  toggleSwitch.addEventListener('change', switchTheme, false);

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- SESION -->
<script src="<?php echo BASE_URL.'assets/js/'; ?>admin/sesion.js"></script>
