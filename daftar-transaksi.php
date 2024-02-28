<?php
include("header.php");
?>
<style>
    #main-content {
        margin-top: 40px;
    }
    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Kasir</a>
                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    <li>
                 </ul>
              </div>
           </div>
        </nav>
        <div class="p-4" id="main-content">
            <a href="transaksi.php" class="btn btn-md btn-primary float-end">Tambah Transaksi+</a>
            <div class="card mt-5">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Pemesan</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                           <tbody>
                            <?php
                            include("koneksi/koneksi.php");

                            $sql = $koneksi->query("SELECT * FROM penjualan ORDER BY penjualanID DESC LIMIT 1"); 
                            while ($data= $sql->fetch_assoc()) { 
                                ?>
                                <tr>
                                    <td><?php echo $data['PenjualanID']?></td>
                                    <td><?php echo $data['TanggalPenjualan']?><td>
                                    
                                         <?php
                                            $sql2 = $koneksi->query("SELECT * FROM pelanggan WHERE pelangganID = '".$data['PenjualanID']."'");
                                             while ($data2= $sql2->fetch_assoc()) {
                                             echo $data2['Namapelanggan'];
                                        } 
                                        ?>
                                    
                            <td>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th class="col-1">Jumlah</th>
                                            <th class="col-1">Harga</th>
                                            <th class="col-1">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql3 = $koneksi->query("SELECT * FROM detailpenjualan WHERE DetailID ='". $data['PenjualanID']. "'");
                                        $totalharga = 0;
                                         
                                        while ($data3= $sql3->fetch_assoc()) {
                                            ?>
                                            <tr>
                                            <td>
                                            <?php
                                                    $sql4 = $koneksi->query("SELECT * FROM produk WHERE produkID = '". $data3['produkID'] . "'");

                                                    while ($data4= $sql4->fetch_assoc()) {
                                                        echo $data4['NamaProduk'];
                                                    }
                                                    ?>
                                                    </td>  
                                                    <td><?php echo $data3['jumlahproduk']?> pcs</td>
                                                    <td>RP.<?php echo number_format($data3['subtotal']) ?></td>
                                                    <td><?php echo"<a href='hapus-menu.php?id=$data3[produkID]' class='btn btn-sm btn-danger'>hapus</a>" ?></td>
                                                </tr>
                                                <?php
                                                $totalproduk = $data3['jumlahproduk'] * $data3['subtotal'];
                                                $totalharga += $totalproduk;
                                        }
                                        ?>

                                        <tr>
                                            <td colspan='2'><strong>Total Harga:</strong></td>
                                            <td colspan='2'><strong>RP.<?php echo number_format("$totalharga") ?></strong></td>
                                    </tr>

                                    <tbody>
                                    </table>
                                    </td>
                                    <?php
                                    echo "</tr>";
                                }
                                       
                                    ?>
                                    <tbody>
                                </table>
                                <a href="cetaktransaksi.php" target="_blank" class="btn btn-md btn-success float-end">Cetak Transaksi</a>
                                </div>
                                </div>
                                </div>
                                </body>
