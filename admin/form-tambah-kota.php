<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_prov = "";
$nama_kota = "";
$eror = "";
$sukses = "";

if (isset($_POST['submit'])) {
    $id_prov = $_POST['nama_prov'];
    $nama_kota = $_POST['nama_kota'];

    if ($id_prov && $nama_kota) {
        // Check length of nama_kota
        if (strlen($nama_kota) <= 100) { // Assume max length for nama_kota is 100
            // Use prepared statements
            $stmt = $koneksi->prepare("INSERT INTO kota (id_prov, nama_kota) VALUES (?, ?)");
            $stmt->bind_param("is", $id_prov, $nama_kota);
            $q1 = $stmt->execute();

            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
                echo '<script>window.location="kota.php"</script>';
            } else {
                $eror = "Gagal memasukkan data. Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $eror = "Nama kota terlalu panjang. Maksimal 100 karakter.";
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
                            <h3 class="mb-0">Tambah Kota</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tambah Kota
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
            <h3 class="card-title">Tambah Data Kota</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_prov">Provinsi:</label>
                    <select class="form-control" id="nama_prov" name="nama_prov">
                        <option value="">-- Pilih Provinsi --</option>
                        <?php
                        $sql = "SELECT * FROM provinsi ORDER BY id_prov asc";
                        $q = mysqli_query($koneksi, $sql);
                        while ($r = mysqli_fetch_array($q)) {
                            echo '<option value="' . $r['id_prov'] . '">' . $r['nama_prov'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_kota">Nama Kota:</label>
                    <input type="text" class="form-control" id="nama_kota" name="nama_kota" maxlength="100">
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
