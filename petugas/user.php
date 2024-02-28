<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description">

                <h4 class="card-title">Daftar User</h4>
                <?php
                if ($_SESSION['Level']== "admin") {
                    ?>
                    <a href="?page=tambah-user" class="btn btn-primary btn-sm">Tambah User+</a>
                    <?php
                }
                ?>
                </p>

                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <?php if ($_SESSION['Level'] == "admin") { ?>
                            <th>Pilihan</th>
                            <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM user");
                                while ($data= $sql->fetch_assoc())  {

                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['Username']; ?></td>
                                        <td><?php echo $data['Password']; ?></td> 
                                        <td><?php echo $data['Level']; ?></td>
                                        <?php if ($_SESSION['Level'] == "admin") { ?>
                                        <td><a type='button' href='?page=edit-user&UserID=<?= $data['UserID']; ?>'class='btn btn-sm btn-warning'>Edit</a> <a onclick="return confirm('Apakah anda yakin ingin menghapus nya!!')" type='button' href='?page=hapus_user&UserID=<?= $data['UserID']; ?>' class='btn btn-sm btn-danger'>Delete</a></td>
                                        
                                        <?php  } ?>
                                        </tr>
                                        <?php } ?>
                                        </table>
                                        </div>

                                        </div>
                                        </div>
                                        </div>
                                        </div>