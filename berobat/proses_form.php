<?php 
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$id = $_POST['idedit'];
$pasien_id = $_POST["nama"];
$poli_id = $_POST["poli"];
$dokter_id = $_POST["dokter"];
$keluhan = $_POST["keluhan"];
$biaya_adm = $_POST["biaya_adm"];

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
    (PasienKlinik_ID, Poli_ID, Dokter_ID, Tanggal_Berobat, Keluhan_Pasien, Biaya_Adm) 
    VALUES 
    ('$pasien_id', '$poli_id', '$dokter_id', '$Tgl_Berobat', '$keluhan', '$biaya_adm')"
);

#5. pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>

<!-- tambahkan validasi minimal tanggal lahir lebih kecil dari hari ini, jika gagal kembalikan ke form.php dan berikan pesan error -->