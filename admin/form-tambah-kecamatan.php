<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kota = "";
$nama_kecamatan = "";
$eror = "";
$sukses = "";

if (isset($_POST['submit'])) {
    $id_kota = $_POST['nama_kota'];
    $nama_kecamatan = $_POST['nama_kecamatan'];

    if ($id_kota && $nama_kecamatan) {
        $sql1 = "INSERT INTO kecamatan (id_kota, nama_kecamatan) VALUES ('$id_kota', '$nama_kecamatan')";
        $q1 = mysqli_query($koneksi, $sql1);

        if ($q1) {
            $sukses = "Berhasil memasukkan data baru";
            echo '<script>window.location="kecamatan.php"</script>';
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
                            <h3 class="mb-0">Tambah Kecamatan</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="kecamatan.php">Kecamatan
                                </a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tambah Kecamatan
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
            <h3 class="card-title">Tambah Data Kecamatan</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
            <div class="form-group">
            <label for="provinsi">Provinsi:</label>
            <select class="form-control" id="provinsi" name="provinsi" onchange="fetchKota(this.value)">
            <option value="">-- Pilih Provinsi --</option>
                <?php
                   $sql = "SELECT * FROM provinsi ORDER BY id_prov ASC";
                   $q = mysqli_query($koneksi, $sql);
                    while ($r = mysqli_fetch_array($q)) {
                        echo '<option value="' . $r['id_prov'] . '">' . $r['nama_prov'] . '</option>';
                      }
               ?>
            </select>
            </div>

            <div class="form-group">
            <label for="kota">Kota:</label>
            <select class="form-control" id="kota" name="kota" onchange="fetchKecamatan(this.value)">
            <option value="">-- Pilih Kota --</option>
            </select>
            </div>

                <div class="form-group">
                    <label for="nama_kecamatan">Nama Kecamatan:</label>
                    <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" maxlength="100">
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
<script>
function fetchKota(provinsiId) {
    if (provinsiId !== "") {
        fetch(`get_alamat.php?provinsi_id=${provinsiId}`)
            .then(response => response.json())
            .then(data => {
                let kotaSelect = document.getElementById('kota');
                kotaSelect.innerHTML = '<option value="">-- Pilih Kota --</option>';
                data.forEach(kota => {
                    kotaSelect.innerHTML += `<option value="${kota.id_kota}">${kota.nama_kota}</option>`;
                });
                document.getElementById('kecamatan').innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
            });
    }
}
</script>