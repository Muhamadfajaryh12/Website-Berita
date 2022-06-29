<?php
if (isset($_POST['edit'])) {
include '../koneksi.php';
session_start();
 $id = $_GET['id'];
 $username = $_POST['username'];
 $email=$_POST['email'];
 $pekerjaan = $_POST['pekerjaan'];
 $jeniskelamin = $_POST['jeniskelamin'];
 $thumbnail = $_POST['thumbnail'];
 $extension_allowed = array('png', 'jpg','jpeg');
 $name = $_FILES['thumbnail']['name'];
 $x = explode('.', $name);
 $extension = strtolower(end($x));
 $size = $_FILES['thumbnail']['size'];
 $file_tmp = $_FILES['thumbnail']['tmp_name'];
    if (in_array($extension, $extension_allowed) === true) {
      if ($ukuran < 1044070) {
       move_uploaded_file($file_tmp, '../images/' . $name);
       $query = mysqli_query($koneksi, "UPDATE user SET 
       username='$username', email='$email', jeniskelamin='$jeniskelamin',pekerjaan='$pekerjaan', 
       thumbnail='$name' WHERE id='$_SESSION[id]'");
          if ($query) {
            $_SESSION['status']="Profile Berhasil Diganti";
            $_SESSION['icon']="success";
            $_SESSION['text']="Data Profile telah diperbarui";
            header("Location:indexprofil.php");
          }       
          else {
            $_SESSION['status']="Gagal Mengganti Profile";
            $_SESSION['icon']="error";
            $_SESSION['text']="Terjadi Kesalahan ";
            header("Location:indexprofil.php");
          }
    } 
    else {
    $_SESSION['status']="Gagal Mengganti Profile";
    $_SESSION['icon']="error";
    $_SESSION['text']="Ukuran File Terlalu Besar";
    header("Location:indexprofil.php");
    }
} 
  else {
    $query = mysqli_query($koneksi, "UPDATE user SET 
    username='$username', email='$email', jeniskelamin='$jeniskelamin',pekerjaan='$pekerjaan' WHERE id='$_SESSION[id]'");
    if ($query) {
    $_SESSION['status']="Profile Berhasil Diganti";
    $_SESSION['icon']="success";
    $_SESSION['text']="Data Profile telah diperbarui";
    header("Location:indexprofil.php");
    }  
    else {
    $_SESSION['status']="Gagal Mengganti Profile";
    $_SESSION['icon']="error";
    $_SESSION['text']="Terjadi Kesalahan ";
    header("Location:indexprofil.php");
    }
 }
}
?>