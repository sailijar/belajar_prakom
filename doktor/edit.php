<?php
###Mengambil data pasien berdasarkan ID terpilih###

#1. membuat koneksi
include("../koneksi.php");

#2. mengambil value ID hapus
$id = $_GET["id"];

#3. menjalankan query hapus
$qry = mysqli_query($koneksi,"SELECT * FROM dokter WHERE Dokter_ID = '$id'");

#4. memisahkan field/kolom tabel pasien menjadi data array
$row = mysqli_fetch_array($qry);

$nama = $row["Nama_Dokter"];
$poli = $row["Poli_ID"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="background-color: #EFF5D2;">
    <?php
    include('../navbar.php');
    ?>
    <div class="container">
        <!-- disini kontennya -->
        <div class="row">
            <div class="col-10 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <b>Form Edit Data Dokter</b>
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_edit.php">
                            <input type="hidden" name="idedit" value="<?=$id?>">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Dokter</label>
                                <input value="<?=$nama?>" name="nama" placeholder="Masukkan nama Lengkap" type="text" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nama Poli</label>
                                <select name="poli" class="form-select" aria-label="Default select example">
                                    <option >Pilih Poli</option>
                                    <?php
                                        include('../koneksi.php');
                                        $qry = mysqli_query($koneksi,"SELECT * FROM poli");
                                        foreach ($qry as $row) {
                                            ?>
                                            <option <?php echo ($poli==$row['Poli_ID']) ? 'selected' : '' ?> value="<?=$row['Poli_ID']?>"><?=$row['Nama_Poli']?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>