
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Pembayaran</h1>
             </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Pembayaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <span id="judul"></span>
              </div>
              <div class="card-body">
                <div id="output"></div>
              </div>
            </div>
          </div>

        </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>


    <script type="text/javascript">

function index(){
        $.ajax({
               type: "GET",
               url: "<?=base_url('datapembayaran/v_pembayaran')?>",
               processData: false,
               contentType: false,
               cache: false,
               timeout: 600000,
               success: function (server_response) {
                $("#judul").text('Pembayaran')
                 $("#output").html(server_response);
               },
               error: function (e) {

               }
             });
        }

    function detail(id){
        $.ajax({
               url: "<?php echo base_url('datapembayaran/detail/')?>" + id,
               processData: false,
               contentType: false,
               cache: false,
               timeout: 600000,
               success: function (server_response) {
                $("#judul").text('Detail Pembayaran')
                 $("#output").html(server_response);
               },
               error: function (e) {

               }
             });
            };

    $(document).ready(function(){
      index();
    });


    </script>
    <!-- Modal -->
    <!-- /.content -->
