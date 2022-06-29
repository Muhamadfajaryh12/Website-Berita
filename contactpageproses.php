<?php
if (isset($_POST['submit'])) {
include "koneksi.php";
session_start();
$id = $_POST['id'];
$judul =$_POST['judul_ulasan'];
$content=$_POST['content'];
$create = mysqli_query($koneksi, "INSERT INTO ulasan 
VALUES(NULL,'$id','$judul','$content')");
if($create){
$_SESSION['status'] = "Berhasil Mengirim";
$_SESSION['icon'] = "success";
$_SESSION['text']= "Berhasil mengirim ulasan"; 
header("Location:contactpage.php");
}
  else {
    $_SESSION['status'] = "Gagal";
    $_SESSION['icon'] = "error";
    $_SESSION['text'] ="Oops terjadi kesalahan"; 
        header("Location:contactpage.php");
    }
} 
else{
    $_SESSION['status'] = "Gagal";
    $_SESSION['icon'] = "error";
    $_SESSION['text'] ="Oops terjadi kesalahan2"; 
        header("Location:contactpage.php");
}