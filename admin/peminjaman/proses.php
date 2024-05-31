<?php
require '../../koneksi/koneksi.php';

if ($_GET['id'] == 'konfirmasi') {
    $data2[] = $_POST['status'];
    $data2[] = $_POST['id_rute'];
    $sql2 = "UPDATE `rute` SET `status`= ? WHERE id_rute= ?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>alert("Status Booking Rute Dipesan");history.go(-1);</script>';
}