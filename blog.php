<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    if($_GET['cari']??null)
    {
        $cari = strip_tags($_GET['cari']);
        $query =  $koneksi -> query('SELECT * FROM rute WHERE merk LIKE "%'.$cari.'%" ORDER BY id_rute DESC')->fetchAll();
    }else{
        $query =  $koneksi -> query('SELECT * FROM rute ORDER BY id_rute DESC')->fetchAll();
    }
?>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col-sm-12">
        <?php 
            if($_GET['cari'] ??null)
            {
                echo '<h4> Keyword Pencarian : '.$cari.'</h4>';
            }else{
                echo '<h4> Semua Rute</h4>';
            }
        ?>
        <div class="row mt-3">
        <?php 
            $no =1;
            foreach($query as $isi)
            {
        ?>
            <div class="col-sm-4">
                <div class="card">
                <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:100%;object-fit:cover;">
                    <div class="card-body" style="background:#ddd">
                        <h5 class="card-title"><?php echo $isi['nama_paket'];?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if($isi['status'] == 'Tersedia'){?>
                            <li class="list-group-item bg-primary text-white">
                                <i class="fa fa-check"></i> Available
                            </li>
                        <?php }else{?>
                            <li class="list-group-item bg-danger text-white">
                                <i class="fa fa-close"></i> Not Available
                            </li>
                        <?php }?>
                        <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Free Maintenance</li>
                        <li class="list-group-item bg-dark text-white">
                            <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>/ day
                        </li>
                    </ul>
                    <div class="card-body">
                        <center>
                            <a href="booking.php?id=<?php echo $isi['id_rute'];?>" class="btn btn-success">Booking now!</a>
                            <a href="detail.php?id=<?php echo $isi['id_rute'];?>" class="btn btn-info">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <?php $no++;}?>
        </div>
    </div>
</div>
</div>

<br>

<br>

<br>


<?php include 'footer.php';?>