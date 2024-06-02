<?php
require '../koneksi/koneksi.php';
$title_web = 'Ulasan';
include './header.php';
if (empty($_SESSION['USER'])) {
    session_start();
}
if (!empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT ulasan.* 
                FROM ulasan 
                WHERE id_login = '$id' 
                ORDER BY id_ulasan DESC";
} else {
    $sql = "SELECT ulasan.* 
                FROM ulasan 
                ORDER BY id_ulasan DESC";
}
$hasil = $koneksi->query($sql)->fetchAll();

?>

<br>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5 class="card-title">
                Daftar Ulasan
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Isi</th>
                            <th>Waktu Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($hasil as $isi) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $isi['isi']; ?></td>
                                <td><?= $isi['created_at']; ?></td>
                            </tr>
                            <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../footer.php'; ?>
