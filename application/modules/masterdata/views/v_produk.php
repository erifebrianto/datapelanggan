
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pelanggan</li>
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
                  <h3 class="card-title">Data Pelanggan</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <a class="btn btn-primary" href="<?=base_url('masterdata/produk/input'); ?>">Tambah</a>
                </div>
                <div class="table-responsive">
                <table id="tabel_pelanggan" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th >Nama Paket</th>
                      <th>Profil Paket</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                          $no = 1;
                          foreach($data_pelanggan as $produk){
                      ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $produk->nama_produk ?></td>
                      <td><?php echo $produk->nama_paket ?></td>
                      <td><?php echo $produk->profile ?></td>
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
