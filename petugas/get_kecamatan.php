<?php
include("../koneksi.php");
$kota_id = $_GET['kota_id'];
$sql = "SELECT * FROM kecamatan WHERE id_kota = '$kota_id' ORDER BY id_kecamatan ASC";
$result = mysqli_query($koneksi, $sql);
$kecamatan_list = [];
while ($row = mysqli_fetch_assoc($result)) {
    $kecamatan_list[] = $row;
}
echo json_encode($kecamatan_list);
?>
