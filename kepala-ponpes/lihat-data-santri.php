<?php
include("../src/template/head-petugas.php");
include("../koneksi.php");


$id_csantri = "";
$nama_csantri = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$jenis_kelamin = "";
$id_agama = "";
$id_kew = "";
$no_telp = "";
$id_pendidikan = "";
$hobi = "";
$cita_cita = "";
$jumlah_saudara = "";
$riwayat_penyakit = "";
$kepemilikan_pip = "";
$nomor_pip = "";
$alamat = "";
$provinsi = "";
$kota = "";
$kecamatan = "";
$kelurahan = "";
$no_telp_rumah = "";
$id_kategori_pendaftaran = "";
$tanggal_daftar = "";
$error = "";
$sukses = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_csantri = $_GET['id_csantri'];
    $sql1 = "SELECT * FROM calon_santri WHERE id_csantri = ?";
    $stmt1 = $koneksi->prepare($sql1);
    $stmt1->bind_param("i", $id_csantri);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $r1 = $result1->fetch_assoc();
    
    if ($r1) {
        $id_csantri = $r1['id_csantri'];
        $nama_csantri = $r1['nama_csantri'];
        $id_tempat_lahir = $r1['id_tempat_lahir'];
        $tanggal_lahir = $r1['tanggal_lahir'];
        $jenis_kelamin = $r1['jenis_kelamin'];
        $id_agama = $r1['id_agama'];
        $id_kew = $r1['id_kew'];
        $no_telp = $r1['no_telp'];
        $id_pendidikan = $r1['id_pendidikan'];
        $hobi = $r1['hobi'];
        $cita_cita = $r1['cita_cita'];
        $jumlah_saudara = $r1['jumlah_saudara'];
        $riwayat_penyakit = $r1['riwayat_penyakit'];
        $kepemilikan_pip = $r1['kepemilikan_pip'];
        $nomor_pip = $r1['nomor_pip'];
        $alamat = $r1['alamat'];
        $provinsi = $r1['provinsi'];
        $kota = $r1['kota'];
        $kecamatan = $r1['kecamatan'];
        $kelurahan = $r1['kelurahan'];
        $no_telp_rumah = $r1['no_telp_rumah'];
        $id_kategori_pendaftaran = $r1['id_kategori_pendaftaran'];
        $tanggal_daftar = $r1['tanggal_daftar'];
    } else {
        $error = "Data tidak ditemukan";
    }
}
?>

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Lihat Data Santri</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="data-santri.php">Calon Santri</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Santri</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->

                <!-- general form elements -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <!-- general form elements disabled -->
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Lengkap:</label>
                                                        <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_csantri" value="<?= htmlspecialchars($nama_csantri)?> "disabled>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="id_tempat_lahir">Tempat Lahir:</label>
                                                    <select class="form-control" id="provinsi" name="id_tempat_lahir" disabled>
                                                        <?php
                                                        $sql = "SELECT * FROM provinsi ORDER BY id_prov ASC";
                                                        $q = mysqli_query($koneksi, $sql);
                                                        while ($r = mysqli_fetch_array($q)) {
                                                            $selected = ($r['id_prov'] == $id_tempat_lahir) ? 'selected' : '';
                                                            echo '<option value="' . $r['id_prov'] . '" ' . $selected . '>' . $r['nama_prov'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                                <div class="form-group">
                                                        <label>Tanggal Lahir:</label>
                                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= htmlspecialchars($tanggal_lahir) ?>"disabled>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label>Jenis Kelamin:</label>
                                                        <div>
                                                            <input type="radio" id="jenis_kelamin_laki-laki" name="jenis_kelamin" value="L" <?= ($jenis_kelamin == 'L') ? 'checked' : '' ?>>
                                                            <label for="jenis_kelamin_laki-laki">Laki-Laki</label>
                                                            <span style="margin: 0 10px;"></span>
                                                            <input type="radio" id="jenis_kelamin_perempuan" name="jenis_kelamin" value="P" <?= ($jenis_kelamin == 'P') ? 'checked' : '' ?>>
                                                            <label for="jenis_kelamin_perempuan">Perempuan</label>
                                                        </div>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="id_agama">Agama:</label>
                                                    <select class="form-control" id="id_agama" name="id_agama" disabled>
                                                        <?php
                                                        $sql = "SELECT * FROM agama ORDER BY id_agama ";
                                                        $q = mysqli_query($koneksi, $sql);
                                                        while ($r = mysqli_fetch_array($q)) {
                                                            $selected = ($r['id_agama'] == $id_agama) ? 'selected' : '';
                                                            echo '<option value="' . $r['id_agama'] . '" ' . $selected . '>' . $r['nama_agama'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_kew">Kewarganegaraan:</label>
                                                    <select class="form-control" id="id_kew" name="id_kew" disabled>
                                                        <?php
                                                        $sql = "SELECT * FROM kewarganegaraan ORDER BY id_kew ";
                                                        $q = mysqli_query($koneksi, $sql);
                                                        while ($r = mysqli_fetch_array($q)) {
                                                            $selected = ($r['id_kew'] == $id_kew) ? 'selected' : '';
                                                            echo '<option value="' . $r['id_kew'] . '" ' . $selected . '>' . $r['nama_kewarganegaraan'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                        <label>No Telpon:</label>
                                                        <input type="text" class="form-control" placeholder="Masukkan No Telpon" name="no_telp" value="<?= htmlspecialchars($no_telp) ?>"disabled>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="id_pendidikan">Pendidikan Terakhir:</label>
                                                    <select class="form-control" id="id_pendidikan" name="id_pendidikan" disabled>
                                                        <?php
                                                        $sql = "SELECT * FROM pendidikan ORDER BY id_pendidikan ";
                                                        $q = mysqli_query($koneksi, $sql);
                                                        while ($r = mysqli_fetch_array($q)) {
                                                            $selected = ($r['id_pendidikan'] == $id_pendidikan) ? 'selected' : '';
                                                            echo '<option value="' . $r['id_pendidikan'] . '" ' . $selected . '>' . $r['jenjang_pendidikan'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                        <label>Hobi:</label>
                                                        <input type="text" class="form-control" placeholder="Masukkan Hobi" name="hobi" value="<?= htmlspecialchars($hobi) ?>"disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cita-Cita:</label>
                                                        <input type="text" class="form-control" placeholder="Masukkan Cita-Cita" name="cita_cita" value="<?= htmlspecialchars($cita_cita) ?>"disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah Saudara:</label>
                                                        <input type="number" class="form-control" placeholder="Masukkan Jumlah Saudara" name="jumlah_saudara" value="<?= htmlspecialchars($jumlah_saudara) ?>" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Riwayat Penyakit:</label>
                                                        <input type="text" class="form-control"  name="riwayat_penyakit" value="<?= htmlspecialchars($riwayat_penyakit) ?>"disabled>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kepemilikan KIP:</label>
                                                        <div>
                                                            <input type="radio" id="kepemilikan_pip_ya" name="kepemilikan_pip" value="Ya" <?= ($kepemilikan_pip == 'Ya') ? 'checked' : '' ?>>
                                                            <label for="kepemilikan_pip_ya">Ya</label>
                                                            <span style="margin: 0 10px;"></span>
                                                            <input type="radio" id="kepemilikan_pip_tidak" name="kepemilikan_pip" value="Tidak" <?= ($kepemilikan_pip == 'Tidak') ? 'checked' : '' ?>>
                                                            <label for="kepemilikan_pip_tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No KIP:</label>
                                                        <input type="text" class="form-control" placeholder="Masukkan No KIP" name="nomor_pip" value="<?= htmlspecialchars($nomor_pip) ?>"disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat:</label>
                                                        <textarea class="form-control" rows="3" placeholder="Masukkan Alamat" name="alamat" disabled><?= htmlspecialchars($alamat) ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="provinsi">Provinsi:</label>
                                                    <select class="form-control" id="provinsi" name="provinsi" disabled>
                                                        <?php
                                                        $sql = "SELECT * FROM provinsi ORDER BY id_prov ASC";
                                                        $q = mysqli_query($koneksi, $sql);
                                                        while ($r = mysqli_fetch_array($q)) {
                                                            $selected = ($r['id_prov'] == $provinsi) ? 'selected' : '';
                                                            echo '<option value="' . $r['id_prov'] . '" ' . $selected . '>' . $r['nama_prov'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kota">Kota:</label>
                                                    <select class="form-control" id="kota" name="kota" disabled>
                                                        <?php
                                                        $sql = "SELECT * FROM kota ORDER BY id_kota ASC";
                                                        $q = mysqli_query($koneksi, $sql);
                                                        while ($r = mysqli_fetch_array($q)) {
                                                            $selected = ($r['id_kota'] == $kota) ? 'selected' : '';
                                                            echo '<option value="' . $r['id_kota'] . '" ' . $selected . '>' . $r['nama_kota'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kecamatan">Kecamatan:</label>
                                                    <select class="form-control" id="kecamatan" name="kecamatan" disabled>
                                                        <?php
                                                        $sql = "SELECT * FROM kecamatan ORDER BY id_kecamatan ASC";
                                                        $q = mysqli_query($koneksi, $sql);
                                                        while ($r = mysqli_fetch_array($q)) {
                                                            $selected = ($r['id_kecamatan'] == $kecamatan) ? 'selected' : '';
                                                            echo '<option value="' . $r['id_kecamatan'] . '" ' . $selected . '>' . $r['nama_kecamatan'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kelurahan">Kelurahan:</label>
                                                    <select class="form-control" id="kelurahan" name="kelurahan" disabled>
                                                        <?php
                                                        $sql = "SELECT * FROM kelurahan ORDER BY id_kelurahan ASC";
                                                        $q = mysqli_query($koneksi, $sql);
                                                        while ($r = mysqli_fetch_array($q)) {
                                                            $selected = ($r['id_kelurahan'] == $kelurahan) ? 'selected' : '';
                                                            echo '<option value="' . $r['id_kelurahan'] . '" ' . $selected . '>' . $r['nama_kelurahan'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                        <label>No Telpon Rumah:</label>
                                                        <input type="text" class="form-control" placeholder="Masukkan No Telpon Rumah" name="no_telp_rumah" value="<?= htmlspecialchars($no_telp_rumah) ?>" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="id_kategori_pendaftaran">Kategori Pendaftaran:</label>
                                                    <select class="form-control" id="id_kategori_pendaftaran" name="id_kategori_pendaftaran" disabled>
                                                        <?php
                                                        $sql = "SELECT * FROM kategori_pendaftaran ORDER BY id_kategori ASC";
                                                        $q = mysqli_query($koneksi, $sql);
                                                        while ($r = mysqli_fetch_array($q)) {
                                                            $selected = ($r['id_kategori'] == $id_kategori_pendaftaran) ? 'selected' : '';
                                                            echo '<option value="' . $r['id_kategori'] . '" ' . $selected . '>' . $r['nama_kategori'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Daftar:</label>
                                                        <input type="date" class="form-control" name="tanggal_daftar" value="<?= htmlspecialchars($tanggal_daftar) ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="data-santri.php" class="btn btn-secondary">Kembali</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php
include("../src/template/footer.php");
?>
