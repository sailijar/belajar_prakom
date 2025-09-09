<?php 
######PROSES EDIT#####

#1. membuat koneksi
include("../koneksi.php");

#2. mengambil value ID Edit
$id = $_GET["id"];

#3. menjalankan query Edit
$qry = mysqli_query($koneksi,"SELECT * FROM poli WHERE Poli_ID = '$id'");

#4. Memisahkan fild/kolom tabel pasien menjadi data query
$row = mysqli_fetch_array($qry);

$nama = $row["Nama_Poli"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Klinik</title>
</head>

<body></body>
<?php
include "../navbar.php";
?>
<div class="container">
        <!-- disini kontennya -->
        <div class="row">
            <div class="col-10 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <b>Form Edit Data Poli</b>
                    </div>
                    <div class="card-body">
                <form method="post" action="proses_edit.php">
                     <input type="hidden" value="<?=$id?>" name="idedit" id="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Poli</label>
                        <input name="nama" value="<?=$nama?>" placeholder="Masukkan nama Lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>