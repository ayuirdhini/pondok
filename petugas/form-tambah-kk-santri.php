<?php
include("../src/template/head-petugas.php");
include("../koneksi.php");

$nomor_kk = "";
$id_csantri = "";
$id_statusKK = "";
$error = "";
$sukses = "";

if (isset($_POST['submit'])) {
    $nomor_kk = $_POST['nomor_kk'];
    $id_csantri = $_POST['nama_csantri'];
    $nama_kepkel = $_POST['nama_kepala_keluarga'];
    $id_statusKK = $_POST['status_kepala_keluarga'];

    if ($nomor_kk && $id_csantri && $nama_kepkel && $id_statusKK) {
        if (strlen($nomor_kk) <= 100 && strlen($nama_kepkel) <= 100) {
            // Use prepared statements
            $stmt = $koneksi->prepare("INSERT INTO kartu_keluarga (nomor_kk, id_csantri, nama_kepkel, id_statusKK) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("siss", $nomor_kk, $id_csantri, $nama_kepkel, $id_statusKK);
            $q1 = $stmt->execute();

            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
                echo '<script>window.location="data-kk-santri.php"</script>';
            } else {
                $error = "Gagal memasukkan data. Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error = "Nomor KK atau Nama Kepala Keluarga terlalu panjang. Maksimal 100 karakter.";
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Kartu Keluarga Santri</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="data-kk-santri.php">Kartu Keluarga Santri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Kartu Keluarga Santri</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="form-container">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Kartu Keluarga Calon Santri</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="nama_csantri">Nama Santri:</label>
                                    <select class="form-control" id="nama_csantri" name="nama_csantri">
                                        <option value="">-- Pilih Calon Santri --</option>
                                        <?php
                                        $sql = "SELECT * FROM calon_santri ORDER BY id_csantri ASC";
                                        $q = mysqli_query($koneksi, $sql);
                                        while ($r = mysqli_fetch_array($q)) {
                                            echo '<option value="' . $r['id_csantri'] . '">' . $r['nama_csantri'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_kk">Nomor Kartu Keluarga:</label>
                                    <input type="text" class="form-control" id="nomor_kk" name="nomor_kk" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="nama_kepala_keluarga">Nama Kepala Keluarga:</label>
                                    <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="status_kepala_keluarga">Status Kepala Keluarga:</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            $sql = "SELECT * FROM status_kepala_keluarga ORDER BY id_statusKK ASC";
                                            $q = mysqli_query($koneksi, $sql);
                                            $statuses = [];
                                            while ($r = mysqli_fetch_array($q)) {
                                                $statuses[] = $r;
                                            }
                                            $half = ceil(count($statuses) / 2);
                                            for ($i = 0; $i < $half; $i++) {
                                                echo '<div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status_kepala_keluarga" id="status' . $statuses[$i]['id_statusKK'] . '" value="' . $statuses[$i]['id_statusKK'] . '">
                                                        <label class="form-check-label" for="status' . $statuses[$i]['id_statusKK'] . '">' . $statuses[$i]['nama_Statuskepkel'] . '</label>
                                                      </div>';
                                            }
                                            echo '</div><div class="col-md-12">';
                                            for ($i = $half; $i < count($statuses); $i++) {
                                                echo '<div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status_kepala_keluarga" id="status' . $statuses[$i]['id_statusKK'] . '" value="' . $statuses[$i]['id_statusKK'] . '">
                                                        <label class="form-check-label" for="status' . $statuses[$i]['id_statusKK'] . '">' . $statuses[$i]['nama_Statuskepkel'] . '</label>
                                                      </div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
                            <?php
                            if ($error) {
                                echo '<div class="alert alert-danger">' . $error . '</div>';
                            }
                            if ($sukses) {
                                echo '<div class="alert alert-success">' . $sukses . '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("../src/template/footer.php");
?>
