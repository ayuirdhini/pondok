<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kota = "";
$id_prov = "";
$nama_prov = "";
$nama_kota = "";
$eror = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_kota = $_GET['id_kota'];
    $sql1 = "SELECT * FROM kota WHERE id_kota = '$id_kota'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $id_kota = $r1['id_kota'];
    $id_prov = $r1['id_prov']; // Use id_prov instead of nama_prov
    $nama_kota = $r1['nama_kota'];

    if ($nama_kota == '') {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $id_prov = $_POST['nama_prov'];
    $nama_kota = $_POST['nama_kota'];

    if ($id_prov && $nama_kota) {
        $sql1 = "UPDATE kota SET id_prov='$id_prov', nama_kota='$nama_kota' WHERE id_kota='$id_kota'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="kota.php"</script>';
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
                            <h3 class="mb-0">Edit Kota</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="kota.php">Kota</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Kota
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
            <h3 class="card-title">Edit Data Kota</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_prov">Provinsi:</label>
                    <select class="form-control" id="nama_prov" name="nama_prov">
                        <option value="">-- Pilih Provinsi --</option>
                        <?php
                        $sql = "SELECT * FROM provinsi ORDER BY id_prov ASC";
                        $q = mysqli_query($koneksi, $sql);
                        while ($r = mysqli_fetch_array($q)) {
                            $selected = ($r['id_prov'] == $id_prov) ? 'selected' : '';
                            echo '<option value="' . $r['id_prov'] . '" ' . $selected . '>' . $r['nama_prov'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_kota">Nama Kota:</label>
                    <input type="text" class="form-control" id="nama_kota" name="nama_kota" maxlength="100" value="<?php echo $nama_kota ?>">
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
