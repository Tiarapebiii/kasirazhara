<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "kasir";

$koneksi = new mysqli ($server,$user,$password,$database);

if (!$koneksi) {
    die("<script>alert ('Tidak terhubung dengan database')</script>") ;
}

?>