<?php
if (isset($_POST['register'])) {
include "koneksi.php";
session_start();
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$jeniskelamin =$_POST['jeniskelamin'];
$pekerjaan=$_POST['pekerjaan'];
$password = $_POST['password_user'];
$thumbnail=$_POST['thumbnail'];
$extension_allowed=array('png', 'jpg','jpeg');
$name=$_FILES['thumbnail']['name'];
$x=explode('.', $name);
$extension=strtolower(end($x));
$size=$_FILES['thumbnail']['size'];
$file_tmp=$_FILES['thumbnail']['tmp_name'];
$confirm_password = $_POST['confirm_password'];
$level=$_POST['level'];
// Hashing
$password = sha1($password);
$confirm_password = sha1($confirm_password);
$query = mysqli_query($koneksi, "SELECT email from user WHERE 
email='$email'");
$data = mysqli_fetch_array($query);
if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST['password_user'])){
    $_SESSION['status'] = "Registrasi Gagal";
    $_SESSION['icon'] = "error";
    $_SESSION['text'] ="Password hanya boleh angka dan huruf"; 
    header("Location:register.php");
}
else{
// Validasi
if ($email == $data['email']) {
$_SESSION['danger'] = "E-mail already used";
header("Location:register.php");
} 
else {
if ($password === $confirm_password) {
     if (in_array($extension, $extension_allowed)===true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, 'images/'. $name);

            $create = mysqli_query($koneksi, "INSERT INTO user 
            VALUES('$id','$username','$email','$jeniskelamin','$pekerjaan','$password','$name','$level')");
            if($create){
            $_SESSION['status'] = "Registrasi Berhasil";
            $_SESSION['icon'] = "success";
            $_SESSION['text'] ="Selamat kamu berhasil membuat akun"; 
            header("Location:login.php");
            }
              else {
                $_SESSION['status'] = "Registrasi Gagal";
                $_SESSION['icon'] = "error";
                $_SESSION['text'] ="Oops terjadi kesalahan"; 
                    header("Location:register.php");
                }
        } 
        else{
            $_SESSION['status'] = "Registrasi Gagal";
            $_SESSION['icon'] = "error";
            $_SESSION['text'] ="Ukuran file terlalu besar"; 
                header("Location:register.php");
            } 
        }
        else {
            $_SESSION['status'] = "Registrasi Gagal";
            $_SESSION['icon'] = "error";
            $_SESSION['text'] ="Extension tidak diperbolehkan"; 
                header("Location:register.php");
        }
}
else {
    $_SESSION['status'] = "Registrasi Gagal";
    $_SESSION['icon'] = "error";
    $_SESSION['text'] ="Password tidak sesuai"; 
    header("Location:register.php");
}
}
}
}
?>