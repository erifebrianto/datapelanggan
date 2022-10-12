
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
              <li class="breadcrumb-item active">Data layanan</li>
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
                  <h3 class="card-title">Data layanan</h3>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <div class="col">
                    <div class="form-group">
                      <a class="btn btn-primary" href="<?=base_url('datalayanan/input'); ?>">Tambah</a>
                    </div>
                  </div>
                  <div class="d-flex ms-auto">

                  </div>
                </div>
                <div class="table-responsive">
                <table id="tabel_pelanggan" class="table table-bordered table-hover">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Pelanggan</th>
                      <th>Nomor Layanan</th>
                      <th>Nama Pelanggan</th>
                      <th>Akun PPPOE</th>
                      <th>Paket Berlangganan</th>
                      <th>Status Pelanggan</th>
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
                      <td><?php echo $r->nomor_layanan ?></td>
                      <td><?php echo $r->nama_pelanggan ?></td>
                      <td><?php echo $r->akun_pppoe ?></td>
                      <td><?php echo $r->nama_paket ?></td>
                      <td><?php echo $r->status_pelanggan ?></td>
                    </tr>
                      <?php }?>
                  </tbody>
                </table>
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
