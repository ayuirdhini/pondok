<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_user = "";
$username = "";
$password = "";
$role = "";
$email = "";
$eror     = "";
$sukses   = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_user = $_GET['id_user'];
    $sql1        = "SELECT * FROM user where id_user = '$id_user'";
    $q1          = mysqli_query($koneksi, $sql1);
    $r1          = mysqli_fetch_array($q1);
    $id_user    = $r1['id_user'];
    $username    = $r1['username'];
    $password    = $r1['password'];
    $role    = $r1['role'];
    $email    = $r1['email'];

    if ($username == '') {
        $eror = "data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    if ( $username) {
        $sql1 = (" UPDATE user SET username='$username', password='$password', role='$role', email='$email' WHERE id_user='$id_user'");
        $q1    = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil Mengubah Data Baru";
            echo '<script>window.location="hakuser.php"</script>  ';
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
                            <h3 class="mb-0">Edit Hak User</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="hakuser.php">Hak User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                Edit Hak User
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
          <h3 class="card-title">Edit Data Hak User</h3>
        </div>
        <div class="card-body">
         
          <form action="" method="POST">
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="text" class="form-control" id="password" name="password" value="<?php echo $password ?>">
            </div>
            <div class="form-group">
              <label for="role">Role:</label>
              <input type="text" class="form-control" id="role" name="role" value="<?php echo $role ?>">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
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