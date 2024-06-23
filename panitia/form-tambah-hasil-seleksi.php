<?php
include("../src/template/head-panitia.php");
include("../koneksi.php");

$id_csantri = "";
$keterangan = "";
$eror = "";
$sukses = "";

if (isset($_POST['submit'])) {
    $id_csantri = $_POST['nama_csantri'];
    $keterangan = $_POST['keterangan'];

    if ($id_csantri && $keterangan) {
        // Check length of nama_kota
        if (strlen($keterangan) <= 100) { // Assume max length for nama_kota is 100
            // Use prepared statements
            $stmt = $koneksi->prepare("INSERT INTO hasil_seleksi (id_csantri, keterangan) VALUES (?, ?)");
            $stmt->bind_param("is", $id_csantri, $keterangan);
            $q1 = $stmt->execute();

            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
                echo '<script>window.location="hasil-seleksi.php"</script>';
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
                            <h3 class="mb-0">Tambah Hasil Seleksi</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tambah Hasil Seleksi
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
            <h3 class="card-title">Tambah Data Hasil Seleksi</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_csantri">Nama Calon Santri:</label>
                    <select class="form-control" id="nama_csantri" name="nama_csantri">
                        <option value="">-- Pilih Nama Calon Santri --</option>
                        <?php
                        $sql = "SELECT * FROM calon_santri ORDER BY id_csantri asc";
                        $q = mysqli_query($koneksi, $sql);
                        while ($r = mysqli_fetch_array($q)) {
                            echo '<option value="' . $r['id_csantri'] . '">' . $r['nama_csantri'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="100">
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
