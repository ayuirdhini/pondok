<?php
include("../src/template/head-petugas.php");
include("../koneksi.php");

$id_KK = "";
$nomor_KK = "";
$id_csantri = "";
$nama_kepkel = "";
$id_statusKK = "";
$error = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_KK = $_GET['id_KK'];
    $sql1 = "SELECT * FROM kartu_keluarga WHERE id_KK = '$id_KK'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    if ($r1) {
        $id_KK = $r1['id_KK'];
        $nomor_KK = $r1['nomor_KK']; 
        $id_csantri = $r1['id_csantri'];
        $nama_kepkel = $r1['nama_kepkel']; 
        $id_statusKK = $r1['id_statusKK'];
    } else {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $nomor_KK = $_POST['nomor_KK'];
    $id_csantri = $_POST['nama_csantri'];
    $nama_kepkel = $_POST['nama_kepkel'];
    $id_statusKK = $_POST['status_kepala_keluarga'];

    if ($nomor_KK && $id_csantri && $nama_kepkel && $id_statusKK) {
        $sql1 = "UPDATE kartu_keluarga SET nomor_KK='$nomor_KK', id_csantri='$id_csantri' , nama_kepkel='$nama_kepkel' , id_statusKK='$id_statusKK' 
        WHERE id_KK='$id_KK'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data";
            echo '<script>window.location="data-kk-santri.php"</script>';
        } else {
            $error = "Gagal Mengubah Data";
        }
    } else {
        $error = "Silahkan Masukkan Semua Data";
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
                                    <label for="nama_csantri">Nama Calon Santri:</label>
                                    <select class="form-control" id="nama_csantri" name="nama_csantri">
                                        <?php
                                        $sql = "SELECT * FROM calon_santri ORDER BY id_csantri ASC";
                                        $q = mysqli_query($koneksi, $sql);
                                        while ($r = mysqli_fetch_array($q)) {
                                            $selected = $r['id_csantri'] == $id_csantri ? 'selected' : '';
                                            echo '<option value="' . $r['id_csantri'] . '" ' . $selected . '>' . $r['nama_csantri'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_KK">Nomor Kartu Keluarga:</label>
                                    <input type="text" class="form-control" id="nomor_KK" name="nomor_KK" value="<?php echo htmlspecialchars($nomor_KK); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama_kepkel">Nama Kepala Keluarga:</label>
                                    <input type="text" class="form-control" id="nama_kepkel" name="nama_kepkel" value="<?php echo htmlspecialchars($nama_kepkel); ?>">
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
                                                        <input class="form-check-input" type="radio" name="status_kepala_keluarga" id="status' . $statuses[$i]['id_statusKK'] . '" value="' . $statuses[$i]['id_statusKK'] . '" ' . ($statuses[$i]['id_statusKK'] == $id_statusKK ? 'checked' : '') . '>
                                                        <label class="form-check-label" for="status' . $statuses[$i]['id_statusKK'] . '">' . $statuses[$i]['nama_Statuskepkel'] . '</label>
                                                      </div>';
                                            }
                                            echo '</div><div class="col-md-12">';
                                            for ($i = $half; $i < count($statuses); $i++) {
                                                echo '<div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status_kepala_keluarga" id="status' . $statuses[$i]['id_statusKK'] . '" value="' . $statuses[$i]['id_statusKK'] . '" ' . ($statuses[$i]['id_statusKK'] == $id_statusKK ? 'checked' : '') . '>
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
