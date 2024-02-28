<?php
include "../koneksi/koneksi.php";
error_reporting(0);
session_start();
if (isset($_SESSION['Username'])) {
    echo "<script>alert('Maaf, Anda Sudah Login. Silahkan Logout Terlebih Dahulu'); window.location.replace('index.php')</script>";
}

if (isset($_POST['submit'])) {
   $Username = $_POST['Username'];
   $Password = md5($_POST['Password']);

   $sql ="SELECT * FROM user WHERE Username='$Username' AND Password='$Password' ";
   $result = mysqli_query($koneksi,$sql);

   if ($result->num_rows > 0) {
$row = mysqli_fetch_assoc($result);

$Level =$row['Level'];
$_SESSION ['Level']= $Level;
$_SESSION ['Username'] = $row['Username'];
header("Location: index.php") ;
echo"<script>alert('Berhasil Masuk!')</script>";
   } else {
    echo "<script>alert('Username atau password anda salah.Silangkan coba lagi') </script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN</title>

        <link rel="stylesheet"href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container nt-5">
        
    <div class="row justify-content-center">
       
    <div  class="col-md-4">
            <div  class="card">
                <div class="card-header">
                    <h3 class="text-center">login</h3>
                </div>
                <div  class="card-body">
                    <form action=""method="post">
                        <div class="mb-3 mt-3">
                            <label for="" class="form=label">Nama</label>
                            <input type="text" name="Username" class="form-control"required>
                         </div>
                          <div class="mb-3">
                            <label for="" class="form=label">Password</label>
                            <input type="password" name="Password" class="form-control"required>
                         </div>
                         <button name="submit" class="btn btn-primary">login</button>
                         </from>
                     </div>
                  </div>
               </div>
          </div>

          <script src="../assets/bootstrap.min.js"></script>
          <script src="../assets/jquery.min.js"></script>
</body>
</html>

