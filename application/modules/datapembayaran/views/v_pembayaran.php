
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data layanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
                <div class="d-flex">
                  <div class="col">
                    <div class="form-group">
                      <a class="btn btn-primary" href="<?=base_url('#'); ?>">Tambah</a>
                    </div>
                  </div>
                  <div class="d-flex ms-auto">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sinkron">
                      Sinkron Data
                    </button>
                  </div>
                </div>
                <br>
                <div class="table-responsive">
                <table id="tabel_pelanggan" class="table table-bordered table-hover" width=100%>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>Paket Langganan</th>
                      <th>Pembayaran terakhir</th>
                      <th>Status Bayar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                          $no = 1;
                          foreach($layanan as $r){
                      ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $r->id_data_pelanggan ?></td>
                      <td><?php echo $r->nama_pelanggan ?></td>
                      <td><?php echo $r->nama_paket ?></td>
                      <td>
                        <?php
                          $data1 = $this->M_pembayaran->findLastPaid($r->id_akun_layanan)->result();
                          echo date_format(date_create($data1[0]->tanggal_bayar), "d/m/Y");
                          // echo $r->id_akun_layanan;
                         ?>
                      </td>
                      <td>
                        <?php
                        if ($data1[0]->status_bayar == '1'){
                          echo '<span class="badge bg-success">Sudah Bayar</span>';
                        } else {
                          echo '<span class="badge bg-danger">Belum Bayar</span>';
                        }
                       ?>
                     </td>
                     <td>
                      <button class="btn btn-sm btn-success" onclick="detail('<?=$this->enkrip->encrypt($r->id_akun_layanan)?>')">Detail</button> 
                      </td>
                    </tr>
                      <?php }?>
                      </div>

    <div class="modal fade" id="modal-sinkron" data-backdrop="static" >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Sinkron Data</h4>
          </div>
          <div class="modal-body">
            <div id="hasil"></div>
          </div>
          <div class="modal-footer justify-content-between">
            <button onClick="window.location.href=window.location.href" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-sm" id="sinkron">Sinkron Data</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <script type="text/javascript">

    $(document).ready(function(){
    $('#tabel_pelanggan').DataTable({
      'stateSave': true,
    });

    $("#sinkron").click(function(){
      $("#hasil").html('Silahkan Tunggu');
        $.ajax({
          url: '<?php echo base_url('/cron/action/sinkrondata/').$this->security->get_csrf_hash()?>',
          type: "GET",
          success: function(response){
              $("#hasil").html(response);
          }
        });

        });

        

    });
    </script>
    <!-- Modal -->
    <!-- /.content -->
