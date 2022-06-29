<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Baca Ulasan </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <style>
        #menu a:hover{
    backdrop-filter: blur(10px) saturate(180%);
    -webkit-backdrop-filter: blur(10px) saturate(180%);
    background-color: rgba(156, 156, 165, 0.78);
        }
  </style>
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
                                <a href="menudataadminpage.php" class="nav-link px-0 text-light" style="font: size 15px;"> <span class="d-none d-sm-inline">Data Admin</span> <i class="bi bi-person-fill"></i> </a>
                            </li>
                            <li>
                                <a href="dataulasanpage.php" class="nav-link px-0 text-light" style="font: size 15px;"> <span class="d-none d-sm-inline">Data Ulasan </span><i class="bi bi-graph-up"></i></a>
                            </li>
                             <li>
                                <a href="gantipasswordadmin.php" class="nav-link px-0 text-light" style="font: size 15px;"> <span class="d-none d-sm-inline">Ganti Password</span> <i class="bi bi-gear"></i> </a>
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
          <a class="nav-link active fw-bold" aria-current="page" href="logout.php" style="color:white;">Logout</a>
        </li>
    </ul>
  </div>
</div>
</nav>
        <?php
if (isset($_GET['id_ulasan'])) {
include "../koneksi.php";
$id = $_GET['id_ulasan'];
$query = mysqli_query($koneksi,"SELECT * FROM ulasan INNER JOIN user ON ulasan.id_user=user.id WHERE id_ulasan ='$id'");
$data = mysqli_fetch_array($query);
?>
 <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header" style="background-color:black;">
                            <div class="d-flex justify-content-between">
                                <h2 class="fw-bold text-white">Baca Ulasan</h2>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" style="background-color:#e4dfdf;">
                              <form>
                                  <h3 class="fw-bold"> Data Pengirim :</h3>
                              <input  type="hidden" id="id" name="id" value="<?=$data['id']?>">  
                              <div class="mb-2">
                                    <h5><label for="usename" class="form-label">Username :</label>
                                    <?php echo $data['username']?></h5>                           
                                </div>
                                <div class="mb-2">
                                <h5><label for="email" class="form-label"> Email :</label>
                                    <?php echo $data['email']?></h5>                          
                                </div>
                                <div class="mb-4">
                                    <h5><label for="content" class="form-label">Judul :</label>
                                    <?php echo $data['judul_ulasan']?></h5>
                                    <label for="content" class="form-label">Pesan yang disampaikan</label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" disabled><?= $data['content']?></textarea>
                                </div>
                                <div class="text-center">
                                    <a href="dataulasanpage.php" class="btn btn-dark text-white">Kembali</a>
                                </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
</body>
</html>