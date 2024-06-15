<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kecamatan = "";
$id_kota = "";
$id_prov = ""; 
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
    $sql1 = "SELECT k*, ko.id_prov FROM kecamatan k JOIN kota ko ON k.id_kota = ko.id_kota WHERE id_kecamatan = '$id_kecamatan'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $r1 = mysqli_fetch_array($q1);
        $id_kecamatan = $r1['id_kecamatan'];
        $id_kota = $r1['id_kota'];
        $id_prov = $r1['id_prov']; // Diperbarui
        $nama_kecamatan = $r1['nama_kecamatan'];
    } else {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $id_kota = $_POST['kota'];
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
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Kecamatan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="kecamatan.php">Kecamatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kecamatan</li>
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
                                <h3 class="card-title">Edit Data Kecamatan</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="id_kecamatan" value="<?php echo $id_kecamatan; ?>">

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
                                        <select class="form-control" id="kota" name="kota">
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
                                        <label for="nama_kecamatan">Nama Kecamatan:</label>
                                        <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" maxlength="100" value="<?php echo $nama_kecamatan; ?>">
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
