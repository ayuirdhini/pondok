<?php
include("../koneksi.php");
$provinsi_id = $_GET['provinsi_id'];
$sql = "SELECT * FROM kota WHERE id_prov = '$provinsi_id' ORDER BY id_kota ASC";
$result = mysqli_query($koneksi, $sql);
$kota_list = [];
while ($row = mysqli_fetch_assoc($result)) {
    $kota_list[] = $row;
}
echo json_encode($kota_list);
?>
