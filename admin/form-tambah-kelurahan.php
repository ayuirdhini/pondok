<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kecamatan = "";
$nama_kelurahan = "";
$eror = "";
$sukses = "";

if (isset($_POST['submit'])) {
    $id_kecamatan = $_POST['kecamatan'];
    $nama_kelurahan = $_POST['nama_kelurahan'];

    if ($id_kecamatan && $nama_kelurahan) {
        $sql1 = "INSERT INTO kelurahan (id_kecamatan, nama_kelurahan) VALUES ('$id_kecamatan', '$nama_kelurahan')";
        $q1 = mysqli_query($koneksi, $sql1);

        if ($q1) {
            $sukses = "Berhasil memasukkan data baru";
            echo '<script>window.location="kelurahan.php"</script>';
        } else {
            $eror = "Gagal memasukkan data. Error: " . mysqli_error($koneksi);
        }
    } else {
        $eror = "Silahkan masukkan semua data";
    }
}
?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Kelurahan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Kelurahan
                        </li>
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
                            <h3 class="card-title">Tambah Data Kelurahan</h3>
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
                                    <label for="kecamatan">Kecamatan:</label>
                                    <select class="form-control" id="kecamatan" name="kecamatan">
                                        <option value="">-- Pilih Kecamatan --</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama_kelurahan">Nama Kelurahan:</label>
                                    <input type="text" class="form-control" id="nama_kelurahan" name="nama_kelurahan" maxlength="100">
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
            </div>
        </div>
    </div>
</main>

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

function fetchKecamatan(kotaId) {
    if (kotaId !== "") {
        fetch(`get_alamat.php?kota_id=${kotaId}`)
            .then(response => response.json())
            .then(data => {
                let kecamatanSelect = document.getElementById('kecamatan');
                kecamatanSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
                data.forEach(kecamatan => {
                    kecamatanSelect.innerHTML += `<option value="${kecamatan.id_kecamatan}">${kecamatan.nama_kecamatan}</option>`;
                });
            });
    }
}
</script>
