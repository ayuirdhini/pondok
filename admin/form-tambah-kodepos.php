<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kelurahan = "";
$nomorkodepos = "";
$eror = "";
$sukses = "";

if (isset($_POST['submit'])) {
    $id_kelurahan = $_POST['nama_kelurahan'];
    $nomorkodepos = $_POST['nomorkodepos'];

    if ($id_kelurahan && $nomorkodepos) {
        $sql1 = "INSERT INTO kodepos (id_kelurahan, nomorkodepos) VALUES ('$id_kelurahan', '$nomorkodepos')";
        $q1 = mysqli_query($koneksi, $sql1);

        if ($q1) {
            $sukses = "Berhasil memasukkan data baru";
            echo '<script>window.location="kodepos.php"</script>';
        } else {
            $eror = "Gagal memasukkan data. Error: " . mysqli_error($koneksi);

        }
    } else {
        $eror = "Silahkan masukkan semua data";
    }
}
?>
   <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Tambah Kode Pos</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="kodepos.php">Kode Pos</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tambah Kode Pos
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
            <h3 class="card-title">Tambah Data Kode Pos</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_kelurahan">Kelurahan:</label>
                    <select class="form-control" id="nama_kelurahan" name="nama_kelurahan">
                        <option value="">-- Pilih Kelurahan --</option>
                        <?php
                        $sql = "SELECT * FROM kelurahan ORDER BY id_kelurahan asc";
                        $q = mysqli_query($koneksi, $sql);
                        while ($r = mysqli_fetch_array($q)) {
                            echo '<option value="' . $r['id_kelurahan'] . '">' . $r['nama_kelurahan'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomorkodepos">Nomor Kode Pos:</label>
                    <input type="text" class="form-control" id="nomorkodepos" name="nomorkodepos" maxlength="100">
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
