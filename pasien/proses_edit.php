<?php 
###### PROSES Edit DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input

$id = $_POST['idedit'];
$nama = $_POST["nama"];
$tgl_lahir = $_POST["tgl"];
$jk = $_POST["jk"];
$alamat = $_POST["alamat"];

#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi,"UPDATE pasien SET Nama_pasienKlinik='$nama', Tanggal_LahirPasien='$tgl_lahir', Jenis_KelaminPasien='$jk', Alamat_Pasien='$alamat' WHERE PasienKlinik_ID = '$id'");

#5. pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>