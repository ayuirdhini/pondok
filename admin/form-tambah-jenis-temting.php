<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$nama_tempatTinggal = "";
$eror = "";
$sukses = "";

if (isset($_POST['submit'])) {

  $nama_tempatTinggal = $_POST['nama_tempatTinggal'];
  if ( $nama_tempatTinggal) {
    $sql1 = "INSERT INTO jenis_tempat_tinggal ( nama_tempatTinggal) VALUES ( '$nama_tempatTinggal')";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
      $sukses = "Berhasil memasukkan data baru";
      echo '<script>window.location="jenis-temting.php"</script>';
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
                            <h3 class="mb-0">Tambah Jenis Tempat Tinggal</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="jenis-temting.php">Jenis Tempat Tinggal</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tambah Jenis Tempat Tinggal
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
          <h3 class="card-title">Tambah Data Jenis Tempat Tinggal</h3>
        </div>
        <div class="card-body">
         
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama_tempatTinggal">Jenis Tempat Tinggal:</label>
              <input type="text" class="form-control" id="nama_tempatTinggal" name="nama_tempatTinggal">
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


