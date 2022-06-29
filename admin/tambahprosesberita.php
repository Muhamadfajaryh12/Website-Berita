<?php
if (isset($_POST['add'])) {
session_start();
include "../koneksi.php";
$title=$_POST['judul_berita'];
$penulis=$_POST['penulis_berita'];
$content=$_POST['isi_berita'];
$date=$_POST['tgl_berita'];
$category=$_POST['id_kategori'];
$thumbnail=$_POST['gambar_berita'];
$extension_allowed=array('png', 'jpg', 'jpeg');
$name=$_FILES['gambar_berita']['name'];
$x=explode('.', $name);
$extension=strtolower(end($x));
$size=$_FILES['gambar_berita']['size'];
$file_tmp=$_FILES['gambar_berita']['tmp_name'];

    if (in_array($extension, $extension_allowed)===true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, '../images/'. $name);
            $query=mysqli_query($koneksi, "INSERT INTO berita
                VALUES(NULL,'$category','$title','$penulis','$date','$content','$name')");
                if ($query) {
                    $_SESSION['status']="Berhasil Menambahkan Data";
                    $_SESSION['icon']="success";
                    $_SESSION['text']="Data berhasil disimpan";
                    header("Location:databeritapage.php");
                }
              
                else {
                    $_SESSION['status']="Gagal Menambahkan Data";
                    $_SESSION['icon']="error";
                    $_SESSION['text']="Terjadi Kesalahan";
                    header("Location:tambahberitapage.php");
                }
            }
              
        else {
                    $_SESSION['status']="Gagal Menambahkan Data";
                    $_SESSION['icon']="error";
                    $_SESSION['text']="Terjadi Kesalahan File Tidak Sesuai";
                    header("Location:tambahberitapage.php");
        } 
        }
             
        else {
                    $_SESSION['status']="Gagal Menambahkan Data";
                    $_SESSION['icon']="error";
                    $_SESSION['text']="Terjadi Kesalahan Extension File Tidak Sesuai";
                    header("Location:tambahberitapage.php");
        }
    }

    ?>