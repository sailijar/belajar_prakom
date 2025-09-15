<?php
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$id = $_POST["idedit"];
$pasien_id = $_POST["nama"];
$poli_id = $_POST["poli_id"];
$dokter_id = $_POST["dokter_id"];
$keluhan = $_POST["keluhan"];
$biaya_adm = $_POST["biaya_adm"];
$tgl = $_POST["tgl"];
$bln = $_POST["bln"];
$thn = $_POST["thn"];
$tanggal_berobat = "$thn-$bln-$tgl";

// Validasi tanggal berobat tidak boleh di masa depan
if (strtotime($tanggal_berobat) > strtotime(date('Y-m-d'))) {
    header("Location: edit.php?id=$id&error=Tanggal berobat tidak boleh di masa depan");
    exit;
}

#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi, "UPDATE berobat SET 
    PasienKlinik_ID='$pasien_id', 
    Poli_ID='$poli_id',
    Dokter_ID='$dokter_id', 
    Tanggal_Berobat='$tanggal_berobat', 
    Keluhan_Pasien='$keluhan', 
    Biaya_Adm='$biaya_adm'
    WHERE No_Transaksi='$id'
");

#5. pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>

<!-- tambahkan validasi minimal tanggal lahir lebih kecil dari hari ini, jika gagal kembalikan ke form.php dan berikan pesan error -->