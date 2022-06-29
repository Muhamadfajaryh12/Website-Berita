<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
   include "../koneksi.php";
   $query = mysqli_query($koneksi, "SELECT * FROM  user WHERE id='$_SESSION[id]'");
   $data = mysqli_fetch_array($query);
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
      <div class="container">
      <div class="card" style="height:550px; margin-top:50px;">
         <center> <img src="../images/<?= $data['thumbnail']?>"class="card-img-top" alt="" style="border-radius:50%; width:150px; height:150px; margin:10px;" ></center>
         <h2 style="text-align:center;">Profile</h2>
         <div class="card-body"style="border-top:1px solid black;background-color:black;">
          <table>   
          <tr><td><label for="username" style="font-size:13px; color:white;">Username</label></td></tr>
          <tr><td name="username" id="username" style="border-bottom:1px solid white; width:100%; color:white;"><?= $data['username']?><td></tr>
          <tr><td><label for="email" style="font-size:13px; color:white;">Email</label></td></tr>
          <tr><td name="email"id="email" style="border-bottom:1px solid white; width:100%; color:white;"><?= $data['email']?><td></tr>
          <tr><td><label for="jk" style="font-size:13px; color:white;">Jenis Kelamin</label></td></tr>
          <tr><td name="jk"id="jk" style="border-bottom:1px solid white; width:100%; color:white;"><?= $data['jeniskelamin']?><td></tr>
          <tr><td><label for="pekerjaan" style="font-size:13px; color:white;">Pekerjaan</label></td></tr>
          <tr><td name="pekerjaan"id="pekerjaan" style="border-bottom:1px solid white; width:100%; color:white;"><?= $data['pekerjaan']?><td></tr>
        </table>
        <div class="text-center">
      <div class="btn-group" style="margin-top:20px;">
      <a href="editprofiluser.php?id=<?= $data['id'] ?>" class="btn btn-secondary" style="border-radius:10px;">Edit Profil</a>
      <a href="gantipassword.php?id=<?= $data['id'] ?>" class="btn btn-secondary" style="margin-left:10px;border-radius:10px;">Ganti Password</a>
      </div> 
    </div>
  </div>
</div>
      </div>
      <script src="../js/bootstrap.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <?php
       if (isset($_SESSION['status'])&& $_SESSION['status']!='')
   {
       ?> 
       <script>
           swal.fire({
               title:"<?php echo $_SESSION['status']; ?>",
               icon:"<?php echo $_SESSION['icon']; ?>",
               text:"<?php echo $_SESSION['text']; ?>",
           })
       </script>
       <?php
       unset($_SESSION['status']);
       unset($_SESSION['icon']);
       unset($_SESSION['text']);
   }
   ?>
   <br>
   <?php
include "../footer.php"
?>
</body>
</html>