<?php
$url = 'http://localhost/apitest/cek.php';
$json = file_get_contents($url);
echo $json;

$data = json_decode($json, true);

foreach ($data as $k => $v){
echo "<br> ID pelanggan: ". $v['id_pelanggan'];
}
  ?>
