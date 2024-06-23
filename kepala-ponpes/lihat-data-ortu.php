<?php
include("../src/template/head-petugas.php");
include("../koneksi.php");

$id_csantri = "";
$nama_ayah = "";
$status_hidup_ayah = "";
$nik_ayah = "";
$id_pendidikan_ayah = "";
$pekerjaan_ayah = "";
$telp_ayah = "";
$nama_ibu = "";
$status_hidup_ibu = "";
$nik_ibu = "";
$id_pendidikan_ibu = "";
$pekerjaan_ibu = "";
$telp_ibu = "";
$nama_wali = "";
$status_hidup_wali = "";
$nik_wali = "";
$id_pendidikan_wali = "";
$pekerjaan_wali = "";
$telp_wali = "";
$error = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    if (isset($_GET['id_csantri'])) {
        $id_csantri = $_GET['id_csantri'];
        $sql1 = "SELECT * FROM calon_santri WHERE id_csantri = ?";
        $stmt1 = $koneksi->prepare($sql1);
        $stmt1->bind_param("i", $id_csantri);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $r1 = $result1->fetch_assoc();
        
        if ($r1) {
            $id_csantri = $r1['id_csantri'];
            $nama_ayah = $r1['nama_ayah'];
            $status_hidup_ayah = $r1['status_hidup_ayah'];
            $nik_ayah = $r1['nik_ayah'];
            $id_pendidikan_ayah = $r1['id_pendidikan_ayah'];
            $pekerjaan_ayah = $r1['pekerjaan_ayah'];
            $telp_ayah = $r1['telp_ayah'];
            $nama_ibu = $r1['nama_ibu'];
            $status_hidup_ibu = $r1['status_hidup_ibu'];
            $nik_ibu = $r1['nik_ibu'];
            $id_pendidikan_ibu = $r1['id_pendidikan_ibu'];
            $pekerjaan_ibu = $r1['pekerjaan_ibu'];
            $telp_ibu = $r1['telp_ibu'];
            $nama_wali = $r1['nama_wali'];
            $status_hidup_wali = $r1['status_hidup_wali'];
            $alamat = $r1['alamat'];
            $nik_wali = $r1['nik_wali'];
            $id_pendidikan_wali = $r1['id_pendidikan_wali'];
            $pekerjaan_wali = $r1['pekerjaan_wali'];
            $telp_wali = $r1['telp_wali'];
        } else {
            $error = "Data tidak ditemukan";
        }
        $stmt1->close();
    } else {
        $error = "ID Calon Santri tidak ditemukan";
    }
}
?>


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
                                                            <input type="text" class="form-control" placeholder="Masukkan Nama Ayah Kandung" name="nama_ayah" value="<?php echo htmlspecialchars($nama_ayah); ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status Hidup:</label>
                                                            <div>
                                                                <input type="radio" id="ayah_hidup" name="status_hidup_ayah" value="Hidup" <?php if ($status_hidup_ayah == 'Hidup') echo 'checked'; ?>>
                                                                <label for="ayah_hidup">Hidup</label>
                                                                <input type="radio" id="ayah_meninggal" name="status_hidup_ayah" value="Meninggal" <?php if ($status_hidup_ayah == 'Meninggal') echo 'checked'; ?>>
                                                                <label for="ayah_meninggal">Meninggal</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NIK/Nomor KTP:</label>
                                                            <input type="text" class="form-control" name="nik_ayah" value="<?php echo htmlspecialchars($nik_ayah); ?>"disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_pendidikan_ayah">Pendidikan Terakhir:</label>
                                                            <select class="form-control" id="id_pendidikan_ayah" name="id_pendidikan_ayah" disabled>
                                                                
                                                                <?php
                                                                $sql = "SELECT * FROM pendidikan ORDER BY id_pendidikan asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    $selected = ($r['id_pendidikan'] == $id_pendidikan_ayah) ? 'selected' : '';
                                                                    echo '<option value="' . $r['id_pendidikan'] . '" ' . $selected . '>' . $r['jenjang_pendidikan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pekerjaan:</label>
                                                            <input type="text" class="form-control" name="pekerjaan_ayah" value="<?php echo htmlspecialchars($pekerjaan_ayah); ?>"disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Telpon:</label>
                                                            <input type="text" class="form-control" name="telp_ayah" value="<?php echo htmlspecialchars($telp_ayah); ?>"disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h5>Data Wali Santri (apabila yang bertanggung jawab bukan orang tua)</h5>
                                                        <div class="form-group">
                                                            <label>Nama Wali Santri:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nama Wali Santri" name="nama_wali" value="<?php echo htmlspecialchars($nama_wali); ?>"disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status Hidup:</label>
                                                            <div>
                                                                <input type="radio" id="wali_hidup" name="status_hidup_wali" value="Hidup" <?php if ($status_hidup_wali == 'Hidup') echo 'checked'; ?>>
                                                                <label for="wali_hidup">Hidup</label>
                                                                <input type="radio" id="wali_meninggal" name="status_hidup_wali" value="Meninggal" <?php if ($status_hidup_wali == 'Meninggal') echo 'checked'; ?>>
                                                                <label for="wali_meninggal">Meninggal</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NIK/Nomor KTP:</label>
                                                            <input type="text" class="form-control" name="nik_wali" value="<?php echo htmlspecialchars($nik_wali); ?>"disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_pendidikan_wali">Pendidikan Terakhir:</label>
                                                            <select class="form-control" id="id_pendidikan_wali" name="id_pendidikan_wali" disabled>
                                                                <?php
                                                                $sql = "SELECT * FROM pendidikan ORDER BY id_pendidikan asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    $selected = ($r['id_pendidikan'] == $id_pendidikan_wali) ? 'selected' : '';
                                                                    echo '<option value="' . $r['id_pendidikan'] . '" ' . $selected . '>' . $r['jenjang_pendidikan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pekerjaan:</label>
                                                            <input type="text" class="form-control" name="pekerjaan_wali" value="<?php echo htmlspecialchars($pekerjaan_wali); ?>"disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Telpon:</label>
                                                            <input type="text" class="form-control" name="telp_wali" value="<?php echo htmlspecialchars($telp_wali); ?>"disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h5>Data Ibu Kandung</h5>
                                                        <div class="form-group">
                                                            <label>Nama Ibu Kandung:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nama Ibu Kandung" name="nama_ibu" value="<?php echo htmlspecialchars($nama_ibu); ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status Hidup:</label>
                                                            <div>
                                                                <input type="radio" id="ibu_hidup" name="status_hidup_ibu" value="Hidup" <?php if ($status_hidup_ibu == 'Hidup') echo 'checked'; ?>>
                                                                <label for="ibu_hidup">Hidup</label>
                                                                <input type="radio" id="ibu_meninggal" name="status_hidup_ibu" value="Meninggal" <?php if ($status_hidup_ibu == 'Meninggal') echo 'checked'; ?>>
                                                                <label for="ibu_meninggal">Meninggal</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NIK/Nomor KTP:</label>
                                                            <input type="text" class="form-control" name="nik_ibu" value="<?php echo htmlspecialchars($nik_ibu); ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_pendidikan_ibu">Pendidikan Terakhir:</label>
                                                            <select class="form-control" id="id_pendidikan_ibu" name="id_pendidikan_ibu" disabled>
                                                                
                                                                <?php
                                                                $sql = "SELECT * FROM pendidikan ORDER BY id_pendidikan asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    $selected = ($r['id_pendidikan'] == $id_pendidikan_ibu) ? 'selected' : '';
                                                                    echo '<option value="' . $r['id_pendidikan'] . '" ' . $selected . '>' . $r['jenjang_pendidikan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pekerjaan:</label>
                                                            <input type="text" class="form-control" name="pekerjaan_ibu" value="<?php echo htmlspecialchars($pekerjaan_ibu); ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Telpon:</label>
                                                            <input type="text" class="form-control" name="telp_ibu" value="<?php echo htmlspecialchars($telp_ibu); ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="data-santri.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                                        </div>
                                                        <?php
                                                        if (isset($_SESSION['santri']) && is_array($_SESSION['santri'])) {
                                                            foreach ($_SESSION['santri'] as $key => $value) {
                                                                echo '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '">';
                                                            }
                                                        }
                                                        ?>
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
