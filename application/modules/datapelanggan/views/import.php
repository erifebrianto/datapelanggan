
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Import Data Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Import Data Pelanggan</li>
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
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Import Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div>
                    <div class="">
                    <input type="file" class="input-group-text" id="file">
                    <br>
                    <div>
                        <button class="btn btn-primary btn-sm" type="button" id="btn_preview">Preview</button>
                      <a href="<?php echo base_url("excel/format.xlsx"); ?>"><button type="button" class="btn btn-success btn-sm">Download Format</button></a>
                    </div>
                  </div>
                  <br>
                  <!-- hasil output preview -->
                  <div class="output">
                    <span class="hidden" id="loading">Loading ......</span>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>

    </section>

<script>
  $(document).ready(function () {
    $('#loading').hide();
     $("#btn_preview").click(function (event) {
       $('#loading').show();
        var data = new FormData();
        jQuery.each($('#file')[0].files, function(i, file) {
            data.append('file', file);
        });
        data.append("<?=$this->security->get_csrf_token_name()?>", "<?=$this->security->get_csrf_hash()?>")
              $.ajax({
               type: "POST",
               enctype: 'multipart/form-data',
               url: "<?=base_url('datapelanggan/previews')?>",
               data: data,
               processData: false,
               contentType: false,
               cache: false,
               timeout: 600000,
               success: function (server_response) {
                 $('#loading').hide();
                 $(".output").html(server_response);
               },
               error: function (e) {

               }
             });
     })
  });
</script>
