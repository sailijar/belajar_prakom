<?php
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$trans = $_POST["trans"];
$pasien = $_POST["pasien"];
$tgl = $_POST["tgl"];
$bln = $_POST["bln"];
$thn = $_POST["thn"];
$tanggal = $thn."-".$bln."-".$tgl;
$dokter = $_POST["dokter"];
$keluhan = $_POST["keluhan"];
$biaya = $_POST["biaya"];


#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi, "UPDATE berobat SET 
    PasienKlinik_ID='$pasien',
    Tanggal_Berobat='$tanggal',
    Dokter_ID='$dokter', 
    Keluhan_Pasien='$keluhan', 
    Biaya_Adm='$biaya'
    WHERE No_Transaksi='$trans'
");

#5. pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>

<!-- tambahkan validasi minimal tanggal lahir lebih kecil dari hari ini, jika gagal kembalikan ke form.php dan berikan pesan error -->