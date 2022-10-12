
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Suspend Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('datapelanggan'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Suspend Pelanggan</li>
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
                  <h3 class="card-title">Suspend Pelanggan</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <a class="btn btn-primary" href="<?=base_url('administrasipelanggan/suspend/add/suspend'); ?>">Tambah</a>
                </div> <br>
                <div class="table-responsive">
                <table id="tabel_1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="col-1">#</th>
                      <th>ID Pelanggan</th>
                      <th>Nama</th>
                      <th>Pembayaran</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($data_pelanggan as $i) {
                        $find = $this->M_dapel->findLastPaid($i->id_layanan)->result();
                         ?>
                        <tr>
                          <?php
                           ?>
                          <td>
                            <?php
                              if ($find[0]->status_bayar == '0'){?>
                                <input class="cheked_check" type="checkbox" name="" value="<?=$i->akun_pppoe?>">
                                <?php
                              }
                             ?>
                          </td>
                          <td><?= $i->id_data_pelanggan?></td>
                          <td><?= $i->nama_pelanggan?></td>
                          <td>
                            <?php
                              if ($find[0]->status_bayar == '0'){
                                echo 'Sudah Bayar';
                              } else {
                                echo 'Belum Bayar';
                              }
                             ?>
                          </td>
                          <td>
                              <?php
                                if ($i->status_suspend == '0'){
                                  echo '<span class="badge bg-primary">Aktif</span>';
                                } else {
                                  echo '<span class="badge bg-danger">Suspend</span>';
                                }
                               ?>
                          </td>
                          <td>
                            <form class="" action="<?= base_url('administrasipelanggan/action/reaktivasi')?>" method="post">
                              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Aktifkan Pelanggan" name="ids_arr[]" onclick="return confirm('Yakin ubah data ini?');this.form.submit()" value="<?=$i->akun_pppoe?>" class="btn btn-success" <?php if($find[0]->status_bayar == '1'){ echo 'disabled'; } ?> ><i class="fas fa-check"></i></button>
                            </form>
                          </td>
                        </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              </div>
              <div class="card-footer">
                <div class="">
                  Check All <input id="checkAll" class="checkAll" type="checkbox">
                </div>
                <button class="btn btn-primary" id="prosesSuspend" type="button" name="button">Unsuspend</button>
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
    <!-- /.content -->

    <script>
    $(document).ready(function() {
      var tabel = $('#tabel_1').DataTable({
         'stateSave': true,
      });
      // proses buttons
      var ids_arr = [];
      $('#prosesSuspend').click(function(){
        ids_arr = [];
        var cek = tabel.$(".cheked_check:checked", {"page": "all"});
        if (cek.length == 0){
          alert('belum ada data yang dipilih');
          ids_arr = [];
        } else {
          cek.each(function(index,elem){
              ids_arr.push($(elem).val());
          });
          var confirmdelete = confirm("Yakin Data yang dipilih?");
             if (confirmdelete == true) {
              $.ajax({
                  url: '<?=base_url('administrasipelanggan')?>/action/reaktivasi',
                  type: 'post',
                  data: {ids_arr:ids_arr,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
                  success: function(response){
                     window.location.href = "<?php echo base_url('administrasipelanggan/suspend')?>"
                  }
              });
          }
        }
      });

      // cek all
      $('#checkAll').click(function(){
         if($(this).is(':checked')){
            tabel.$(".cheked_check", {"page": "all"}).prop('checked', true);
         }else{
           tabel.$(".cheked_check", {"page": "all"}).prop('checked', false);
         }
      });

    });
    </script>
