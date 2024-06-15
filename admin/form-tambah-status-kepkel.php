<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$nama_Statuskepkel = "";
$eror = "";
$sukses = "";

if (isset($_POST['submit'])) {

  $nama_Statuskepkel = $_POST['nama_Statuskepkel'];
  if ( $nama_Statuskepkel) {
    $sql1 = "INSERT INTO status_kepala_keluarga ( nama_Statuskepkel) VALUES ( '$nama_Statuskepkel')";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
      $sukses = "Berhasil memasukkan data baru";
      echo '<script>window.location="status-kepkel.php"</script>';
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
                            <h3 class="mb-0">Tambah Status Kepala Keluarga</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="status-kepkel.php">Status Kepala Keluarga</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tambah Status Kepala Keluarga
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                        
                    <div class="form-container">
      <!-- Form Element sizes -->
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Status Kepala Keluarga</h3>
        </div>
        <div class="card-body">
         
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama_Statuskepkel">Status Kepala Keluarga:</label>
              <input type="text" class="form-control" id="nama_Statuskepkel" name="nama_Statuskepkel">
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
       <!-- Main content -->
  
<?php
include("../src/template/footer.php");
?>


