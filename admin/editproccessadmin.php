<?php
if (isset($_POST['edit'])) {
include '../koneksi.php';
session_start();
 $username = $_POST['username'];
 $id = $_POST['id'];
 $email = $_POST['email'];
 $pekerjaan = $_POST['pekerjaan'];
 $jeniskelamin = $_POST['jeniskelamin'];
 $thumbnail = $_POST['thumbnail'];
 $extension_allowed = array('png', 'jpg','jpeg');
 $name = $_FILES['thumbnail']['name'];
 $x = explode('.', $name);
 $extension = strtolower(end($x));
 $size = $_FILES['thumbnail']['size'];
 $file_tmp = $_FILES['thumbnail']['tmp_name'];
 $query = mysqli_query($koneksi, "SELECT email from user WHERE email='$email'");
      if (in_array($extension, $extension_allowed) === true) {
         if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, '../images/' . $name);
            $query = mysqli_query($koneksi, "UPDATE user SET 
            username='$username', jeniskelamin='$jeniskelamin', pekerjaan='$pekerjaan',
            thumbnail='$name' WHERE id='$id'");
            if ($query) {
               $_SESSION['status']="Berhasil Update Data Admin";
               $_SESSION['icon']="success";
               $_SESSION['text']="Data berhasil diperbarui";
               header("Location:menudataadminpage.php");
            } 
            else {
               $_SESSION['status']="Gagal Update Data Admin";
               $_SESSION['icon']="error";
               $_SESSION['text']="Terjadi Kesalahan";
               header("Location:editadminpage.php");
            }
         }
         else {
               $_SESSION['status']="Gagal Update Berita";
               $_SESSION['icon']="error";
               $_SESSION['text']="Extension File Photo tidak sesuai";
               header("Location:editadminpage.php?");
         }
      }
      else {
         $query = mysqli_query($koneksi, "UPDATE user SET 
         username='$username', jeniskelamin='$jeniskelamin', pekerjaan='$pekerjaan' WHERE id='$id'");
            if ($query) {
                $_SESSION['status']="Berhasil Update Data Admin";
                $_SESSION['icon']="success";
                $_SESSION['text']="Data berhasil diperbarui";
                header("Location:menudataadminpage.php");
            } 
            else {
               $_SESSION['status']="Gagal Update Data Admin";
               $_SESSION['icon']="error";
               $_SESSION['text']="Terjadi Kesalahan";
               header("Location:editadminpage.php");
            }
         }
      }

?>