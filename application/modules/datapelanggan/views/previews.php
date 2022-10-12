<?php
$upload = $this->M_dapel->upload_file('file');
if($upload['result'] == "success"){
  include APPPATH.'third_party/PHPExcel/PHPExcel.php';
  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('upload/excel/file_import.xlsx');
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
};
if($upload['result'] == "failed"){ // Jika proses upload gagal
  echo "<div style='color: red;'>".$upload['error']."</div>"; // Muncul pesan error upload
} else {
?>
  <div style="color: red;" id="kosong">
    Ada <span id="jumlah_kosong"></span> data yang belum diisi
  </div>
  <br>
  <div class="table-responsive">
  <table id="tabel_preview" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th >ID Pelanggan</th>
        <th >Nama Pelanggan</th>       
        <th >Alamat</th>
        <th >No HP</th>
        <th >Email</th>
        <th >Pekerjaan</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $numrow = 1;
    $kosong = 0;

    foreach($sheet as $row){
      $id_data_pelanggan = $row['A'];
      $nama_pelanggan = $row['B'];
      $alamat = $row['C'];
      $no_kontak = $row['D'];
      $email = $row['E'];
      $pekerjaan = $row['F'];

      if(empty($id_data_pelanggan) && empty($nama_pelanggan) && empty($tempat_lahir) && empty($tanggal_lahir) && empty($no_kontak) && empty($email) && empty($nik) && empty($tanggal_lahir) && empty($pekerjaan)){
        continue;
      }

        if($numrow > 1){
        // Validasi apakah semua data telah diisi
          $id_data_pelanggan_td = ( ! empty($id_data_pelanggan))? "" : " style='background: #E07171;'";
          $nama_pelanggan_td = ( ! empty($nama_pelanggan))? "" : " style='background: #E07171;'";          
          $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'";
          $no_kontak_td = ( ! empty($no_kontak))? "" : " style='background: #E07171;'";
          $email_td = ( ! empty($email))? "" : " style='background: #E07171;'";        
          $pekerjaan_td = ( ! empty($pekerjaan))? "" : " style='background: #E07171;'";

          // Jika salah satu data ada yang kosong
          if(empty($id_data_pelanggan) or empty($nama_pelanggan) or empty($tempat_lahir) or empty($tanggal_lahir) or empty($no_kontak) or empty($email) or empty($tempat_lahir) or empty($tanggal_lahir) or empty($pekerjaan))
          {
            $kosong++; // Tambah 1 variabel $kosong
          }
          ?>

          <?php
          echo "<tr>";
          echo "<td".$id_data_pelanggan_td.">".$id_data_pelanggan."</td>";
          echo "<td".$nama_pelanggan_td.">".$nama_pelanggan."</td>";          
          echo "<td".$alamat_td.">".$alamat."</td>";
          echo "<td".$no_kontak_td.">".$no_kontak."</td>";
          echo "<td".$email_td.">".$email."</td>";
          echo "<td".$pekerjaan_td.">".$pekerjaan."</td>";
          echo "</tr>";
        }
          $numrow++;
    }
     ?>
 </tbody>
</table>
</div>
<?php
if($kosong > 0){
  ?>
  <script>
  $("#jumlah_kosong").html(<?=$kosong?>)
  $("#kosong").show();
  </script>
  <?php
} else {
?>
<script>
  $("#kosong").hide();
</script>
<br>
<div>
  <form method="post" action="<?=base_url("/datapelanggan/import")?>">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
    <button type="submit" name="import" class="btn btn-primary btn-sm">Import</button>
    <a href="<?=base_url("/datapelanggan")?>" type="button" name="button" class="btn btn-danger btn-sm">Batal</a>
  </form>
</div>
<?php
}
}
?>

<script>
$(document).ready(function() {
  $('#tabel_preview').DataTable({
    'stateSave': true,
  });
});
</script>
