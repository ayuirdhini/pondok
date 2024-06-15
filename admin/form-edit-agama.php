<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_agama = "";
$nama_agama = "";
$eror     = "";
$sukses   = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_agama = $_GET['id_agama'];
    $sql1        = "SELECT * FROM agama where id_agama = '$id_agama'";
    $q1          = mysqli_query($koneksi, $sql1);
    $r1          = mysqli_fetch_array($q1);
    $id_agama    = $r1['id_agama'];
    $nama_agama    = $r1['nama_agama'];

    if ($nama_agama == '') {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    
    $nama_agama = $_POST['nama_agama'];

    if ( $nama_agama) {
        $sql1 = (" UPDATE agama SET nama_agama='$nama_agama' WHERE id_agama='$id_agama'");
        $q1    = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="agama.php"</script>  ';
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
                            <h3 class="mb-0">Form Edit</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="agama.php">Agama</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Data Agama
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
          <h3 class="card-title">Edit Data Agama</h3>
        </div>
        <div class="card-body">
         
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama_agama">Nama Agama:</label>
              <input type="text" class="form-control" id="nama_agama" name="nama_agama" value="<?php echo $nama_agama ?>">
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="submit">Edit</button>
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


