<?php
session_start(); // Mulai session

// Proses pengisian data santri
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil semua data dari form
    $id_agama = $_POST['id_agama'];
    $id_pendidikan = $_POST['id_pendidikan'];
    $id_tempat_lahir = $_POST['id_tempat_lahir'];
    $id_kew = $_POST['id_kew'];
    $nama_csantri = $_POST['nama_csantri'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];
    $hobi = $_POST['hobi'];
    $cita_cita = $_POST['cita_cita'];
    $jumlah_saudara = $_POST['jumlah_saudara'];
    $riwayat_penyakit = $_POST['riwayat_penyakit'];
    $kepemilikan_pip = $_POST['kepemilikan_pip'];
    $nomor_pip = $_POST['nomor_pip'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $no_telp_rumah = $_POST['no_telp_rumah'];
    $id_kategori_pendaftaran = $_POST['id_kategori_pendaftaran'];
    $tanggal_daftar = date('Y-m-d'); // Tanggal daftar saat ini

    // Simpan data santri ke dalam session
    $_SESSION['santri'] = [
        'id_agama' => $id_agama,
        'id_pendidikan' => $id_pendidikan,
        'id_tempat_lahir' => $id_tempat_lahir,
        'id_kew' => $id_kew,
        'nama_csantri' => $nama_csantri,
        'tempat_lahir' => $tempat_lahir,
        'tanggal_lahir' => $tanggal_lahir,
        'jenis_kelamin' => $jenis_kelamin,
        'no_telp' => $no_telp,
        'hobi' => $hobi,
        'cita_cita' => $cita_cita,
        'jumlah_saudara' => $jumlah_saudara,
        'riwayat_penyakit' => $riwayat_penyakit,
        'kepemilikan_pip' => $kepemilikan_pip,
        'nomor_pip' => $nomor_pip,
        'alamat' => $alamat,
        'provinsi' => $provinsi,
        'kota' => $kota,
        'kecamatan' => $kecamatan,
        'kelurahan' => $kelurahan,
        'no_telp_rumah' => $no_telp_rumah,
        'id_kategori_pendaftaran' => $id_kategori_pendaftaran,
        'tanggal_daftar' => $tanggal_daftar
    ];

    // Redirect ke halaman form data orang tua
    header("Location: form-tambah-data-santri-ortu.php");
    exit();
}
include("../src/template/head-petugas.php");
include("../koneksi.php");
?>

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Formulir Penambahan Data Santri</h3>
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
                                    <div class="card card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Informasi Pribadi Calon Santri</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <form method="POST" action="form-tambah-data-santri-ortu.php">
                                                <div class="row">
                                                <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama Lengkap:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_csantri">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tempat_lahir">Tempat Lahir:</label>
                                                            <select class="form-control" id="tempat_lahir" name="tempat_lahir">
                                                                <option value="">-- Pilih Tempat Lahir --</option>
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
                                                            <label>Tanggal Lahir  :</label>
                                                            <input type="date" class="form-control" name="tanggal_lahir">
                                                        </div>
                                                        <div class="form-group">
                                                        <label>Jenis Kelamin:</label>
                                                        <div>
                                                            <input type="radio" id="jenis_kelamin_laki-laki" name="jenis_kelamin" value="L">
                                                            <label for="jenis_kelamin_laki-laki">Laki-Laki</label>
                                                            <span style="margin: 0 10px;"></span>
                                                            <input type="radio" id="jenis_kelamin_perempuan" name="jenis_kelamin" value="P">
                                                            <label for="jenis_kelamin_perempuan">Perempuan</label>
                                                        </div>
                                                    </div>

                                                        <div class="form-group">
                                                            <label for="id_agama">Agama :</label>
                                                            <select class="form-control" id="id_agama" name="id_agama">
                                                                <option value="">-- Pilih Agama --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM agama ORDER BY id_agama asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_agama'] . '">' . $r['nama_agama'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_kew">Kewarganegaraan:</label>
                                                            <select class="form-control" id="id_kew" name="id_kew">
                                                                <option value="">-- Pilih Kewarganegaraan --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM kewarganegaraan ORDER BY id_kew asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_kew'] . '">' . $r['nama_kewarganegaraan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                
                                                        <div class="form-group">
                                                            <label>No Telpon  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan No Telpon" name="no_telp">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="id_pendidikan">Pendidikan Terakhir:</label>
                                                            <select class="form-control" id="id_pendidikan" name="id_pendidikan">
                                                                <option value="">-- Pilih Pendidikan Terakhir --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM pendidikan ORDER BY id_pendidikan asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_pendidikan'] . '">' . $r['jenjang_pendidikan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Hobi  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Hobi" name="hobi">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Cita - Cita  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Cita-cita" name="cita_cita">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Jumlah Saudara  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Jumlah Saudara" name="jumlah_saudara">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Riwayat Penyakit  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Riwayat Penyakit" name="riwayat_penyakit">
                                                        </div>

                                                    </div>


                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Memiliki Kartu PIP:</label>
                                                        <div>
                                                            <input type="radio" id="memiliki_pip" name="kepemilikan_pip" value="Memiliki">
                                                            <label for="memiliki_pip">Ya</label>
                                                            <span style="margin: 0 10px;"></span>
                                                            <input type="radio" id="tidak_memiliki_pip" name="kepemilikan_pip" value="Tidak_Memiliki">
                                                            <label for="tidak_memiliki_pip">Tidak</label>
                                                        </div>
                                                    </div>
                                                    
                                                        <div class="form-group">
                                                            <label>Nomor Kartu PIP:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nomor Kartu PIP" name="nomor_pip">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="id_tempat">Jenis Tempat Tinggal:</label>
                                                            <select class="form-control" id="id_tempat" name="id_tempat">
                                                                <option value="">-- Pilih Jenis Tempat Tinggal --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM jenis_tempat_tinggal ORDER BY id_tempat asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_tempat'] . '">' . $r['nama_tempatTinggal'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Alamat  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat">
                                                        </div>

                                                      
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
                                                            <select class="form-control" id="kecamatan" name="kecamatan" onchange="fetchKelurahan(this.value)">
                                                                <option value="">-- Pilih Kecamatan --</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="kelurahan">Kelurahan/Desa:</label>
                                                            <select class="form-control" id="kelurahan" name="kelurahan">
                                                                <option value="">-- Pilih Kelurahan/Desa --</option>
                                                            </select>
                                                        </div>


                                                        <div class="form-group">
                                                            <label>No Telp.Rumah  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan No Telp.Rumah" name="no_telp_rumah">
                                                        </div> 

                                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="id_kategori_pendaftaran">Jenis Pendaftaran:</label>
                                            <div class="row">
                                                <?php
                                                $sql = "SELECT * FROM kategori_pendaftaran ORDER BY id_kategori ASC";
                                                $q = mysqli_query($koneksi, $sql);
                                                while ($r = mysqli_fetch_array($q)) {
                                                    echo '<div class="col-md-6">
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" name="id_kategori_pendaftaran" id="kategori_pendaftaran' . $r['id_kategori'] . '" value="' . $r['id_kategori'] . '">
                                                                <label class="form-check-label" for="status' . $r['id_kategori'] . '">' . $r['nama_kategori'] . '</label>
                                                            </div>
                                                        </div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                                     <div class="form-group">
                                                            <label>Tanggal Daftar  :</label>
                                                            <input type="date" class="form-control" name="tanggal_daftar">
                                                        </div>
                                                </div>
                                               
                                                    <div class="card-footer">
                                                    <div class="col text-end">
                                                    <a href="form-tambah-data-santri-ortu.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Lanjutkan</a>
                                                    </div>
                                                </div>

                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!--/.col (right) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                </div>
                <!-- /.row (main row) -->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->

<?php
include("../src/template/footer.php");
?>

<script>
function fetchKota(provinsiId) {
    if (provinsiId !== "") {
        fetch(`get_kota.php?provinsi_id=${provinsiId}`)
            .then(response => response.json())
            .then(data => {
                let kotaSelect = document.getElementById('kota');
                kotaSelect.innerHTML = '<option value="">-- Pilih Kota --</option>';
                data.forEach(kota => {
                    kotaSelect.innerHTML += `<option value="${kota.id_kota}">${kota.nama_kota}</option>`;
                });
                document.getElementById('kecamatan').innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
                document.getElementById('kelurahan').innerHTML = '<option value="">-- Pilih Kelurahan/Desa --</option>';
            });
    }
}

function fetchKecamatan(kotaId) {
    if (kotaId !== "") {
        fetch(`get_kecamatan.php?kota_id=${kotaId}`)
            .then(response => response.json())
            .then(data => {
                let kecamatanSelect = document.getElementById('kecamatan');
                kecamatanSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
                data.forEach(kecamatan => {
                    kecamatanSelect.innerHTML += `<option value="${kecamatan.id_kecamatan}">${kecamatan.nama_kecamatan}</option>`;
                });
                document.getElementById('kelurahan').innerHTML = '<option value="">-- Pilih Kelurahan/Desa --</option>';
            });
    }
}

function fetchKelurahan(kecamatanId) {
    if (kecamatanId !== "") {
        fetch(`get_kelurahan.php?kecamatan_id=${kecamatanId}`)
            .then(response => response.json())
            .then(data => {
                let kelurahanSelect = document.getElementById('kelurahan');
                kelurahanSelect.innerHTML = '<option value="">-- Pilih Kelurahan/Desa --</option>';
                data.forEach(kelurahan => {
                    kelurahanSelect.innerHTML += `<option value="${kelurahan.id_kelurahan}">${kelurahan.nama_kelurahan}</option>`;
                });
            });
    }
}
</script>
