<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_tempat = "";
$nama_tempatTinggal = "";
$eror     = "";
$sukses   = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_tempat = $_GET['id_tempat'];
    $sql1        = "SELECT * FROM jenis_tempat_tinggal where id_tempat = '$id_tempat'";
    $q1          = mysqli_query($koneksi, $sql1);
    $r1          = mysqli_fetch_array($q1);
    $id_tempat    = $r1['id_tempat'];
    $nama_tempatTinggal    = $r1['nama_tempatTinggal'];

    if ($nama_tempatTinggal== '') {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    
    $nama_tempatTinggal = $_POST['nama_tempatTinggal'];

    if ( $nama_tempatTinggal) {
        $sql1 = (" UPDATE jenis_tempat_tinggal SET nama_tempatTinggal='$nama_tempatTinggal' WHERE id_tempat='$id_tempat'");
        $q1    = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="jenis-temting.php"</script>  ';
        } else {
            $eror = "Gagal Mengubah data";
        }
    } else {
        $eror = "Silahkan Masukkan Semua data";
    }
}
?>   <main class="app-main"> <!--begin::App Content Header-->
<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Jenis Tempat Tinggal</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="jenis-temting.php">Jenis Tempat Tinggal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    Edit Jenis Tempat Tinggal
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
          <h3 class="card-title">Edit Data Jenis Tempat Tinggal</h3>
        </div>
        <div class="card-body">
         
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama_tempatTinggal">Jenis Tempat Tinggal:</label>
              <input type="text" class="form-control" id="nama_tempatTinggal" name="nama_tempatTinggal" value="<?php echo $nama_tempatTinggal ?>">
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


