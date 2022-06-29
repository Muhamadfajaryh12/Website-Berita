<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../animasi.css" rel="stylesheet">
    <style>
        .card {
          border:none;
          
}
.table a{
      text-decoration:none;
      color:black
    }
    .table a:hover{
      color:blue;
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
   $limit = 5;  
   if (isset($_GET["page"])) {
     $page  = $_GET["page"]; 
     } 
     else{ 
     $page=1;
     };  
   $start_from = ($page-1) * $limit;  
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
                <a class="nav-link text-light fw-bold" href="indexuser.php">Berita</a>
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
                <a class="nav-link text-light" href="indexprofil.php">Profil</a>
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
<div class="judul">
<div class="title">
   <div class="content">
            <h2>NEWS</h2>
            <h2>NEWS</h2>
    </div>
</div>
<div class="title2">
    <h1 style="color:gray;">Hello <span style="color:white;"><?= $data['username']?></span>,Selamat Datang Di Website</h1>
</div>
</div>
<section id="content">
        <div class="container" style="margin-top:50px;">
         <form class="d-flex" method="post" style="margin-bottom:50px;">
      <input class="form-control me-2" type="text" name="keyword" placeholder="Cari Judul Berita" aria-label="Search">
      <button class="btn btn-outline-dark" type="submit" name="cari"><i class="bi bi-search"></i></button>
    </form>
             <div id="content-news" class="row">
                <div class="col-12 col-md-8">
                    <h3 class="fw-bold">BACA BERITA</h3>
                    <hr>
                        <?php 
                          include "../koneksi.php";
                          error_reporting(0);
  $no = 1;
  $keyword=$_POST['keyword'];
  
      if ($keyword !=''){
         $result = mysqli_query($koneksi, "SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id_kategori WHERE judul_berita LIKE '%$keyword%' LIMIT $start_from, $limit");
      }
            else{
              $result = mysqli_query($koneksi,"SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id_kategori ORDER BY RAND() LIMIT $start_from, $limit");
            }
              while ($data=mysqli_fetch_array($result))  {  
          ?>
                      <div class="card border-0 w-100">
                        
                          <div class="row g-0 align-items-center">
                              <div class="col-md-4 col-4 position-relative">
                                  <img src="../images/<?=$data['gambar_berita']?>" class="img-fluid rounded my-auto" style="width:100%; heigth:100%;">
                              </div>
                              <div class="col-md-8 col-8">
                                  <div class="card-body p-2 p-md-3">
                                      <span class="text-danger fw-bold list-label"><?=$data['nama_kategori']?></span>
                                      <h5 class="card-title multi-line-truncate list-judul my-lg-4"><?=$data['judul_berita']?></h5>
                                      <a href="../beritapage.php?id_berita=<?= $data['id_berita'] ?>"class="stretched-link"></a>
                                      <small class="text-muted penulis me-4"><?=$data['penulis_berita']?></small>
                                      <small class="text-muted"><?=$data['tgl_berita']?></small>
                                  </div>
                              </div>
                          </div>
                          <hr class="m-2">
                      </div> 
                        <?php
          }
          ?>
          <?php  
  
  $result_db = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM berita"); 
  $row_db = mysqli_fetch_row($result_db);  
  $total_records = $row_db[0];  
  $total_pages = ceil($total_records / $limit); 
  /* echo  $total_pages; */
  $pagLink = "<ul class='pagination'>";  
  for ($i=1; $i<=$total_pages; $i++) {
                $pagLink .= "<li class='page-item'><a class='page-link bg-dark text-white' href='indexuser.php?page=".$i."'>".$i."</a></li>";	
  }
  echo $pagLink . "</ul>";  
  ?>
            </div>
         <div class="col-md-4 border-start d-none d-md-block">
                    <h3 class="fw-bold">Berita Terbaru</h3>
                    <hr>
                    <table class="table table-striped border" style="border-radius:15px;">
                      <?php
                      $no=1;
                           include "../koneksi.php";
            $query= $koneksi->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id_kategori  ORDER BY tgl_berita DESC LIMIT 10");
            while ($data=mysqli_fetch_array($query))  {  
                      ?>
                        <tr>
                            <th scope="row"><?=$no++?></th>
                            <td>
                                <span class="fw-bold text-dark"><?= $data['nama_kategori']?></span>
                                <br>
                                <a href="../beritapage.php?id_berita=<?= $data['id_berita'] ?>" class="multi-line-truncate mb-0 mt-2"><?=$data['judul_berita']?></a>
                            </td>
                        </tr>
                     
                     <?php
            }?>
        </table>
          
      </div>
         </div>
    </div>
  </section>
</div>

      </div>
    </section>
      </div>
<script src="../js/bootstrap.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <?php
   if (isset($_SESSION['berhasil'])&& $_SESSION['berhasil']!='')
   {
       ?> 
       <script>
           swal.fire({
               title:"Login Sukses",
               icon:"success"
           })
       </script>
       <?php
       unset($_SESSION['berhasil']);
   }
   ?>
   <?php
   include "../footer.php";
   ?>
</body>
</html>