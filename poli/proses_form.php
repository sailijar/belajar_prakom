<?php 
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$nama = $_POST["nama"];


#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi,"INSERT INTO poli (Nama_Poli)
VALUES('$nama')");

#5. pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>