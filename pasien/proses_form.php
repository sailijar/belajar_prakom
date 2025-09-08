<?php 
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$nama = $_POST["nama"];
$tgl_lahir = $_POST["tgl"];
$jk = $_POST["jk"];
$alamat = $_POST["alamat"];

#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi,"INSERT INTO pasien (Nama_pasienKlinik,Tanggal_LahirPasien,Jenis_KelaminPasien,Alamat_Pasien)
VALUES('$nama','$tgl_lahir','$jk','$alamat')");

#5. pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>