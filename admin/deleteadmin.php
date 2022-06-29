<?php
if (isset($_GET['id'])) {
    session_start();
 include "../koneksi.php";
 $id = $_GET['id'];
 $query = mysqli_query($koneksi, "DELETE FROM user WHERE 
id='$id'");
 if ($query) {
 $_SESSION['status']="Data Berhasil Dihapus";
 $_SESSION['icon']="success";
 $_SESSION['text']="Data telah dihapus";
 header("Location:menudataadminpage.php");
 } else {
 $_SESSION['status']="Data Gagal Dihapus";
 $_SESSION['icon']="error";
 $_SESSION['text']="Terjadi Kesalahan";
 header("Location:menudataadminpage.php?");
 }
}
?>