

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah</h1>
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
                  <h3 class="card-title">Tambah Data</h3>
              </div>
              <div class="card-body">
                <div class="">
                  <p>Silahkan Check data yang akan dipilih</p>
                  Check All <input id="checkAll" class="checkAll" type="checkbox">
                </div>
                <div class="table-responsive">
                <table id="tabel1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="col-1">#</th>
                      <th>ID Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>PPPoE</th>
                      <th>Layanan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($data_pelanggan as $i) { ?>
                        <tr>
                          <td><input class="cheked_check" type="checkbox" name="" value="<?= $i['akun_pppoe']?>"></td>
                          <td><?= $i['id_data_pelanggan']?></td>
                          <td><?= $i['nama_pelanggan']?></td>
                          <td><?= $i['akun_pppoe']?></td>
                          <td><?= $i['nama_paket']?></td>
                          <td>
                            <?php
                              if ($i['status_suspend'] == '0'){
                                echo '<span class="badge bg-primary">Aktif</span>';
                              } else {
                                echo '<span class="badge bg-danger">Suspend</span>';
                              }
                             ?>
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
                <button class="btn btn-primary" id="prosesSuspend" type="button" name="button">Submit</button>
              </div>
            </div>
            <a href="#" id="cek_gan"></a>
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
        var tabel = $('#tabel1').DataTable({
           'stateSave': true,
        });
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
                    url: '<?=base_url('administrasipelanggan')?>/action/<?=$action?>',
                    type: 'post',
                    data: {ids_arr:ids_arr,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
                    success: function(response){
                       window.location.href = "<?php echo base_url('administrasipelanggan/').$action;?>"
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
