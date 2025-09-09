<?php 
######PROSES HAPUS#####

#1. membuat koneksi
include("../koneksi.php");

#2. mengambil value ID hapus
$id = $_GET["id"];

#3. menjalankan query hapus
$qry = mysqli_query($koneksi,"DELETE FROM poli WHERE Poli_ID = '$id'");

#4. mengalihkan halaman jika sudah terhapus
header("location:index.php");
?>