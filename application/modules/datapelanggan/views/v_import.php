<html>
<head>
	<title>Form Import</title>

	<!-- Load File jquery.min.js yang ada difolder js -->
</head>
<body>
<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
<div class="contents">
    <div class="row">
      <div class="col-md-12">
<div class="card md-card-import">
  <div class="card-import">
    <div class="y-scroll">
<?php
if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
  if(isset($upload_error)){ // Jika proses upload gagal
    echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
    die; // stop skrip
  }

  // Buat sebuah tag form untuk proses import data ke database
  echo "<form method='post' action='".base_url("/datapelanggan/import")."'>";
  // Buat sebuah div untuk alert validasi kosong
  echo "<div style='color: red;' id='kosong'>
  Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
  </div>";

  echo "<table border='1' cellpadding='8' class='table-responsive'>
  <tr>
    <th colspan='14'>Preview Data</th>
  </tr>
  <tr>
    <th >ID Pelanggan</th>
    <th >Nama Pelanggan</th>
    <th >Alamat</th>
    <th >No HP</th>
    <th >Email</th>
    <th >Pekerjaan</th>
  </tr>";

  $numrow = 1;
  $kosong = 0;

  // Lakukan perulangan dari data yang ada di excel
  // $sheet adalah variabel yang dikirim dari controller
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom

    //
    $id_data_pelanggan = $row['A'];
    $nama_pelanggan = $row['B'];
    $alamat = $row['C'];
    $no_kontak = $row['D'];
    $email = $row['E'];
    $pekerjaan = $row['F'];

    // Cek jika semua data tidak diisi
    if(empty($id_data_pelanggan) && empty($nama_pelanggan) && empty($tempat_lahir) && empty($tanggal_lahir) && empty($no_kontak) && empty($email) && empty($nik) && empty($tanggal_lahir) && empty($pekerjaan))
      continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

    // Cek $numrow apakah lebih dari 1
    // Artinya karena baris pertama adalah nama-nama kolom
    // Jadi dilewat saja, tidak usah diimport
    if($numrow > 1){
    // Validasi apakah semua data telah diisi
      $id_data_pelanggan_td = ( ! empty($id_data_pelanggan))? "" : " style='background: #E07171;'";
      $nama_pelanggan_td = ( ! empty($nama_pelanggan))? "" : " style='background: #E07171;'";
      $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'";
      $no_kontak_td = ( ! empty($no_kontak))? "" : " style='background: #E07171;'";
      $email_td = ( ! empty($email))? "" : " style='background: #E07171;'";
      $pekerjaan_td = ( ! empty($pekerjaan))? "" : " style='background: #E07171;'";

      // Jika salah satu data ada yang kosong
      if(empty($id_data_pelanggan) or empty($nama_pelanggan) or empty($tempat_lahir) or empty($tanggal_lahir) or empty($no_kontak) or empty($email) or empty($tempat_lahir) or empty($tanggal_lahir) or empty($pekerjaan)){
        $kosong++; // Tambah 1 variabel $kosong
      }

      echo "<tr>";
      echo "<td".$id_data_pelanggan_td.">".$id_data_pelanggan."</td>";
      echo "<td".$nama_pelanggan_td.">".$nama_pelanggan."</td>";
      echo "<td".$alamat_td.">".$alamat."</td>";
      echo "<td".$no_kontak_td.">".$no_kontak."</td>";
      echo "<td".$email_td.">".$email."</td>";
      echo "<td".$pekerjaan_td.">".$pekerjaan."</td>";
      echo "</tr>";
    }

    $numrow++; // Tambah 1 setiap kali looping
  }

  echo "</table>";

  // Cek apakah variabel kosong lebih dari 0
  // Jika lebih dari 0, berarti ada data yang masih kosong
  if($kosong > 0){
  ?>
	<script>
	$("#kosong").show();
	</script>
  <?php
  }else{ // Jika semua data sudah diisi
		?>
		<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		</script>
		<?php
    echo "<hr>";
    // Buat sebuah tombol untuk mengimport data ke database
    echo "<button type='submit' name='import' class='btn btn-primary btn-sm'>Import</button>";
    echo "<a href='".base_url("/datapelanggan")."'><button type='button' class='btn btn-danger btn-sm'>Cancel</buton></a>";
  }

  echo "</form>";
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
