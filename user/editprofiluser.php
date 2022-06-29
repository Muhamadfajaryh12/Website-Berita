<?php
if (isset($_GET['id'])) {
    session_start();
include "../koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE 
id='$id'");
$data = mysqli_fetch_array($query);
if(!isset($_SESSION['login'])){
  $_SESSION['status']="Maaf";
  $_SESSION['icon']="error";
  $_SESSION['text']="Anda harus login terlebih dahulu";
header("location:../login.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
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
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="#"><h2>NEWS</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-list text-white"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link text-light" href="indexuser.php">Berita</a>
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
                <a class="nav-link text-light" href="../contactpage.php">Contact Me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="../logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container" style="height:750px;">
    <div class="card" style="height:650px; margin-top:50px; width:400px;">
         <center> <img  src="../images/<?= $data['thumbnail'] ?>"class="card-img-top" alt="" style="border-radius:50%; width:150px; height:150px; margin:10px;" ></center>
         <h2 style="text-align:center;">Profile</h2>
        <div class="card-body">
           <form action="editproccesprofiluser.php" method="post" enctype="multipart/form-data" >
               <input type="hidden" name="id" value="<?= $id?>">
                <label for="username" class="form-label">Username</label>
                   <input type="text" name="username" id="username" class="form-control" value="<?= $data['username']?>">
                <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?= $data['email']?>">
                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                  <select name="jeniskelamin" id="jeniskelamin" class="form-select">
                                        <option
                                            value="Laki-Laki"
                                            <?= $data['jeniskelamin'] == "Laki-Laki" ? "Pilih" : "" ?>>Laki-Laki</option>
                                        <option
                                            value="Perempuan"
                                            <?= $data['jeniskelamin'] == "Perempuan" ? "Pilih" : "" ?>>Perempuan</option>
                  </select>
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                  <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="<?= $data['pekerjaan']?>">
                <label for="thumbnail" class="Thumbnail">Foto Profile</label>
                  <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                <div class="text-center" style="margin-top:10px;">
                  <button type="submit" name="edit" class="btn btn-dark">Konfirmasi Edit</button>
                </div>
                </form>
        </div>
    </div>
</div>

<script src="../js/bootstrap.min.js"></script>
<?php
include "../footer.php";
?>
</body>
</html>
<?php
}
?>