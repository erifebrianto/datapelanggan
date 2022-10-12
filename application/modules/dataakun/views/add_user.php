
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Pengguna</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tambah Pengguna</h3>
          </div>
          <div class="card-body">
            <form class="form-horizontal" name="frmtambah" method="post" action="<?= base_url('dataakun/user/add'); ?>">
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Username</label>
                    <input class="form-control" style="width:100%" type="text" name="username" id="username" placeholder="username" value="<?php if (isset($default['name'])) { echo $default['name']; } ?>">
                </div>
                <label>Password</label>
                <div class="form-group">
                  <input class="form-control" type="text" name="password" id="password" placeholder="Password" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama/Komen (opsional)</label>
                    <input class="form-control" type="text" name="comment" id="comment" placeholder="Nama/Komen (opsional)">
                </div>
                <div class="form-group">
                  <label>Profile</label>
                  <div>
                    <select name="profile" id="profile" class="form-control">
                      <?php
                      $this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik'));
                      $this->routerosapi->write('/tool/user-manager/profile/print');
                      $profprint = $this->routerosapi->read();
                      $this->routerosapi->disconnect();
                      $profprint = json_encode($profprint);
                      $profprint = json_decode($profprint, true);
                      foreach ($profprint as $key => $i) {?>
                        <option value="<?= $i['name'] ?>"><?= $i['name'] ?></option>
                      <?php
                      }
                       ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form-group">
              <div class="col-md-offset-2 col-md-10">
                <button class="btn btn-primary" type="submit" name="add">Simpan</button>
                </form>
                <a class="btn btn-default" href="<?php echo base_url().'dataakun'; ?>">Batal</a>
              </div>
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
