<?php
include("../src/template/head-panitia.php");
include("../koneksi.php");

$id_seleksi = "";
$id_csantri = "";
$nama_csantri = "";
$keterangan = "";
$eror = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_seleksi = $_GET['id_seleksi'];
    $sql1 = "SELECT * FROM hasil_seleksi WHERE id_seleksi = '$id_seleksi'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $id_seleksi = $r1['id_seleksi'];
    $id_csantri = $r1['id_csantri']; 
    $keterangan = $r1['keterangan'];

    if ($keterangan == '') {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $id_csantri = $_POST['nama_csantri'];
    $keterangan = $_POST['keterangan'];

    if ($id_csantri && $keterangan) {
        $sql1 = "UPDATE hasil_seleksi SET id_csantri='$id_csantri', keterangan='$keterangan' WHERE id_csantri='$id_csantri'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="hasil-seleksi.php"</script>';
        } else {
            $eror = "Gagal Mengubah data";
        }
    } else {
        $eror = "Silahkan Masukkan Semua data";
    }
}
?>
   <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Hasil Seleksi</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Hasil Seleksi
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                        
                        
                     <!-- Main content -->
<div class="form-container">
    <!-- Form Element sizes -->
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Edit Data Hasil Seleksi</h3>
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
                    <label for="keterangan">Keterangan:</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo htmlspecialchars($keterangan); ?>" >
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>
            <?php
            if ($eror) {
                echo '<div class="alert alert-danger">' . $eror . '</div>';
            }
            if ($sukses) {
                echo '<div class="alert alert-success">' . $sukses . '</div>';
            }
            ?>
        </div>
    </div>
</div>

                    

                    </div> <!-- /.row (main row) -->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->

<?php
include("../src/template/footer.php");
?>
