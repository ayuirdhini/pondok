<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$nama_kategori = "";
$eror = "";
$sukses = "";

if (isset($_POST['submit'])) {

  $nama_kategori = $_POST['nama_kategori'];
  if ( $nama_kategori) {
    $sql1 = "INSERT INTO kategori_pendaftaran ( nama_kategori) VALUES ( '$nama_kategori')";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
      $sukses = "Berhasil memasukkan data baru";
      echo '<script>window.location="jenis-pendaftaran.php"</script>';
    } else {
      $eror = "Gagal memasukkan data";
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
                            <h3 class="mb-0">Tambah Jenis Pendaftaran</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="jenis-pendaftaran.php">Jenis Pendaftaran</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tambah Jenis Pendaftaran
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
          <h3 class="card-title">Tambah Data Jenis Pendaftaran</h3>
        </div>
        <div class="card-body">
         
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama_kategori">Jenis Pendaftaran:</label>
              <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
          </form>
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


