<?php
session_start(); 
include "../koneksi/koneksi.php";

$user = $_SESSION['Username'];
$level = $_SESSION['Level'];
if ($_SESSION['Username']=="") {
    header("Location: login.php");
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Bootsrap Example</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <script src="../assets/jquery.min.js"></script>
        <script src="../assets/bootstrap.min.js"></script>
        <style>

            .row.content {height: 640px}
             
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
            }

            @media screen and (max-width: 767px) {
                .row.content {height: auto;}
            }
            </style>
            </head>
            <body>

            <div class="container-fluid">
                <div class="row content">
                    <div class="col-sm-3 sidenav hidden-xs">
                        <h2><?php echo $_SESSION['Level'] ?></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="index.php">Dashboard</a></li>
                            <li><a href="?page=stok">Stok</a></li>
                            <li><a href="?page=user">User</a></li>
                            <li><a href="?page=logout">Log out</a></li>
        </ul><br>
        </div>
        <br>
        
        <div class="col-sm-9">
            <?php
            if(isset($_GET['page'])) {
                $laman = $_GET['page'];

                switch ($laman) {
                    case 'user':
                        include "user.php";
                        break;

                    case 'stok':
                        include "stok-brg.php";
                        break;

                    case 'logout':
                         include "logout.php";
                         break;

                    case 'tambah-barang':
                         include "tambah-produk.php";
                         break;

                    case 'cari-menu':
                         include "cari-menu.php";
                         break;

                    case 'hapus_user':
                         include "hapus_user.php";
                         break;

                     case 'tambah-user':
                         include "tambah-user.php";
                         break;

                     case 'edit-user':
                         include "edit-user.php";
                         break;

                     case 'hapus-barang':
                         include "hapus-barang.php";
                         break;

                     case 'edit-barang':
                         include "edit-barang.php";
                         break;
                        default: 

                        break;
                }
            }
            else{
                include "dashboard.php";
            }

           ?>
           </div>
        </div>
        </div>
        
        </body>
        </html>
        
