
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
                <form action="<?php echo base_url(). 'datapelanggan/save_data'; ?>" method="post">
                  <div class="row">
                    <div class="col-sm-6">                  
                      <div class="form-group">
                        <label>ID Pelanggan</label>
                        <input type="text" class="form-control" name="id_data_pelanggan" placeholder="Masukan ID Pelanggan">
                      </div>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-sm-6">                  
                      <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukan Nama ">
                      </div>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-sm-6">                  
                      <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea type="text" class="form-control" name="alamat" placeholder="Masukan Alamat "></textarea>
                      </div>
                    </div>                    
                  </div>  
                  <div class="row">
                    <div class="col-sm-6">                  
                      <div class="form-group">
                        <label>Nomer HP</label>
                        <input type="text" class="form-control" name="no_kontak" placeholder="Masukan NO HP ">
                      </div>
                    </div>                    
                  </div>  
                  <div class="row">
                    <div class="col-sm-6">                  
                      <div class="form-group">
                        <label>Alamat Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email">
                      </div>
                    </div>                    
                  </div>     
                  <div class="row">
                    <div class="col-sm-6">                  
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" placeholder="Masukan Pekerjaan">
                      </div>
                    </div>                    
                  </div>               
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
