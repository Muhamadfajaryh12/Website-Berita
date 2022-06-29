<?php
if (isset($_POST['submit'])) {
include "../koneksi.php";
session_start();
$password=$_POST['currentPassword'];
$password=sha1($password);
$newpassword=$_POST['newPassword'];
$newpassword=sha1($newpassword);
$result = mysqli_query($koneksi,"SELECT *from user WHERE id='$_SESSION[id]'");
$row=mysqli_fetch_array($result);
if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST['newPassword'])){
    $_SESSION['status'] = "Registrasi Gagal";
    $_SESSION['icon'] = "error";
    $_SESSION['text'] = "Password hanya boleh angka dan huruf"; 
    header("Location:gantipasswordadmin.php");
}
else{
       if($password == $row["password_user"] && $_POST['newPassword']==$_POST['confirmPassword']) {
        mysqli_query($koneksi,"UPDATE user SET password_user ='$newpassword' WHERE id='$_SESSION[id]'");
        $_SESSION['status']="Ganti Password Berhasil";
        $_SESSION['icon']="success";
        $_SESSION['text']="Password telah diperbarui";
        header("location:gantipasswordadmin.php");
    }   
        else{
        $_SESSION['status']="Gagal Ganti Password";
        $_SESSION['icon']="error";
        $_SESSION['text']="Password tidak sesuai";
        header("location:gantipasswordadmin.php");
    }
}
}
?>