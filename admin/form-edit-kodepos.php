<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kodepos = "";
$id_kelurahan = "";
$nama_kelurahan = "";
$nomorkodepos = "";
$eror = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_kodepos = $_GET['id_kodepos'];
    $sql1 = "SELECT * FROM kodepos WHERE id_kodepos = '$id_kodepos'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $id_kodepos = $r1['id_kodepos'];
    $id_kelurahan = $r1['id_kelurahan'];
    $nomorkodepos = $r1['nomorkodepos'];

    if ($nomorkodepos == '') {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $id_kelurahan = $_POST['nama_kelurahan'];
    $nomorkodepos = $_POST['nomorkodepos'];

    if ($id_kelurahan && $nomorkodepos) {
        $sql1 = "UPDATE kodepos SET id_kelurahan='$id_kelurahan', nomorkodepos='$nomorkodepos' WHERE id_kodepos='$id_kodepos'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="kodepos.php"</script>';
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
                            <h3 class="mb-0">Edit Kode Pos</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="kodepos.php">Kode Pos</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Kode Pos
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
            <h3 class="card-title">Edit Data Kode Pos</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
            <div class="form-group">
                    <label for="nama_kelurahan">Kelurahan:</label>
                    <select class="form-control" id="nama_kelurahan" name="nama_kelurahan">
                        <option value="">-- Pilih Kelurahan --</option>
                        <?php
                        $sql = "SELECT * FROM kelurahan ORDER BY id_kelurahan ASC";
                        $q = mysqli_query($koneksi, $sql);
                        while ($r = mysqli_fetch_array($q)) {
                            $selected = ($r['id_kelurahan'] == $id_kelurahan) ? 'selected' : '';
                            echo '<option value="' . $r['id_kelurahan'] . '" ' . $selected . '>' . $r['nama_kelurahan'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomorkodepos">Nomor Kode Pos:</label>
                    <input type="text" class="form-control" id="nomorkodepos" name="nomorkodepos" maxlength="100" value="<?php echo $nomorkodepos ?>">
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
