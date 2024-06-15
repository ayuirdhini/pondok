<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kelurahan = "";
$id_kecamatan = "";
$id_kota = "";
$id_prov = ""; 
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
    $sql1 = "SELECT k.*, kc.id_kota, p.id_prov FROM kelurahan k
             JOIN kecamatan kc ON k.id_kecamatan = kc.id_kecamatan
             JOIN kota ko ON kc.id_kota = ko.id_kota
             JOIN provinsi p ON ko.id_prov = p.id_prov
             WHERE id_kelurahan = '$id_kelurahan'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $r1 = mysqli_fetch_array($q1);
        $id_kelurahan = $r1['id_kelurahan'];
        $id_kecamatan = $r1['id_kecamatan'];
        $id_kota = $r1['id_kota'];
        $id_prov = $r1['id_prov'];
        $nama_kelurahan = $r1['nama_kelurahan'];
    } else {
        $eror = "Data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $id_kelurahan = $_POST['id_kelurahan'];
    $id_kecamatan = $_POST['kecamatan'];
    $nama_kelurahan = $_POST['nama_kelurahan'];

    if ($id_kecamatan && $nama_kelurahan) {
        $sql1 = "UPDATE kelurahan SET id_kecamatan='$id_kecamatan', nama_kelurahan='$nama_kelurahan' WHERE id_kelurahan='$id_kelurahan'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data";
            echo '<script>window.location="kelurahan.php"</script>';
        } else {
            $eror = "Gagal Mengubah data";
        }
    } else {
        $eror = "Silahkan Masukkan Semua data";
    }
}
?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Kelurahan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="kelurahan.php">Kelurahan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kelurahan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="form-container">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Kelurahan</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="id_kelurahan" value="<?php echo $id_kelurahan; ?>">

                                    <div class="form-group">
                                        <label for="provinsi">Provinsi:</label>
                                        <select class="form-control" id="provinsi" name="provinsi" onchange="fetchKota(this.value)">
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
                                        <label for="kota">Kota:</label>
                                        <select class="form-control" id="kota" name="kota" onchange="fetchKecamatan(this.value)">
                                            <option value="">-- Pilih Kota --</option>
                                            <?php
                                            if ($id_prov) {
                                                $sql = "SELECT * FROM kota WHERE id_prov='$id_prov' ORDER BY id_kota ASC";
                                                $q = mysqli_query($koneksi, $sql);
                                                while ($r = mysqli_fetch_array($q)) {
                                                    $selected = ($r['id_kota'] == $id_kota) ? 'selected' : '';
                                                    echo '<option value="' . $r['id_kota'] . '" ' . $selected . '>' . $r['nama_kota'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan:</label>
                                        <select class="form-control" id="kecamatan" name="kecamatan">
                                            <option value="">-- Pilih Kecamatan --</option>
                                            <?php
                                            if ($id_kota) {
                                                $sql = "SELECT * FROM kecamatan WHERE id_kota='$id_kota' ORDER BY id_kecamatan ASC";
                                                $q = mysqli_query($koneksi, $sql);
                                                while ($r = mysqli_fetch_array($q)) {
                                                    $selected = ($r['id_kecamatan'] == $id_kecamatan) ? 'selected' : '';
                                                    echo '<option value="' . $r['id_kecamatan'] . '" ' . $selected . '>' . $r['nama_kecamatan'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kelurahan">Nama Kelurahan:</label>
                                        <input type="text" class="form-control" id="nama_kelurahan" name="nama_kelurahan" maxlength="100" value="<?php echo $nama_kelurahan; ?>">
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
                    // Set the selected kota if it is already defined
                    var selectedKota = "<?php echo $id_kota; ?>";
                    if (selectedKota) {
                        kotaSelect.value = selectedKota;
                        fetchKecamatan(selectedKota);
                    }
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
                    // Set the selected kecamatan if it is already defined
                    var selectedKecamatan = "<?php echo $id_kecamatan; ?>";
                    if (selectedKecamatan) {
                        kecamatanSelect.value = selectedKecamatan;
                    }
                });
        }
    }

    // Call fetchKota on page load if id_prov is set
    document.addEventListener("DOMContentLoaded", function() {
        var id_prov = "<?php echo $id_prov; ?>";
        if (id_prov) {
            fetchKota(id_prov);
        }
    });
</script>
