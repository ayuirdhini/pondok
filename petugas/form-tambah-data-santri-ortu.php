<?php
session_start(); // Mulai session

// Proses pengisian data orang tua
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil semua data dari form
    $nama_ayah = $_POST['nama_ayah'];
    $status_hidup_ayah = $_POST['status_hidup_ayah'];
    $nik_ayah = $_POST['nik_ayah'];
    $id_pendidikan_ayah = $_POST['id_pendidikan_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $telp_ayah = $_POST['telp_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $status_hidup_ibu = $_POST['status_hidup_ibu'];
    $nik_ibu = $_POST['nik_ibu'];
    $id_pendidikan_ibu = $_POST['id_pendidikan_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $telp_ibu = $_POST['telp_ibu'];
    $nama_wali = $_POST['nama_wali'];
    $status_hidup_wali = $_POST['status_hidup_wali'];
    $nik_wali = $_POST['nik_wali'];
    $id_pendidikan_wali = $_POST['id_pendidikan_wali'];
    $pekerjaan_wali = $_POST['pekerjaan_wali'];
    $telp_wali = $_POST['telp_wali'];

    // Simpan data orang tua ke dalam session
    $_SESSION['orang_tua'] = [
        'nama_ayah' => $nama_ayah,
        'status_hidup_ayah' => $status_hidup_ayah,
        'nik_ayah' => $nik_ayah,
        'id_pendidikan_ayah' => $id_pendidikan_ayah,
        'pekerjaan_ayah' => $pekerjaan_ayah,
        'telp_ayah' => $telp_ayah,
        'nama_ibu' => $nama_ibu,
        'status_hidup_ibu' => $status_hidup_ibu,
        'nik_ibu' => $nik_ibu,
        'id_pendidikan_ibu' => $id_pendidikan_ibu,
        'pekerjaan_ibu' => $pekerjaan_ibu,
        'telp_ibu' => $telp_ibu,
        'nama_wali' => $nama_wali,
        'status_hidup_wali' => $status_hidup_wali,
        'nik_wali' => $nik_wali,
        'id_pendidikan_wali' => $id_pendidikan_wali,
        'pekerjaan_wali' => $pekerjaan_wali,
        'telp_wali' => $telp_wali
    ];

    // Redirect ke halaman untuk memproses data
    header("Location: simpan-data-santri.php");
    exit();
}

include("../src/template/head-petugas.php");
include("../koneksi.php");
?>
<!-- Isi form HTML untuk data orang tua -->



<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Formulir Penambahan Data Santri</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="data-santri.php">Calon Santri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Formulir Penambahan Data Santri
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Informasi Orang Tua Calon Santri</h3>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="simpan-data-santri.php">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h5>Data Ayah Kandung</h5>
                                                        <div class="form-group">
                                                            <label>Nama Ayah Kandung:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nama Ayah Kandung" name="nama_ayah">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status Hidup:</label>
                                                            <div>
                                                                <input type="radio" id="ayah_hidup" name="status_hidup_ayah" value="Hidup">
                                                                <label for="ayah_hidup">Hidup</label>
                                                                <input type="radio" id="ayah_meninggal" name="status_hidup_ayah" value="Meninggal">
                                                                <label for="ayah_meninggal">Meninggal</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NIK/Nomor KTP:</label>
                                                            <input type="text" class="form-control" name="nik_ayah">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_pendidikan_ayah">Pendidikan Terakhir:</label>
                                                            <select class="form-control" id="id_pendidikan_ayah" name="id_pendidikan_ayah">
                                                                <option value="">-- Pilih Pendidikan Terakhir --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM pendidikan ORDER BY id_pendidikan asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_pendidikan'] . '">' . $r['jenjang_pendidikan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pekerjaan:</label>
                                                            <input type="text" class="form-control" name="pekerjaan_ayah">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Telpon:</label>
                                                            <input type="text" class="form-control" name="telp_ayah">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h5>Data Wali Santri (apabila yang bertanggung jawab bukan orang tua)</h5>
                                                        <div class="form-group">
                                                            <label>Nama Wali Santri:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nama Wali Santri" name="nama_wali">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status Hidup:</label>
                                                            <div>
                                                                <input type="radio" id="wali_hidup" name="status_hidup_wali" value="Hidup">
                                                                <label for="wali_hidup">Hidup</label>
                                                                <input type="radio" id="wali_meninggal" name="status_hidup_wali" value="Meninggal">
                                                                <label for="wali_meninggal">Meninggal</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NIK/Nomor KTP:</label>
                                                            <input type="text" class="form-control" name="nik_wali">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_pendidikan_wali">Pendidikan Terakhir:</label>
                                                            <select class="form-control" id="id_pendidikan_wali" name="id_pendidikan_wali">
                                                                <option value="">-- Pilih Pendidikan Terakhir --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM pendidikan ORDER BY id_pendidikan asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_pendidikan'] . '">' . $r['jenjang_pendidikan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pekerjaan:</label>
                                                            <input type="text" class="form-control" name="pekerjaan_wali">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Telpon:</label>
                                                            <input type="text" class="form-control" name="telp_wali">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h5>Data Ibu Kandung</h5>
                                                        <div class="form-group">
                                                            <label>Nama Ibu Kandung:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nama Ibu Kandung" name="nama_ibu">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status Hidup:</label>
                                                            <div>
                                                                <input type="radio" id="ibu_hidup" name="status_hidup_ibu" value="Hidup">
                                                                <label for="ibu_hidup">Hidup</label>
                                                                <input type="radio" id="ibu_meninggal" name="status_hidup_ibu" value="Meninggal">
                                                                <label for="ibu_meninggal">Meninggal</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NIK/Nomor KTP:</label>
                                                            <input type="text" class="form-control" name="nik_ibu">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_pendidikan_ibu">Pendidikan Terakhir:</label>
                                                            <select class="form-control" id="id_pendidikan_ibu" name="id_pendidikan_ibu">
                                                                <option value="">-- Pilih Pendidikan Terakhir --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM pendidikan ORDER BY id_pendidikan asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_pendidikan'] . '">' . $r['jenjang_pendidikan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pekerjaan:</label>
                                                            <input type="text" class="form-control" name="pekerjaan_ibu">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Telpon:</label>
                                                            <input type="text" class="form-control" name="telp_ibu">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="form-tambah-data-santri.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                                        </div>
                                                        <?php
                                                        if (isset($_SESSION['santri']) && is_array($_SESSION['santri'])) {
                                                            foreach ($_SESSION['santri'] as $key => $value) {
                                                                echo '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '">';
                                                            }
                                                        }
                                                        ?>
                                                        <div class="col text-end">
                                                            <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
<?php
include("../src/template/footer.php");
?>
