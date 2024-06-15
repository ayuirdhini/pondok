<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kodepos = "";
$id_kelurahan = "";
$nomorkodepos = "";
$eror     = "";
$sukses   = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
$id_kodepos = $_GET['id_kodepos'];
$sql1 = "DELETE FROM kodepos WHERE id_kodepos = '$id_kodepos'";
$q1 = mysqli_query($koneksi, $sql1);
if ($q1) {
    $sukses = "Berhasil Hapus data";
} else {
    $eror = "Gagal melakukan delete data";
}
}
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Kode Pos</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Kode pos
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                        
                    <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Kode Pos</h3>
            <div class="card-tools">
              <a href="form-tambah-kodepos.php"><button class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</button></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>No</th>
                <th>Nama Provinsi</th>
                <th>Nama Kota</th>
                <th>Nama Kecamatan</th>
                <th>Nama Kelurahan</th>
                <th>Nomor Kode Pos</th>
                <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                    $sql = "SELECT   provinsi.id_prov, provinsi.nama_prov, kota.id_kota, kota.nama_kota, kecamatan.id_kecamatan, kecamatan.nama_kecamatan,kelurahan.id_kelurahan, kelurahan.nama_kelurahan, kodepos.id_kodepos, kodepos.nomorkodepos
                    FROM provinsi
                    INNER JOIN kota ON provinsi.id_prov = kota.id_prov
                    INNER JOIN kecamatan ON kota.id_kota = kecamatan.id_kota
                    INNER JOIN kelurahan ON kecamatan.id_kecamatan = kelurahan.id_kecamatan
                    INNER JOIN kodepos ON kelurahan.id_kelurahan = kodepos.id_kelurahan;";
                    
         
                        $result = $koneksi->query($sql);
                        $urut = 1;

                        while ($row = $result->fetch_array()) :
                        ?>
                            <tr>
                                <td><?= $urut++ ?></td>
                                <td><?= $row['nama_prov'] ?></td>
                                <td><?= $row['nama_kota'] ?></td>
                                <td><?= $row['nama_kecamatan'] ?></td>
                                <td><?= $row['nama_kelurahan'] ?></td>
                                <td><?= $row['nomorkodepos'] ?></td>
                            </td>
                            <td>
                                <a href="form-edit-kodepos.php?op=edit&id_kodepos=<?php echo $row['id_kodepos'] ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                                <a href="kodepos.php?op=delete&id_kodepos=<?php echo $row['id_kodepos'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"> <button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                                
                            </td>
                        </tr>
                    <?php endwhile; ?>

              </tbody>

            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

                    

                    </div> <!-- /.row (main row) -->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->

<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<?php
include("../src/template/footer.php");
?>


