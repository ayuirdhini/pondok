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

if (isset($_SESSION['santri']) && isset($_SESSION['orang_tua'])) {
    // Ambil data santri dari sesi
    $santri = $_SESSION['santri'];
    
    // Ambil data orang tua dari sesi
    $orang_tua = $_SESSION['orang_tua'];

    // Debugging: Print session data
    // var_dump($santri);
    // var_dump($orang_tua);

    // Ambil data dari array santri
    $id_agama = $santri['id_agama'] ?? '';
    $id_pendidikan = $santri['id_pendidikan'] ?? '';
    $id_tempat = $santri['id_tempat'] ?? '';
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
    $no_pip = $santri['no_pip'] ?? '';
    $alamat = $santri['alamat'] ?? '';
    $provinsi = $santri['provinsi'] ?? '';
    $kota = $santri['kota'] ?? '';
    $kecamatan = $santri['kecamatan'] ?? '';
    $kelurahan = $santri['kelurahan'] ?? '';
    $no_telp_rumah = $santri['no_telp_rumah'] ?? '';
    $kategori_pendaftaran = $santri['kategori_pendaftaran'] ?? '';
    $tanggal_daftar = $santri['tanggal_daftar'] ?? '';

    // Ambil data dari array orang tua
    $nama_ayah = $orang_tua['nama_ayah'] ?? '';
    $status_hidup_ayah = $orang_tua['status_hidup_ayah'] ?? '';
    $nik_ayah = $orang_tua['nik_ayah'] ?? '';
    $pendidikan_ayah = $orang_tua['pendidikan_ayah'] ?? '';
    $pekerjaan_ayah = $orang_tua['pekerjaan_ayah'] ?? '';
    $telp_ayah = $orang_tua['telp_ayah'] ?? '';
    $nama_ibu = $orang_tua['nama_ibu'] ?? '';
    $status_hidup_ibu = $orang_tua['status_hidup_ibu'] ?? '';
    $nik_ibu = $orang_tua['nik_ibu'] ?? '';
    $pendidikan_ibu = $orang_tua['pendidikan_ibu'] ?? '';
    $pekerjaan_ibu = $orang_tua['pekerjaan_ibu'] ?? '';
    $telp_ibu = $orang_tua['telp_ibu'] ?? '';
    $nama_wali = $orang_tua['nama_wali'] ?? '';
    $status_hidup_wali = $orang_tua['status_hidup_wali'] ?? '';
    $nik_wali = $orang_tua['nik_wali'] ?? '';
    $pendidikan_wali = $orang_tua['pendidikan_wali'] ?? '';
    $pekerjaan_wali = $orang_tua['pekerjaan_wali'] ?? '';
    $telp_wali = $orang_tua['telp_wali'] ?? '';

    if ($nama_csantri) {
        $sql1 = "INSERT INTO calon_santri (id_agama, id_pendidikan, id_tempat, id_kew, nama_csantri, tempat_lahir, tanggal_lahir, jenis_kelamin,
        no_telp, hobi, cita_cita, jumlah_saudara, riwayat_penyakit, kepemilikan_pip, no_pip, alamat, provinsi, kota, kecamatan, kelurahan, 
        no_telp_rumah, kategori_pendaftaran, tanggal_daftar, nama_ayah, status_hidup_ayah, nik_ayah, pendidikan_ayah, pekerjaan_ayah, telp_ayah,
        nama_ibu, status_hidup_ibu, nik_ibu, pendidikan_ibu, pekerjaan_ibu, telp_ibu, nama_wali, status_hidup_wali, nik_wali, pendidikan_wali, 
        pekerjaan_wali, telp_wali) 
        VALUES ('$id_agama', '$id_pendidikan', '$id_tempat', '$id_kew', '$nama_csantri', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin',
        '$no_telp', '$hobi', '$cita_cita', '$jumlah_saudara', '$riwayat_penyakit', '$kepemilikan_pip', '$no_pip', '$alamat', '$provinsi', '$kota',
        '$kecamatan', '$kelurahan', '$no_telp_rumah', '$kategori_pendaftaran', '$tanggal_daftar', '$nama_ayah', '$status_hidup_ayah', '$nik_ayah',
        '$pendidikan_ayah', '$pekerjaan_ayah', '$telp_ayah', '$nama_ibu', '$status_hidup_ibu', '$nik_ibu', '$pendidikan_ibu', '$pekerjaan_ibu',
        '$telp_ibu', '$nama_wali', '$status_hidup_wali', '$nik_wali', '$pendidikan_wali', '$pekerjaan_wali', '$telp_wali')";
        
        // Log or echo the SQL query for debugging
        echo $sql1;
        
        $q1 = mysqli_query($koneksi, $sql1);
    
        if ($q1) {
            $sukses = "Berhasil memasukkan data baru";
            echo '<script>window.location="data-santri.php"</script>';
        } else {
            // Output MySQL error
            $eror = "Gagal memasukkan data: " . mysqli_error($koneksi);
            echo $eror;
        }
    } else {
        $eror = "Silahkan masukkan semua data";
        echo $eror;
    }
}
?>
