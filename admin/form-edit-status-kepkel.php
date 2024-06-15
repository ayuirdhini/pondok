<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_statusKK = "";
$nama_Statuskepkel = "";
$eror     = "";
$sukses   = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_statusKK = $_GET['id_statusKK'];
    $sql1        = "SELECT * FROM status_kepala_keluarga where id_statusKK = '$id_statusKK'";
    $q1          = mysqli_query($koneksi, $sql1);
    $r1          = mysqli_fetch_array($q1);
    $id_statusKK    = $r1['id_statusKK'];
    $nama_Statuskepkel    = $r1['nama_Statuskepkel'];

    if ($nama_Statuskepkel == '') {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    
    $nama_Statuskepkel = $_POST['nama_Statuskepkel'];

    if ( $nama_Statuskepkel) {
        $sql1 = (" UPDATE status_kepala_keluarga SET nama_Statuskepkel='$nama_Statuskepkel' WHERE id_statusKK='$id_statusKK'");
        $q1    = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="status-kepkel.php"</script>  ';
        } else {
            $eror = "Gagal Mengubah data";
        }
    } else {
        $eror = "Silahkan Masukkan Semua data";
    }
}

?>
   <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Status Kepala Keluarga</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="status-kepkel.php">Status Kepala Keluarga</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Status Kepala Keluarga
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
          <h3 class="card-title">Edit Data Status Kepala Keluarga</h3>
        </div>
        <div class="card-body">
         
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama_Statuskepkel">Status Kepala Keluarga:</label>
              <input type="text" class="form-control" id="nama_Statuskepkel" name="nama_Statuskepkel" value="<?php echo $nama_Statuskepkel ?>">
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


