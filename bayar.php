<?php
session_start();
require 'koneksi/koneksi.php';
include 'header.php';
if (empty($_SESSION['USER'])) {
    echo '<script>alert("Harap login !");window.location="index.php"</script>';
}
$kd_booking = $_GET['id'];
$hasil = $koneksi->query("SELECT * FROM booking WHERE kode_booking = '$kd_booking'")->fetch();

$id = $hasil['id_rute'];
$isi = $koneksi->query("SELECT * FROM rute WHERE id_rute = '$id'")->fetch();

$unik = random_int(100, 999);

?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-4">

            <div class="card">
                <div class="card-body text-center">
                    <h5>Pembayaran Dapat Melalui :</h5>
                    <hr />
                    <p> <?= $infoweb->no_rek; ?> </p>
                </div>
            </div>
            <br />
            <div class="card">
                <div class="card-body" style="background:#ddd">
                    <h5 class="card-title"><?php echo $isi['nama_paket']; ?></h5>
                </div>
                <ul class="list-group list-group-flush">

                    <?php if ($isi['status'] == 'Tersedia') { ?>

                        <li class="list-group-item bg-primary text-white">
                            <i class="fa fa-check"></i> Available
                        </li>

                    <?php } else { ?>

                        <li class="list-group-item bg-danger text-white">
                            <i class="fa fa-close"></i> Not Available
                        </li>

                    <?php } ?>


                    <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Free Maintenance</li>
                    <li class="list-group-item bg-dark text-white">
                        <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']); ?>.000
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Kode Booking </td>
                            <td> :</td>
                            <td><?php echo $hasil['kode_booking']; ?></td>
                        </tr>
                        <tr>
                            <td>KTP </td>
                            <td> :</td>
                            <td><?php echo $hasil['ktp']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama </td>
                            <td> :</td>
                            <td><?php echo $hasil['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>telepon </td>
                            <td> :</td>
                            <td><?php echo $hasil['no_tlp']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Sewa </td>
                            <td> :</td>
                            <td><?php echo $hasil['tanggal']; ?></td>
                        </tr>
                        <tr>
                            <td>Total Harga </td>
                            <td> :</td>
                            <td>Rp. <?php echo number_format($hasil['total_harga']); ?>.000</td>
                        </tr>
                        <tr>
                            <td>Status </td>
                            <td> :</td>
                            <td><?php echo $hasil['konfirmasi_pembayaran']; ?></td>
                        </tr>
                    </table>

                    <?php if ($hasil['konfirmasi_pembayaran'] == 'Belum Bayar') { ?>
                        <a href="konfirmasi.php?id=<?php echo $kd_booking; ?>"
                            class="btn btn-primary float-right">Konfirmasi
                            Pembayaran</a>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

<?php include 'footer.php'; ?>