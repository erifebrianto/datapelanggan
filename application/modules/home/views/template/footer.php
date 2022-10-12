<footer class="main-footer">
  <strong>Made With &#10084  &copy; 2022 <a href="https://puskomedia.net.id">Puskonet</a>.</strong>
  Powered <a href="https://adminlte.io">AdminLTE</a>
  <div class="float-right d-none d-sm-inline-block">
  <b>Version</b> 1.0.0
  </div>
</footer>
<script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
  <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $('#tabel_pelanggan').DataTable({
      'stateSave': true,
    });
    $('#tabel_log').DataTable({
      'stateSave': true,
      order: [[2, 'asc']],
    });
  })
</script>

<?php
if($this->session->flashdata('success')){?>
<script>
$(document).Toasts('create', {
  class: 'bg-success',
  title: 'Sukses',
  position: 'topRight',
  body: '<?= $this->session->flashdata('success') ?>'
});
</script>
<?php
}
 ?>

 <?php
 if($this->session->flashdata('error')){?>
 <script>
 $(document).Toasts('create', {
   class: 'bg-danger',
   title: 'Error',
   position: 'topRight',
   body: '<?= $this->session->flashdata('error') ?>'
 });
 </script>
 <?php
 }
  ?>
  <script>
    $(function () {
      //Date picker
      $('#reservationdate').datetimepicker({
          // format: 'DD/MM/YYYY',
          format : 'L',
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    });
  </script>



</body>
</html>
