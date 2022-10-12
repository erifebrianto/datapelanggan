
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
                <!-- info -->
                <?php
                if($this->session->flashdata('no')){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Upss!</strong> <?=$this->session->flashdata('no')?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <?php
                    }
                  ?>
                <!-- end info -->
                <div class="form-group">
                  <a class="btn btn-primary" href="<?=base_url('datapelanggan/input'); ?>">Tambah</a>
                  <a class="btn btn-primary" href="<?=base_url('datapelanggan/imports'); ?>">Import</a>
                </div>
                <div class="table-responsive">
                <table id="tabel_pelanggan" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Pelanggan</th>
                      <th >Nama Pelanggan</th>
                      <th>Alamat Email</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                          $no = 1;
                          foreach($data_pelanggan as $pelanggan){
                      ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $pelanggan->id_data_pelanggan ?></td>
                      <td><?php echo $pelanggan->nama_pelanggan ?></td>
                      <td><?php echo $pelanggan->email ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm"data-toggle="modal" data-target="#exampleModal<?php echo $pelanggan->id ?>">
                          <i class="fas fa-plus"></i> Detail
                        </a>
                      </td>
                    </tr>


                    <div class="modal fade" id="exampleModal<?php echo $pelanggan->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Pelanggan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row form-group" >
                                <div class="col col-md-6 modal-judul"><label class=" form-control-label">Nama Siswa</label></div>
                                <div class="col-6 col-md-6">: <?php echo $pelanggan->nama_pelanggan;?></div>
                            </div>
                            <div class="row form-group" >
                                <div class="col col-md-6 modal-judul"><label class=" form-control-label">ID Pelanggan</label></div>
                                <div class="col-6 col-md-6">: <?php echo $pelanggan->id_data_pelanggan;?></div>
                            </div>
                            <div class="row form-group" >
                                <div class="col col-md-6 modal-judul"><label class=" form-control-label">NIK</label></div>
                                <div class="col-6 col-md-6">: <?php echo $pelanggan->nik;?></div>
                            </div>
                            <div class="row form-group" >
                                <div class="col col-md-6 modal-judul"><label class=" form-control-label">Alamat</label></div>
                                <div class="col-6 col-md-6">: <?php echo $pelanggan->alamat;?></div>
                            </div>
                            <div class="row form-group" >
                                <div class="col col-md-6 modal-judul"><label class=" form-control-label">NO Kontak</label></div>
                                <div class="col-6 col-md-6">: <?php echo $pelanggan->no_kontak;?></div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
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
