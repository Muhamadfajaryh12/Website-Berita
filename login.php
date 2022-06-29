<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link href="login.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
            <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootst
rap.min.css"
            rel="stylesheet"
            integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
        </head>
    <body  style="background-color: #eee;">

        <?php
session_start();
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
                <a class="nav-link text-light" href="index.php">Berita</a>
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
                <a class="nav-link text-light" href="aboutpage.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="contactpage.php">Contact Me</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link text-light fw-bold" href="login.php">Login</a>
              </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="register.php ">Sign Up</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
<section class="container">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <h4 class="mt-1 mb-5 pb-1 fw-bold">Welcome to NEWS</h4>
                </div>
                <form action="loginproccess.php" method="post">
                  <p>Silahkan login menggunakan akun anda</p>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="id">ID</label>
                    <input type="text" name="id" id="id" class="form-control"
                      placeholder="Masukkan ID anda" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password_user">Password</label>
                    <input type="password" name="password_user" id="password_user" class="form-control" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                   <button type="submit" class="btn btn-dark" name="login" id="btn">Login</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Belum memiliki akun?</p>
                    <a href="register.php">
                    <button type="button" class="btn btn-outline-primary">Register</button>
                    </a>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4 fw-bold">NEWS</h4>
                <p class="small mb-0" style="text-align:justify;">Merupakan sebuah website berita yang menyediakan berita terbaru, terpecaya dan memiliki fitur yang 
                    memudahkan pembaca mencari berita yang ingin dibaca dan membuat pembaca nyaman dalam membaca berita.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="js/bootstrap.min.js"></script>
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
       <?php
       include "footer.php";
       ?>
    </body> 
</html