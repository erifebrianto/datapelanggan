
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Log</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Log</li>
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
                <div class="d-flex">
                  <div class="col">
                      <h3 class="card-title">log</h3>
                  </div>
                  <div class="d-flex ms-auto">
                    <a href=""> <i class="fas fa-redo"></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                </div>
                <div class="table-responsive">
                <table id="tabel_log" class="table table-bordered table-hover">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Message</th>
                      <th>Waktu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                          $no = 1;
                          foreach($tabel_log as $log){
                      ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $log->log ?></td>
                      <td><?php echo $log->waktu ?></td>
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
