<?php
session_start();
include("../koneksi.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verify database connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if required session variables are set
if (!isset($_SESSION['santri']) || !isset($_SESSION['orang_tua'])) {
    die("Data santri atau data orang tua tidak ditemukan dalam sesi.");
}

// Ambil data santri dari sesi
$santri = $_SESSION['santri'];
$orang_tua = $_SESSION['orang_tua'];

// Ambil data dari array santri
$id_agama = $santri['id_agama'] ?? '';
$id_pendidikan = $santri['id_pendidikan'] ?? '';
$id_tempat_lahir = $santri['id_tempat_lahir'] ?? '';
$id_kew = $santri['id_kew'] ?? '';
$nama_csantri = $santri['nama_csantri'] ?? '';
$tempat_lahir = $santri['tempat_lahir'] ?? '';
$tanggal_lahir = $santri['tanggal_lahir'] ?? '';
$jenis_kelamin = $santri['jenis_kelamin'] ?? '';
$no_telp = $santri['no_telp'] ?? '';
$hobi = $santri['hobi'] ?? '';
$cita_cita = $santri['cita_cita'] ?? '';
$jumlah_saudara = $santri['jumlah_saudara'] ?? '';
$riwayat_penyakit = $santri['riwayat_penyakit'] ?? '';
$kepemilikan_pip = $santri['kepemilikan_pip'] ?? '';
$nomor_pip = $santri['nomor_pip'] ?? '';
$alamat = $santri['alamat'] ?? '';
$provinsi = $santri['provinsi'] ?? '';
$kota = $santri['kota'] ?? '';
$kecamatan = $santri['kecamatan'] ?? '';
$kelurahan = $santri['kelurahan'] ?? '';
$no_telp_rumah = $santri['no_telp_rumah'] ?? '';
$id_kategori_pendaftaran = $santri['id_kategori_pendaftaran'] ?? '';
$tanggal_daftar = $santri['tanggal_daftar'] ?? '';

// Ambil data dari array orang tua
$nama_ayah = $orang_tua['nama_ayah'] ?? '';
$status_hidup_ayah = $orang_tua['status_hidup_ayah'] ?? '';
$nik_ayah = $orang_tua['nik_ayah'] ?? '';
$id_pendidikan_ayah = $orang_tua['id_pendidikan_ayah'] ?? '';
$pekerjaan_ayah = $orang_tua['pekerjaan_ayah'] ?? '';
$telp_ayah = $orang_tua['telp_ayah'] ?? '';
$nama_ibu = $orang_tua['nama_ibu'] ?? '';
$status_hidup_ibu = $orang_tua['status_hidup_ibu'] ?? '';
$nik_ibu = $orang_tua['nik_ibu'] ?? '';
$id_pendidikan_ibu = $orang_tua['id_pendidikan_ibu'] ?? '';
$pekerjaan_ibu = $orang_tua['pekerjaan_ibu'] ?? '';
$telp_ibu = $orang_tua['telp_ibu'] ?? '';
$nama_wali = $orang_tua['nama_wali'] ?? '';
$status_hidup_wali = $orang_tua['status_hidup_wali'] ?? '';
$nik_wali = $orang_tua['nik_wali'] ?? '';
$id_pendidikan_wali = $orang_tua['id_pendidikan_wali'] ?? '';
$pekerjaan_wali = $orang_tua['pekerjaan_wali'] ?? '';
$telp_wali = $orang_tua['telp_wali'] ?? '';

// Query untuk memasukkan data ke database
$sql1 = "INSERT INTO calon_santri (id_pendidikan, id_agama, id_kew, id_tempat_lahir, nama_csantri, tempat_lahir, tanggal_lahir, jenis_kelamin,
        no_telp, hobi, cita_cita, jumlah_saudara, riwayat_penyakit, kepemilikan_pip, nomor_pip, alamat, provinsi, kota, kecamatan, kelurahan, 
        no_telp_rumah, id_kategori_pendaftaran, tanggal_daftar, nama_ayah, status_hidup_ayah, nik_ayah, id_pendidikan_ayah, pekerjaan_ayah, telp_ayah,
        nama_ibu, status_hidup_ibu, nik_ibu, id_pendidikan_ibu, pekerjaan_ibu, telp_ibu, nama_wali, status_hidup_wali, nik_wali, id_pendidikan_wali, 
        pekerjaan_wali, telp_wali) 
        VALUES ('$id_pendidikan', '$id_agama', '$id_kew', '$id_tempat_lahir', '$nama_csantri', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin',
        '$no_telp', '$hobi', '$cita_cita', '$jumlah_saudara', '$riwayat_penyakit', '$kepemilikan_pip', '$nomor_pip', '$alamat', '$provinsi', '$kota',
        '$kecamatan', '$kelurahan', '$no_telp_rumah', '$id_kategori_pendaftaran', '$tanggal_daftar', '$nama_ayah', '$status_hidup_ayah', '$nik_ayah',
        '$id_pendidikan_ayah', '$pekerjaan_ayah', '$telp_ayah', '$nama_ibu', '$status_hidup_ibu', '$nik_ibu', '$id_pendidikan_ibu', '$pekerjaan_ibu',
        '$telp_ibu', '$nama_wali', '$status_hidup_wali', '$nik_wali', '$id_pendidikan_wali', '$pekerjaan_wali', '$telp_wali')";

// Eksekusi query
$q1 = mysqli_query($koneksi, $sql1);

if ($q1) {
    // Redirect jika berhasil
    header('Location: data-santri.php');
    exit;
} else {
    // Log error jika gagal
    error_log("Gagal memasukkan data: " . mysqli_error($koneksi));
    die("Gagal memasukkan data. Silakan coba lagi.");
}
?>
