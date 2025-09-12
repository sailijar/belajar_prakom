<?php 
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$nama = $_POST["nama"];
$poli = $_POST["poli"];

#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi,"INSERT INTO dokter (Nama_Dokter,Poli_ID)
VALUES('$nama','$poli')");

#5. pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>

<!-- tambahkan validasi minimal tanggal lahir lebih kecil dari hari ini, jika gagal kembalikan ke form.php dan berikan pesan error -->