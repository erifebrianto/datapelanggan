
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
                <form action="<?php echo base_url(). 'datalayanan/input/simpanData'; ?>" method="post">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Akun PPPOE</label>
                        <input type="text" class="form-control" name="akun_pppoe" placeholder="Masukan Nama PPPOE">
                      </div>
                    </div>
                    <!-- <div class="col-sm-6">
                      <div class="form-group">
                        <label>Profil</label>
                        <input type="text" class="form-control" name="profile" placeholder="Masukan Profil">
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <select name="id_pelanggan" class="form-control">
                        <?php foreach ($pelanggan as $data2): ?>
                                <option value="<?php echo $data2->id ?>"><?php echo $data2->nama_pelanggan ?></option>
                            <?php endforeach; ?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Paket Produk</label>
                        <select name="id_paket_produk" class="form-control">
                        <?php foreach ($paket_produk as $data1): ?>
                                <option value="<?php echo $data1->id_produk ?>"><?php echo $data1->nama_paket ?></option>
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
                    <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
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
