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
                                               