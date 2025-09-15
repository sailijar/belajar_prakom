<?php 
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$trans = $_POST['trans'];
$pasien = $_POST["pasien"];
$dokter = $_POST["dokter"];
$keluhan = $_POST["keluhan"];
$biaya = $_POST["biaya"];

// // Gabungkan tanggal, bulan, tahun
$tgl = $_POST["tgl"];
$bln = $_POST["bln"];
$thn = $_POST["thn"];
$Tgl_Berobat = "$thn-$bln-$tgl";



// Validasi tanggal berobat tidak boleh lebih besar dari hari ini
if (strtotime($Tgl_Berobat) > strtotime(date('Y-m-d'))) {
    header("Location: form.php?error=Tanggal berobat tidak boleh di masa depan");
    exit;
}


#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi, "INSERT INTO berobat 
    (No_Transaksi, PasienKlinik_ID, Tanggal_Berobat, Dokter_ID, Keluhan_Pasien, Biaya_Adm) 
    VALUES 
    ( '$trans', '$pasien', '$Tgl_Berobat', '$dokter', '$keluhan', '$biaya')");

#5. pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>

<!-- tambahkan validasi minimal tanggal lahir lebih kecil dari hari ini, jika gagal kembalikan ke form.php dan berikan pesan error -->