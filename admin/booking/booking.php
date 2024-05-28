<?php
    require '../../koneksi/koneksi.php';
    $title_web = 'Daftar Booking';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
    if (!empty($_GET['id'])) {
        $id = strip_tags($_GET['id']);
        $sql = "SELECT rute.nama_paket, booking.* 
                FROM booking 
                JOIN rute ON booking.id_rute = rute.id_rute 
                WHERE id_login = '$id' 
                ORDER BY id_booking DESC";
    } else {
        $sql = "SELECT rute.nama_paket, booking.* 
                FROM booking 
                JOIN rute ON booking.id_rute = rute.id_rute 
                ORDER BY id_booking DESC";
    }
    $hasil = $koneksi->query($sql)->fetchAll();

?>

<br>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5 class="card-title">
            Daftar Booking
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Kode Booking</th>
                            <th>Nama Rute</th>
                            <th>Nama </th>
                            <th>Tanggal Booking </th>
                            <th>Total Harga</th>
                            <th>Konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no=1; foreach($hasil as $isi){?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?= $isi['kode_booking'];?></td>
                            <td><?= $isi['nama_paket'];?></td>
                            <td><?= $isi['nama'];?></td>
                            <td><?= $isi['tanggal'];?></td>
                            <td>Rp. <?= number_format($isi['total_harga']);?></td>
                            <td><?= $isi['konfirmasi_pembayaran'];?></td>
                            <td>
                                <a class="btn btn-primary" href="bayar.php?id=<?= $isi['kode_booking'];?>" role="button">Detail</a>   
                            </td>
                        </tr>
                        <?php $no++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php  include '../footer.php';?>