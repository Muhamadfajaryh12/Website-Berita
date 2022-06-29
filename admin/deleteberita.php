<?php
if (isset($_GET['id_berita'])) {
    session_start();
 include "../koneksi.php";
 $id = $_GET['id_berita'];
 $query = mysqli_query($koneksi, "DELETE FROM berita WHERE 
id_berita='$id'");
 if ($query) {
 $_SESSION['status']="Data Berhasil Dihapus";
 $_SESSION['icon']="success";
 $_SESSION['text']="Data telah dihapus";
 header("Location:databeritapage.php");
 } else {
 $_SESSION['status']="Data Gagal Dihapus";
 $_SESSION['icon']="error";
 $_SESSION['text']="Terjadi Kesalahan";
 header("Location:databeritapage.php");
}
}
?>