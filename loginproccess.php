<?php
if (isset($_POST['login'])) {
include "koneksi.php";
session_start();
$id= $_POST['id'];
$password = $_POST['password_user'];
// Hashing
$password = sha1($password);
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE 
id ='$id' AND password_user='$password'");
$data = mysqli_fetch_array($query);
    if (mysqli_num_rows($query) > 0) {
      if($data['level_user']=="admin"){
           $_SESSION['id']=$data['id'];
           $_SESSION['level_user']=="admin";
           $_SESSION['berhasil']="Selamat Kamu Berhasil Login";
           $_SESSION['password_user']=$data['password_user'];
           $_SESSION['login'] = true;
           header("Location:admin/indexadmin.php");
      }
      else if($data['level_user']=='user'){
           $_SESSION['username'] = $data['username'];
           $_SESSION['id']=$data['id'];
           $_SESSION['password_user']=$data['password_user'];
           $_SESSION['level_user']=="user";
           $_SESSION['berhasil']="Selamat Kamu Berhasil Login";
           $_SESSION['login'] = true;
           header("Location:user/indexuser.php");
      }
      else{
          echo "eror";
      }
}
else {
$_SESSION['status'] = "Login Gagal";
$_SESSION['icon']="error";
$_SESSION['text']="Password anda salah";
header("Location:login.php");
}
}
?>