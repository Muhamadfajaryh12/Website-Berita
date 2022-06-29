<?php
        include "koneksi.php";
        session_start();
           if(!isset($_SESSION['login'])){
             $_SESSION['status']="Maaf";
             $_SESSION['icon']="error";
             $_SESSION['text']="Anda harus login terlebih dahulu";
           header("location:login.php");
           exit;
       }
        $id="Bisnis";
        $limit = 5;  
          if (isset($_GET["page"])) {
	          $page  = $_GET["page"]; 
	        } 
      	  else{ 
	          $page=1;
	        };  
        $start_from = ($page-1) * $limit;  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="assets/style/style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
               <a class="nav-link dropdown-toggle nav-link text-light fw-bold" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item " href="kategoripolitikpage.php">Politik</a></li>
            <li><a class="dropdown-item" href="kategorimakananpage.php">Makanan</a></li>
            <li><a class="dropdown-item" href="kategoriolahragapage.php">Olahraga</a></li>
            <li><a class="dropdown-item" href="kategoriedukasipage.php">Edukasi</a></li>
            <li><a class="dropdown-item fw-bold" href="kategoribisnispage.php">Bisnis</a></li>
            <li><a class="dropdown-item" href="kategorikesehatanpage.php">Kesehatan</a></li>
           
          </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="user/indexprofil.php">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="aboutpage.php">About</a>
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
    
    <section id="content">
    <div class="container" style="margin-top:50px;">
    <div class="d-flex justify-content-between">
      <h3 class="fw-bold">Berita Terbaru</h3>
        
      </div>
      <hr>
    <div class="row row-cols-1 row-cols-md-3 row-cols-2 row-cols-lg-4 g-4 g-lg-3 m-0 w-100">

        <?php
            $query= $koneksi->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id_kategori WHERE nama_kategori='$id' ORDER BY tgl_berita DESC LIMIT 4");
          
            while ($data=mysqli_fetch_array($query))  {  
        ?>
                <div class="col">
                    <div class="card border-0 h-100 mb-2 mb-md-4">
                        <span class="label-category p-1"><?=$data['nama_kategori']?></span>
                        <img src="images/<?=$data['gambar_berita']?>" alt="" class="thumbnail-latets" style="height:100%">
                        <div class="card-body p-0">
                            <p class="card-title-latets mb-2 mb-md-3 multi-line-truncate"><?=$data['judul_berita']?></p>
                            <a href="beritapage.php?id_berita=<?= $data['id_berita'] ?>"class="stretched-link"></a>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted"><?= $data['tgl_berita']?></small>
                                <small class="text-muted"><?= $data['penulis_berita']?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
                ?>
    </div>
             <div id="content-news" class="row" style="margin-top:50px;">
                <div class="col-12 col-md-12">
                    <h3 class="fw-bold">BACA BERITA</h3>
                    <hr>
                     <?php
                      $result = mysqli_query($koneksi,"SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id_kategori WHERE nama_kategori='$id' ORDER BY id_berita DESC LIMIT $start_from, $limit");
                      while ($data=mysqli_fetch_array($result))  {  
                      ?>
                      <div class="card border-0 w-100">
                          <div class="row g-0 align-items-center">
                            <div class="col-md-4 col-4 position-relative">
                                <img src="images/<?=$data['gambar_berita']?>" class="img-fluid rounded my-auto" style="width:400px; heigth:100%;">
                            </div>
                            <div class="col-md-8 col-8">
                                <div class="card-body p-2 p-md-3">
                                    <h3 class="text-danger fw-bold list-label"><?=$data['nama_kategori']?></h3>
                                    <h2 class="card-title multi-line-truncate list-judul my-lg-4"><?=$data['judul_berita']?></h2>
                                    <a href="beritapage.php?id_berita=<?= $data['id_berita'] ?>"class="stretched-link"></a>
                                    <large class="text-muted penulis me-4"><?=$data['penulis_berita']?></large>
                                    <large class="text-muted"><?=$data['tgl_berita']?></large>
                                </div>
                            </div>
                         </div>
                        <hr class="m-2">
                    </div> 
                      <?php
        }
        ?>
</div>
<?php  
$result_db = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM berita WHERE id_kategori ='2'"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 

$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link bg-dark text-white' href='kategoribisnispage.php?page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";  
?>

            </div>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
<?php
include "footer.php";
?>

    </body>
    </html>