
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Jumlah Pelanggan</span>
          <span class="info-box-number"><?= $total_pelanggan ?></span>
          </div>

          </div>

          </div>

          <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
          <span class="info-box-icon bg-secondary"><i class="far fa-clock"></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Uptime</span>
          <span class="info-box-number"><?= $uptime ?></span>
          </div>

          </div>

          </div>

          <div onclick="location.href='<?= base_url('administrasipelanggan/suspend')?>'" class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
          <span class="info-box-icon bg-danger"><i class="fas fa-user-slash"></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Pelanggan Suspend</span>
          <span class="info-box-number"><?=$pelanggan_suspend?></span>
          </div>

          </div>

          </div>

          <div onclick="location.href='<?= base_url('administrasipelanggan/reaktivasi')?>'" class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fas fa-user"></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Pelanggan Aktif</span>
          <span class="info-box-number"><?=$pelanggan_aktif?></span>
          </div>

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
