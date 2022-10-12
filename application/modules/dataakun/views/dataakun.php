<?php
if ($this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik'))) {
  $this->routerosapi->write('/tool/user-manager/user/print');
  $alluser = $this->routerosapi->read();
  $this->routerosapi->disconnect();
  $alluser = json_encode($alluser);
  $alluser = json_decode($alluser, true);
  };
  if ($this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik'))) {
    $this->routerosapi->write('/tool/user-manager/profile/print');
    $profile_ppp = $this->routerosapi->read();
    $this->routerosapi->disconnect();
    $profile_ppp = json_encode($profile_ppp);
    $profile_ppp = json_decode($profile_ppp, true);
    };
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Akun</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('datapelanggan'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Data Akun</li>
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
                  <h3 class="card-title">Data Akun</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <a class="btn btn-primary" href="<?=base_url('dataakun/add_user'); ?>">Tambah User</a>
                </div> <br>
                Check All <input id="checkAll" class="checkAll" type="checkbox">
                <div class="">
                  Legend <br>
                  <span class="text-danger">Akun Disabled</span> <span>Akun Enabled</span>
                </div>
                <div class="table-responsive">
                <table id="tabel_akun" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Id</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Profile</th>
                      <th>Ganti Profile</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      if (isset($alluser)) {
                      foreach ($alluser as $key => $i): ?>
                        <tr class="<?php if($i['disabled'] == "true"){echo "text-danger";} ?>">
                          <th><input type='checkbox' class='delete_check' id='delcheck_<?=$i['.id'] ?>?>'  value='<?=$this->enkrip->encrypt($i['.id']) ?>'></th>
                          <td><?= $i['.id']; ?></td>
                          <td><?= $i['username']; ?></td>
                          <td><?= $i['password']; ?></td>
                          <td>
                            <?php if(isset($i['actual-profile'])){ echo $i['actual-profile'];} ?>
                          </td>
                          <td>
                            <form class="" action="<?= base_url('dataakun/user/changeProfile')?>" method="post">
                              <input type="hidden" name="id" value="<?= $i['.id']; ?>">
                              <select class=""  name="val" onchange="this.form.submit()">
                                <option value="">Pilih Profile</option>
                                <?php foreach ($profile_ppp as $key => $a) :?>
                                  <option value="<?=$a['name']?>"><?=$a['name']?></option>
                                <?php endforeach; ?>
                              </select>
                            </form>
                          </td>
                          <td>
                            <a class="btn btn-danger" href="<?= base_url('dataakun').'/user/remove/'.$this->enkrip->encrypt($i['.id']) ?>" onclick="return confirm('Yakin hapus?')"><span class="ion-trash-b"></span></a>
                          </td>
                        </tr>
                      <?php endforeach; }; ?>
                    </tbody>
                  <tfoot>
                    <th></th>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Profile</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-danger" id="deletebluck">Hapus Selected</button>
                <span id="oke_gan"></span>
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

        var table_akun = $('#tabel_akun').DataTable({
           'stateSave': true,
        });
        // Check all
        var deleteids_arr = [];
        $('#deletebluck').click(function(){
          deleteids_arr = [];
          var cek_1 = table_akun.$(".delete_check:checked", {"page": "all"});
          if (cek_1.length == 0){
            alert('Belum ada yang dipilih');
            deleteids_arr = [];
          } else {
          cek_1.each(function(index,elem){
              deleteids_arr.push($(elem).val());
          });
          var confirmdelete = confirm("Do you really want to Delete records?");
           if (confirmdelete == true) {
             $.ajax({
                  url: '<?=base_url()?>dataakun/user/deletebluck',
                  type: 'post',
                  data: {deleteids_arr:deleteids_arr},
                  success: function(response){
                    window.location.reload();
                  }
               });
           }

        }

      });

      // Check all
      $('#checkAll').click(function(){
         if($(this).is(':checked')){
            table_akun.$(".delete_check", {"page": "all"}).prop('checked', true);
         }else{
           table_akun.$(".delete_check", {"page": "all"}).prop('checked', false);
         }
      });

    });

    </script>
