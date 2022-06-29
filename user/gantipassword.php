<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   <style>
                .container {
                display: flex;
                justify-content: center;
                flex-direction: row;
                }
                .card{
                box-shadow: 5px 10px 8px #888888;
                border-radius: 15px;
                border: 1px solid rgba(209, 213, 219, 0.3);
                width:350px;
                }
   </style>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['login'])){
  $_SESSION['status']="Maaf";
  $_SESSION['icon']="error";
  $_SESSION['text']="Anda harus login terlebih dahulu";
header("location:../login.php");
exit;
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="#"><h2>NEWS</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-list text-white"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link text-light" href="indexlogin.php">Berita</a>
              </li>
              <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle nav-link text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="../kategoripolitikpage.php">Politik</a></li>
            <li><a class="dropdown-item" href="../kategorimakananpage.php">Makanan</a></li>
            <li><a class="dropdown-item" href="../kategoriolahragapage.php">Olahraga</a></li>
            <li><a class="dropdown-item" href="../kategoriedukasipage.php">Edukasi</a></li>
            <li><a class="dropdown-item" href="../kategoribisnispage.php">Bisnis</a></li>
            <li><a class="dropdown-item" href="../kategorikesehatanpage.php">Kesehatan</a></li>
           
          </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light fw-bold" href="indexprofil.php">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="aboutpageuser.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="contactpage.php">Contact Me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<div class="container" style="height:580px;">
    <div class="card" style="height:400px; width:400px; margin-top:50px;">
        <div class="card-body">
            <h3 class="fw-bold" style="text-align:center">Ganti Password</h3>
                    <form action="gantipasswordproccess.php" method="post"enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="currentPassword" class="form-label">Password Lama</label>
                                    <input type="password" name="currentPassword" id="currentPassword" class="form-control" require="required">
                                </div>            
                                <div class="mb-4">
                                    <label for="newPassword" class="form-label">Password Baru</label>
                                <input type="password" name="newPassword" id="newPassword" class="form-control" require="required">
                                </div>
                                <div class="mb-4">
                                     <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
                                   <input type="password" name="confirmPassword"  id="confirmPassword" class="form-control" require="required">
                                </div>  
                                <div class="text-center">
                                <button type="submit" class="btn btn-dark" name="submit">Konfirmasi</button>
                                </div>
                            </form>
                    </div>
           
         </div>
    </div>
</div>
<script src="../js/bootstrap.min.js"></script>

<?php
include "../footer.php";
?>
</body>
</html>