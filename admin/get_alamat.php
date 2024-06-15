<?php
include("../koneksi.php");

if (isset($_GET['provinsi_id'])) {
    $provinsi_id = $_GET['provinsi_id'];
    $sql = "SELECT * FROM kota WHERE id_prov = '$provinsi_id' ORDER BY id_kota ASC";
    $result = mysqli_query($koneksi, $sql);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $kota_list = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kota_list[] = $row;
    }
    echo json_encode($kota_list);
}

if (isset($_GET['kota_id'])) {
    $kota_id = $_GET['kota_id'];
    $sql = "SELECT * FROM kecamatan WHERE id_kota = '$kota_id' ORDER BY id_kecamatan ASC";
    $result = mysqli_query($koneksi, $sql);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $kecamatan_list = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kecamatan_list[] = $row;
    }
    echo json_encode($kecamatan_list);
}
?>
