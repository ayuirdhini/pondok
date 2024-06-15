<?php
include("../koneksi.php");
$kecamatan_id = $_GET['kecamatan_id'];
$sql = "SELECT * FROM kelurahan WHERE id_kecamatan = '$kecamatan_id' ORDER BY id_kelurahan ASC";
$result = mysqli_query($koneksi, $sql);
$kelurahan_list = [];
while ($row = mysqli_fetch_assoc($result)) {
    $kelurahan_list[] = $row;
}
echo json_encode($kelurahan_list);
?>
