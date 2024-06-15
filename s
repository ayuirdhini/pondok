                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama Lengkap:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_csantri">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_prov">Tempat Lahir:</label>
                                                            <select class="form-control" id="nama_prov" name="nama_prov">
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
                                                                <input type="radio" id="wali_hidup" name="status_hidup_wali" value="Hidup">
                                                                <label for="wali_hidup">Laki-Laki</label>
                                                                <span style="margin: 0 10px;"></span>
                                                                <input type="radio" id="wali_meninggal" name="status_hidup_wali" value="Meninggal">
                                                                <label for="wali_meninggal">Perempuan</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_agama">Agama :</label>
                                                            <select class="form-control" id="nama_agama" name="nama_agama">
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
                                                            <label for="nama_kewarganegaraan">Kewarganegaraan:</label>
                                                            <select class="form-control" id="nama_kewarganegaraan" name="kewarganegaraan">
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
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <!-- text input -->
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
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Nomor Kartu PIP:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nomor Kartu PIP" name="nomor_pip">
                                                        </div>
                                                </div>
                                               








                                                <?php
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
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Nama Lengkap:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_csantri">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <!-- text input -->
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
                                                </div>

                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label for="nama_prov">Tempat Lahir:</label>
                                                            <select class="form-control" id="nama_prov" name="nama_prov">
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
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Nomor Kartu PIP:</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Nomor Kartu PIP" name="nomor_pip">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir  :</label>
                                                            <input type="date" class="form-control" name="tanggal_lahir">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label for="nama_tempatTinggal">Jenis Tempat Tinggal:</label>
                                                            <select class="form-control" id="nama_tempatTinggal" name="nama_tempatTinggal">
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
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin:</label>
                                                            <div>
                                                                <input type="radio" id="wali_hidup" name="status_hidup_wali" value="Hidup">
                                                                <label for="wali_hidup">Laki-Laki</label>
                                                                <span style="margin: 0 10px;"></span>
                                                                <input type="radio" id="wali_meninggal" name="status_hidup_wali" value="Meninggal">
                                                                <label for="wali_meninggal">Perempuan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Alamat  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label for="nama_agama">Agama :</label>
                                                            <select class="form-control" id="nama_agama" name="nama_agama">
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
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label for="nama_prov">Provinsi:</label>
                                                            <select class="form-control" id="nama_prov" name="provinsi">
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
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label for="nama_kewarganegaraan">Kewarganegaraan:</label>
                                                            <select class="form-control" id="nama_kewarganegaraan" name="kewarganegaraan">
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
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nama_kota">Kota:</label>
                                                            <select class="form-control" id="nama_kota" name="kota">
                                                                <option value="">-- Pilih Kota --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM kota ORDER BY id_kota asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_kota'] . '">' . $r['nama_kota'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>No Telpon  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan No Telpon" name="no_telpon">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nama_kecamatan">Kecamatan:</label>
                                                            <select class="form-control" id="nama_kecamatan" name="kecamatan">
                                                                <option value="">-- Pilih Kecamatan --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM kecamatan ORDER BY id_kecamatan asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_kecamatan'] . '">' . $r['nama_kecamatan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="jenjang_pendidikan">Pendidikan Terakhir:</label>
                                                            <select class="form-control" id="jenjang_pendidikan" name="pendidikan">
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
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nama_kelurahan">Kelurahan/Desa:</label>
                                                            <select class="form-control" id="nama_kelurahan" name="kelurahan">
                                                                <option value="">-- Pilih Kelurahan/Desa --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM kelurahan ORDER BY id_kelurahan asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_kelurahan'] . '">' . $r['nama_kelurahan'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Hobi  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Hobi" name="hobi">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nomor_kodepos">Kode Pos:</label>
                                                            <select class="form-control" id="nomor_kodepos" name="kodepos">
                                                                <option value="">-- Pilih Kode Pos --</option>
                                                                <?php
                                                                $sql = "SELECT * FROM kodepos ORDER BY id_kodepos asc";
                                                                $q = mysqli_query($koneksi, $sql);
                                                                while ($r = mysqli_fetch_array($q)) {
                                                                    echo '<option value="' . $r['id_kodepos'] . '">' . $r['nomor_kodepos'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Cita - Cita  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Cita-cita" name="cita_cita">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>No Telp.Rumah  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan No Telp.Rumah" name="no_telp_rumah">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Jumlah Saudara  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Jumlah Saudara" name="jumlah_saudara">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status_kepala_keluarga">Jenis Pendaftaran:</label>
                                            <div class="row">
                                                <?php
                                                $sql = "SELECT * FROM kategori_pendaftaran ORDER BY id_kategori ASC";
                                                $q = mysqli_query($koneksi, $sql);
                                                while ($r = mysqli_fetch_array($q)) {
                                                    echo '<div class="col-md-6">
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" name="status_kepala_keluarga" id="status' . $r['id_kategori'] . '" value="' . $r['id_kategori'] . '">
                                                                <label class="form-check-label" for="status' . $r['id_kategori'] . '">' . $r['nama_kategori'] . '</label>
                                                            </div>
                                                        </div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Riwayat Penyakit  :</label>
                                                            <input type="text" class="form-control" placeholder="Masukkan Riwayat Penyakit" name="riwayat_penyakit">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
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
