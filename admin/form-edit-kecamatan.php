<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kecamatan = "";
$id_kota = "";
$nama_kota = "";
$nama_kecamatan = "";
$eror = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_kecamatan = $_GET['id_kecamatan'];
    $sql1 = "SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kecamatan'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $r1 = mysqli_fetch_array($q1);
        $id_kecamatan = $r1['id_kecamatan'];
        $id_kota = $r1['id_kota']; // Changed from $nama_kota
        $nama_kecamatan = $r1['nama_kecamatan'];
    } else {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $id_kota = $_POST['nama_kota'];
    $nama_kecamatan = $_POST['nama_kecamatan'];

    if ($id_kota && $nama_kecamatan) {
        $sql1 = "UPDATE kecamatan SET id_kota='$id_kota', nama_kecamatan='$nama_kecamatan' WHERE id_kecamatan='$id_kecamatan'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="kecamatan.php"</script>';
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
                            <h3 class="mb-0">Edit Kecamatan</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="kecamatan.php">Kecamatan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                   Edit Kecamatan
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
            <h3 class="card-title">Edit Data Kecamatan</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_kota">Kota:</label>
                    <select class="form-control" id="nama_kota" name="nama_kota">
                        <option value="">-- Pilih Kota --</option>
                        <?php
                        $sql = "SELECT * FROM kota ORDER BY id_kota ASC";
                        $q = mysqli_query($koneksi, $sql);
                        while ($r = mysqli_fetch_array($q)) {
                            $selected = ($r['id_kota'] == $id_kota) ? 'selected' : '';
                            echo '<option value="' . $r['id_kota'] . '" ' . $selected . '>' . $r['nama_kota'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_kecamatan">Nama Kecamatan:</label>
                    <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" maxlength="100" value="<?php echo $nama_kecamatan ?>">
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
