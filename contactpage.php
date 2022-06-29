<?php
 session_start();
 if(!isset($_SESSION['login'])){
   $_SESSION['status']="Maaf";
   $_SESSION['icon']="error";
   $_SESSION['text']="Anda harus login terlebih dahulu";
 header("location:login.php");
 exit;
}
    include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM  user WHERE id='$_SESSION[id]'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                <a class="nav-link text-light" href="user/indexuser.php">Berita</a>
              </li>
              <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle nav-link text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="kategoripolitikpage.php">Politik</a></li>
            <li><a class="dropdown-item" href="kategorimakananpage.php">Makanan</a></li>
            <li><a class="dropdown-item" href="kategoriolahragapage.php">Olahraga</a></li>
            <li><a class="dropdown-item" href="kategoriedukasipage.php">Edukasi</a></li>
            <li><a class="dropdown-item" href="kategoribisnispage.php">Bisnis</a></li>
            <li><a class="dropdown-item" href="kategorikesehatanpage.php">Kesehatan</a></li>
           
          </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="user/indexprofil.php">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="user/aboutpageuser.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light fw-bold" href="contactpage.php">Contact Me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <?php   
      $query = mysqli_query($koneksi, "SELECT * FROM  user WHERE id='$_SESSION[id]'");
      $data = mysqli_fetch_array($query);   
      ?>
      <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header" style="background-color:black;">
                            <div class="d-flex justify-content-between">
                                <h2 class="fw-bold text-white">Contact Us</h2>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" style="background-color:#e4dfdf;">
                              <form action="contactpageproses.php" method="post"enctype="multipart/form-data">
                              <input  type="hidden" id="id" name="id" value="<?=$data['id']?>">  
                              <div class="mb-4">
                                    <label for="usename" class="form-label">Username</label>
                                    <input
                                        type="text"
                                        name="username"
                                        id="username"
                                        class="form-control"
                                        disabled
                                        value="<?=$data['username']?>">
                                    </div>
   
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="form-control"
                                        disabled
                                        value="<?=$data['email']?>">
                                    </div>
                                <div class="mb-4">
                                    <label for="content" class="form-label">Pesan yang ingin disampaikan</label>
                                    <input type="text" name="judul_ulasan" id="judul_ulasan" class="form-control" placeholder="Judul">
                                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Silahkan tuliskan pesan anda"></textarea>
                                </div>
    
                                <div class="text-center">
                                <button type="submit" class="btn btn-dark text-white" name="submit">Kirim</button>
                                </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <?php
   if (isset($_SESSION['status'])&& $_SESSION['status']!='')
   {
       ?> 
       <script>
           swal.fire({
               title:"<?php echo $_SESSION['status'];?>",
               icon:"<?php echo $_SESSION['icon'];?>",
               text:"<?php echo $_SESSION['text'];?>"
           })
       </script>
       <?php
       unset($_SESSION['status']);
       unset($_SESSION['icon']);
       unset($_SESSION['text']);
   }
   ?>
      <?php
      include "footer.php";
      ?>
</body>
</html>