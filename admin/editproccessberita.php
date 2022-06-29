<?php
if (isset($_POST['edit'])) {
include '../koneksi.php';
session_start();
 $title = $_POST['judul_berita'];
 $id = $_POST['id_berita'];
 $penulis=$_POST['penulis_berita'];
 $content = $_POST['isi_berita'];
 $tgl=$_POST['tgl_berita'];
 $category = $_POST['id_kategori'];
 $thumbnail = $_POST['gambar_berita'];
 $extension_allowed = array('png', 'jpg','jpeg');
 $name = $_FILES['gambar_berita']['name'];
 $x = explode('.', $name);
 $extension = strtolower(end($x));
 $size = $_FILES['gambar_berita']['size'];
 $file_tmp = $_FILES['gambar_berita']['tmp_name'];
 if (in_array($extension, $extension_allowed) === true) {
 if ($ukuran < 1044070) {
 move_uploaded_file($file_tmp, '../images/' . $name);
 $query = mysqli_query($koneksi, "UPDATE berita SET 
id_kategori='$category',judul_berita='$title',penulis_berita='$penulis', tgl_berita='$tgl', isi_berita='$content', 
gambar_berita='$name' WHERE id_berita='$id'");
 if ($query) {
    $_SESSION['status']="Berhasil Update Berita";
    $_SESSION['icon']="success";
    $_SESSION['text']="Data berhasil diperbarui";
 header("Location:databeritapage.php");
 } else {
    $_SESSION['status']="Gagal Update Berita";
    $_SESSION['icon']="error";
    $_SESSION['text']="Terjadi Kesalahan";
 header("Location:databeritapage.php");
 }
 } else {
    $_SESSION['status']="Gagal Update Berita";
    $_SESSION['icon']="error";
    $_SESSION['text']="Extension File Photo tidak sesuai";
 header("Location:databeritapage.php?");
 }
 } else {
 $query = mysqli_query($koneksi, "UPDATE berita SET 
id_kategori='$category',judul_berita='$title',penulis_berita='$penulis', tgl_berita='$tgl', isi_berita='$content' WHERE id_berita='$id'");
 if ($query) {
    $_SESSION['status']="Berhasil Update Berita";
    $_SESSION['icon']="success";
    $_SESSION['text']="Data berhasil diperbarui";
 header("Location:databeritapage.php");
 } else {
    $_SESSION['status']="Gagal Update Berita";
    $_SESSION['icon']="error";
    $_SESSION['text']="Terjadi Kesalahan";
 header("Location:databeritapage.php");
 }
 }
}
?>