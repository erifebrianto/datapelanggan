                <div class="">
                <a href="#" class="alert-link" onclick="index()">Kembali</a>
                  <p>
                  ID Pelanggan: <b><?=$layanan[0]->id_data_pelanggan?></b> <br>
                  Nama Pelanggan: <b><?=$layanan[0]->nama_pelanggan?></b>  <br>
                  Paket Produk: <b><?=$layanan[0]->nama_paket?> </b> <br>
                  Alamat: <b><?=$layanan[0]->alamat?></b></p>
                </div>
                <br>
                <div class="table-responsive">
                <table id="tabel_pelanggan" class="table table-bordered table-hover" width=100%>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Status bayar</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                          $no = 1;
                          foreach($layanan as $r){
                      ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo date_format(date_create($r->tanggal_bayar), "d/m/Y"); ?></td>
                      <td>
                      <?php
                      if ($r->status_bayar == '1'){
                        echo '<span class="badge bg-success">Sudah Bayar</span>';
                      } else {
                        echo '<span class="badge bg-danger">Belum Bayar</span>';
                      }
                      ?>
                      </td>
                      </tr>
                      <?php }?>
                  </tbody>
                </table>


    <script type="text/javascript">

    $(document).ready(function(){

    $("#sinkron").click(function(){
      $("#hasil").html('Silahkan Tunggu');
        $.ajax({
          url: '<?php echo base_url('/cron/action/sinkrondata/').$this->security->get_csrf_hash()?>',
          type: "GET",
          success: function(response){
              $("#hasil").html(response);
          }
        });

        });

    });
    </script>
    <!-- Modal -->
    <!-- /.content -->
