<?php 
$user = 'root';
$pass = '';

   $koneksi = new PDO("mysql:host=localhost;dbname=rental_privatejet", $user, $pass);

    global $url;
    $url = "http://localhost/gojet/";

    $sql_web = "SELECT * FROM infoweb WHERE id = 1";
    $row_web = $koneksi->prepare($sql_web);
    $row_web->execute();
    global $infoweb;
    $infoweb = $row_web->fetch(PDO::FETCH_OBJ);
?>