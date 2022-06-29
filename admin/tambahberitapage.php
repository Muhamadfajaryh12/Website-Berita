<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita Page</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
	<?php
	    session_start();
   if(!isset($_SESSION['login'])){
     header("location:../login.php");
     exit;
   }
    include "../koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM  user WHERE id='$_SESSION[id]'");
    $data = mysqli_fetch_array($query);

    ?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark ">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="# "class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <h2 class="fw-bold d-none d-sm-inline" style="border-bottom:1px solid white; width:100%;">ADMIN PAGE</h2>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" style="font-size:20px;">
                           <i class="bi bi-menu-up text-light"></i> <span class="ms-1 d-none d-sm-inline text-light">Menu Admin</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                        <li class="w-100">
                                <a href="databeritapage.php" class="nav-link px-0 text-light" style="font-size:15px;"> <span class="d-none d-sm-inline">Data Berita</span> <i class="bi bi-clipboard-data"></i></a>
                            </li>
                            <li>
                                <a href="menudataadminpage.php" class="nav-link px-0 text-light" style="font: size 15px;px;"> <span class="d-none d-sm-inline">Data Admin</span> <i class="bi bi-person-fill"></i> </a>
                            </li>
                            <li>
                                <a href="dataulasanpage.php" class="nav-link px-0 text-light" style="font: size 15px;px;"> <span class="d-none d-sm-inline">Data Ulasan </span><i class="bi bi-graph-up"></i></a>
                            </li>
                             <li>
                                <a href="gantipasswordadmin.php" class="nav-link px-0 text-light" style="font: size 15px;px;"> <span class="d-none d-sm-inline">Ganti Password</span> <i class="bi bi-gear"></i> </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img src="../images/<?=$data['thumbnail']?>" style="width :35px; height:35px; border-radius:50%;" class="d-inline-block align-text-top">
                        <?=$data['username']?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="indexadmin.php">Home <i class="bi bi-house"></i></a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item" style="width:100px; background-color:black; text-align:center; border-radius:15px;">
                                <a class="nav-link active fw-bold" aria-current="page" href="../logout.php" style="color:white;">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header" style="background-color:black;">
                            <div class="d-flex justify-content-between">
                                <h2 class="text-white fw-bold">Tambah Berita</h2>
                                <a href="databeritapage.php" class="btn btn-secondary fw-bold">Daftar Berita</a>
                            </div>
                        </div>
                        <div class="card-body" style="background-color:#e4dfdf;">
                            <form action="tambahprosesberita.php" method="post" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="judul_berita" class="form-label">Judul Berita</label>
                                    <input type="text" name="judul_berita" id="judul_berita" class="form-control">
                                </div>
                                 <div class="mb-4">
                                    <label for="penulis_berita" class="form-label">Penulis Berita</label>
                                    <input type="text" name="penulis_berita" id="penulis_berita" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="isi_berita" class="form-label">Content</label>
                                    <textarea name="isi_berita" id="isi_berita" class="form-control"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="id_kategori" class="category">Category</label>
                                    <select name="id_kategori" id="id_kategori" class="form-select">
                                        <option value="1">Politik</option>
                                        <option value="2">Bisnis</option>
                                        <option value="3">Olahraga</option>
                                        <option value="4">Makanan</option>
                                        <option value="5">Kesehatan</option>
                                        <option value="6">Edukasi</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                <label for="tgl_berita">Tanggal</label>
                                <input type="date" name="tgl_berita" value="<?php echo date('Y-m-d'); ?>" />
                                </div>
                                <div class="mb-4">
                                    <label for="gambar_berita" class="Thumbnail">Thumbnail</label>
                                    <input type="file" name="gambar_berita" id="gambar_berita" class="form-control">
                                </div>
                                <div class="text-center">
                                <button type="submit" name="add" class="btn btn-dark">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
    </body>
</html>