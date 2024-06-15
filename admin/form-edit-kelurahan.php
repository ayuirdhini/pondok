<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kelurahan = "";
$id_kecamatan = "";
$nama_kecamatan = "";
$nama_kelurahan = "";
$eror = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_kelurahan = $_GET['id_kelurahan'];
    $sql1 = "SELECT * FROM kelurahan WHERE id_kelurahan = '$id_kelurahan'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $r1 = mysqli_fetch_array($q1);
        $id_kelurahan = $r1['id_kelurahan'];
        $id_kecamatan = $r1['id_kecamatan']; // Changed from $nama_kecamatan
        $nama_kelurahan = $r1['nama_kelurahan'];
    } else {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $id_kecamatan = $_POST['nama_kecamatan'];
    $nama_kelurahan = $_POST['nama_kelurahan'];

    if ($id_kecamatan && $nama_kelurahan) {
        $sql1 = "UPDATE kelurahan SET id_kecamatan='$id_kecamatan', nama_kelurahan='$nama_kelurahan' WHERE id_kelurahan='$id_kelurahan'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="kelurahan.php"</script>';
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
                            <h3 class="mb-0">Edit Kelurahan</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="kelurahan.php">Kelurahan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Kelurahan
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
            <h3 class="card-title">Edit Data Kelurahan</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_kecamatan">Kecamatan:</label>
                    <select class="form-control" id="nama_kecamatan" name="nama_kecamatan">
                        <option value="">-- Pilih Kecamatan --</option>
                        <?php
                        $sql = "SELECT * FROM kecamatan ORDER BY id_kecamatan ASC";
                        $q = mysqli_query($koneksi, $sql);
                        while ($r = mysqli_fetch_array($q)) {
                            $selected = ($r['id_kecamatan'] == $id_kecamatan) ? 'selected' : '';
                            echo '<option value="' . $r['id_kecamatan'] . '" ' . $selected . '>' . $r['nama_kecamatan'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_kelurahan">Nama Kelurahan:</label>
                    <input type="text" class="form-control" id="nama_kelurahan" name="nama_kelurahan" maxlength="100" value="<?php echo $nama_kelurahan ?>">
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
