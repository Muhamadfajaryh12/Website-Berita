<?php
if (isset($_GET['id_ulasan'])) {
    session_start();
 include "../koneksi.php";
 $id = $_GET['id_ulasan'];
 $query = mysqli_query($koneksi, "DELETE FROM ulasan WHERE 
id_ulasan='$id'");
 if ($query) {
 $_SESSION['status']="Data Berhasil Dihapus";
 $_SESSION['icon']="success";
 $_SESSION['text']="Data telah dihapus";
 header("Location:dataulasanpage.php");
 } else {
 $_SESSION['status']="Data Gagal Dihapus";
 $_SESSION['icon']="error";
 $_SESSION['text']="Terjadi Kesalahan";
 header("Location:dataulasanpage.php");
 }
}
?>