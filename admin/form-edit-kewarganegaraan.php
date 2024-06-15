<?php
include("../src/template/head-admin.php");
include("../koneksi.php");


$id_kew = "";
$nama_kewarganegaraan = "";
$eror     = "";
$sukses   = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_kew = $_GET['id_kew'];
    $sql1        = "SELECT * FROM kewarganegaraan where id_kew = '$id_kew'";
    $q1          = mysqli_query($koneksi, $sql1);
    $r1          = mysqli_fetch_array($q1);
    $id_kew   = $r1['id_kew'];
    $nama_kewarganegaraan    = $r1['nama_kewarganegaraan'];

    if ($nama_kewarganegaraan == '') {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    
    $nama_kewarganegaraan = $_POST['nama_kewarganegaraan'];

    if ( $nama_kewarganegaraan) {
        $sql1 = (" UPDATE kewarganegaraan SET nama_kewarganegaraan='$nama_kewarganegaraan' WHERE id_kew='$id_kew'");
        $q1    = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="kewarganegaraan.php"</script>  ';
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
                            <h3 class="mb-0">Edit Kewarganegaraan
                            </h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="kewarganegaraan.php">Kewaeganegaraan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Kewarganegaraan
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
          <h3 class="card-title">Edit Data Kewaeganegaraan</h3>
        </div>
        <div class="card-body">
         
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama_kewarganegaraan">Nama Kewarganegaraan:</label>
              <input type="text" class="form-control" id="nama_kewarganegaraan" name="nama_kewarganegaraan" value="<?php echo $nama_kewarganegaraan ?>">
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


