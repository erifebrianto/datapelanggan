<?php
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
            <h1 class="m-0">Input Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Input Pelanggan</li>
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
                <h3 class="card-title">Input Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?php echo base_url(). 'masterdata/produk/simpanData'; ?>" method="post">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket" placeholder="Masukan Nama Paket">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Profil</label>
                        <select class="form-control"  name="profile">
                          <option value="">Pilih Profile</option>
                          <?php foreach ($profile_ppp as $key => $a) :?>
                            <option value="<?=$a['name']?>"><?=$a['name']?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jenis Produk</label>
                        <select name="id_jenis_produk" class="form-control">
                        <?php foreach ($kategori_produk as $produk): ?>
                                <option value="<?php echo $produk->id ?>"><?php echo $produk->nama_produk ?></option>
                            <?php endforeach; ?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>No Kontak</label>
                        <input type="number" class="form-control" name="no_kontak" placeholder="Masukan No Kontak">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tgllahir" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Input PPPOE</label>
                        <input type="text" class="form-control" name="akun_pppoe" placeholder="Masukan Akun PPPOE">
                      </div>
                    </div>
                  </div> -->
                  <div class="card-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                </form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
