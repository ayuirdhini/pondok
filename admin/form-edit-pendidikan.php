<?php
include("../src/template/head-admin.php");
include("../koneksi.php");


$id_pendidikan = "";
$jenjang_pendidikan = "";
$eror     = "";
$sukses   = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_pendidikan = $_GET['id_pendidikan'];
    $sql1        = "SELECT * FROM pendidikan where id_pendidikan = '$id_pendidikan'";
    $q1          = mysqli_query($koneksi, $sql1);
    $r1          = mysqli_fetch_array($q1);
    $id_pendidikan    = $r1['id_pendidikan'];
    $jenjang_pendidikan    = $r1['jenjang_pendidikan'];

    if ($jenjang_pendidikan == '') {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    
    $jenjang_pendidikan = $_POST['jenjang_pendidikan'];

    if ( $jenjang_pendidikan) {
        $sql1 = (" UPDATE pendidikan SET jenjang_pendidikan='$jenjang_pendidikan' WHERE id_pendidikan='$id_pendidikan'");
        $q1    = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="pendidikan.php"</script>  ';
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
                            <h3 class="mb-0">Edit Pendidikan</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="pendidikan.php">Pendidikan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Pendidikan
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
          <h3 class="card-title">Edit Data Pendidikan</h3>
        </div>
        <div class="card-body">
         
          <form action="" method="POST">
            <div class="form-group">
              <label for="jenjang_pendidikan">Nama Pendidikan:</label>
              <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" value="<?php echo $jenjang_pendidikan ?>">
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


