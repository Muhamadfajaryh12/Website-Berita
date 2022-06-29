<?php
if (isset($_POST['registeradmin'])) {
include "../koneksi.php";
session_start();
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$pekerjaan=$_POAST['pekerjaan'];
$jeniskelamin =$_POST['jeniskelamin'];
$password = $_POST['password'];
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
// Validasi
if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST['password'])){
    $_SESSION['status'] = "Registrasi Gagal";
    $_SESSION['icon'] = "error";
    $_SESSION['text'] = "Password hanya boleh angka dan huruf"; 
    header("Location:tambahadminpage.php");
}
else{
if ($email == $data['email']) {
    $_SESSION['status']="Gagal Menambahkan Data";
                    $_SESSION['icon']="error";
                    $_SESSION['text']="Email sudah digunakan";
                    header("Location:tambahadminpage.php");
} 
else {
if ($password === $confirm_password) {
     if (in_array($extension, $extension_allowed)===true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, '../images/'. $name);

            $create = mysqli_query($koneksi, "INSERT INTO user 
            VALUES('$id','$username','$email','$jeniskelamin','$pekerjaan','$password','$name','$level')");
            if($create){
                    $_SESSION['status']="Berhasil Menambahkan Data";
                    $_SESSION['icon']="success";
                    $_SESSION['text']="Data berhasil disimpan";
            header("Location:menudataadminpage.php");
            }
              else {
                     $_SESSION['status']="Gagal Menambahkan Data";
                    $_SESSION['icon']="error";
                    $_SESSION['text']="Terjadi Kesalahan";
                    header("Location:tambahadminpage.php");
                }
        } 
        else{
                  $_SESSION['status']="Gagal Menambahkan Data";
                    $_SESSION['icon']="error";
                    $_SESSION['text']="File Terlalu Besar";
                header("Location:tambahadminpage.php");
            } 
        }
        else {
               $_SESSION['status']="Gagal Menambahkan Data";
                    $_SESSION['icon']="error";
                    $_SESSION['text']="Extension tidak diperbolehkan";
            header("Location:tambahadminphp.php");
        }
}
else {
      $_SESSION['status']="Gagal Menambahkan Data";
                    $_SESSION['icon']="error";
                    $_SESSION['text']="Terjadi Kesalahan";
header("Location:datamenuadminpage.php");
}
}
}
}
?>