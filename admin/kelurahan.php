<?php
include("../src/template/head-admin.php");
include("../koneksi.php");

$id_kelurahan = "";
$id_kecamatan = "";
$nama_kelurahan = "";
$eror = "";
$sukses = "";

// Initial filter value
$provinsi_selected = isset($_POST['provinsi-filter']) ? $_POST['provinsi-filter'] : '';

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    if (isset($_GET['id_kelurahan'])) {
        $id_kelurahan = $_GET['id_kelurahan'];
        // Use prepared statement to avoid SQL injection
        $sql1 = "DELETE FROM kelurahan WHERE id_kelurahan = ?";
        $stmt = $koneksi->prepare($sql1);
        $stmt->bind_param("i", $id_kelurahan); // Assuming id_kelurahan is integer
        if ($stmt->execute()) {
            $sukses = "Berhasil Hapus data";
        } else {
            $eror = "Gagal melakukan delete data";
        }
        $stmt->close();
    } else {
        $eror = "ID Kelurahan tidak tersedia";
    }
}

// Initial query without filter
$sql = "SELECT provinsi.nama_prov, kota.nama_kota, kecamatan.nama_kecamatan, kelurahan.id_kelurahan, kelurahan.nama_kelurahan
        FROM provinsi
        INNER JOIN kota ON provinsi.id_prov = kota.id_prov
        INNER JOIN kecamatan ON kota.id_kota = kecamatan.id_kota
        INNER JOIN kelurahan ON kecamatan.id_kecamatan = kelurahan.id_kecamatan";

// Check if province filter is set
if (!empty($provinsi_selected)) {
    $sql .= " WHERE provinsi.nama_prov = ?";
}

$stmt = $koneksi->prepare($sql);
if (!empty($provinsi_selected)) {
    $stmt->bind_param("s", $provinsi_selected);
}
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<!-- HTML structure starts here -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Kelurahan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kelurahan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row mb-3">
            <div class="col-auto">
    <form method="post" action="">
        <div class="input-group">
            <select id="provinsi-filter" class="form-control" name="provinsi-filter">
                <option value="">Pilih Provinsi</option>
                <?php
                $stmt_prov = $koneksi->prepare("SELECT id_prov, nama_prov FROM provinsi");
                $stmt_prov->execute();
                $provinsi_result = $stmt_prov->get_result();
                while ($prov = $provinsi_result->fetch_assoc()) {
                    $selected = ($provinsi_selected == $prov['nama_prov']) ? 'selected' : '';
                    echo "<option value='{$prov['nama_prov']}' $selected>{$prov['nama_prov']}</option>";
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>
</div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Kelurahan</h3>
                            <div class="card-tools">
                                <a href="form-tambah-kelurahan.php" class="ml-2"><button class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($provinsi_selected)) : ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Provinsi</th>
                                            <th>Nama Kota</th>
                                            <th>Nama Kecamatan</th>
                                            <th>Nama Kelurahan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $urut = 1;
                                        while ($row = $result->fetch_assoc()) :
                                        ?>
                                            <tr>
                                                <td><?= $urut++ ?></td>
                                                <td><?= $row['nama_prov'] ?></td>
                                                <td><?= $row['nama_kota'] ?></td>
                                                <td><?= $row['nama_kecamatan'] ?></td>
                                                <td><?= $row['nama_kelurahan'] ?></td>
                                                <td>
                                                    <a href="form-edit-kelurahan.php?op=edit&id_kelurahan=<?= $row['id_kelurahan'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="kelurahan.php?op=delete&id_kelurahan=<?= $row['id_kelurahan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <div class="alert alert-info">Silakan pilih provinsi untuk menampilkan data kelurahan.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<?php include("../src/template/footer.php"); ?>
