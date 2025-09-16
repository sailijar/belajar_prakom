<?php
###Mengambil data pasien berdasarkan ID terpilih###

#1. membuat koneksi
include("../koneksi.php");

#2. mengambil value ID hapus
$id = $_GET["id"];

#3. menjalankan query hapus
$qry = mysqli_query($koneksi, "SELECT * FROM berobat WHERE No_Transaksi = '$id'");

#4. memisahkan field/kolom tabel pasien menjadi data array
$row = mysqli_fetch_array($qry);

// Ambil data relasi
$trans = $row["No_Transaksi"];
$pasien_id = $row["PasienKlinik_ID"];

$tgl_berobat = $row["Tanggal_Berobat"];
$pecah_tgl = explode("-", $tgl_berobat);
$thn = $pecah_tgl[0];
$bln = $pecah_tgl[1];
$tgl = $pecah_tgl[2];

$dokter_id = $row["Dokter_ID"];
$keluhan = $row["Keluhan_Pasien"];
$biaya_adm = $row["Biaya_Adm"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berobat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #EFF5D2;">
    <?php include('../navbar.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <b>Form Edit Berobat</b>
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_edit.php">
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No Transaksi</label>
                                <input name="trans" value="<?= $trans ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Pasien</label>
                                <select name="pasien" class="form-select" required>
                                    <option value="" disabled>Pilih Pasien</option>
                                    <?php
                                    $pasien = mysqli_query($koneksi, "SELECT PasienKlinik_ID, Nama_pasienKlinik FROM pasien");
                                    foreach ($pasien as $p) {
                                        $selected = ($pasien_id == $p['PasienKlinik_ID']) ? 'selected' : '';
                                        echo "<option value='{$p['PasienKlinik_ID']}' $selected>{$p['Nama_pasienKlinik']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Berobat</label>
                                <div class="row">
                                    <div class="col-4">
                                        <select class="form-control" name="tgl" id="">
                                            <option value="">Pilih Tanggal</option>
                                            <?php
                                            for ($i = 1; $i <= 31; $i++) {
                                                ?>
                                                <option <?php echo ($tgl == $i) ? 'selected' : '' ?> value="<?= $i ?>">
                                                    <?= $i ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="bln" id="">
                                            <option value="">Pilih Bulan</option>
                                            <?php
                                            $bulan = array(
                                                1 => 'Januari',
                                                2 => 'Februari',
                                                3 => 'Maret',
                                                4 => 'April',
                                                5 => 'Mei',
                                                6 => 'Juni',
                                                7 => 'Juli',
                                                8 => 'Agustus',
                                                9 => 'September',
                                                10 => 'Oktober',
                                                11 => 'November',
                                                12 => 'Desember'
                                            );

                                            foreach ($bulan as $k => $v) {
                                                ?>
                                                <option <?php echo ($bln==$k) ? 'selected' : '' ?> value="<?= $k ?>"><?= $v ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input type="number" value="<?=$thn?>" class="form-control" name="thn"
                                            placeholder="Masukkan Tahun" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dokter</label>
                                <select name="dokter" class="form-select" required>
                                    <option value="" disabled>Pilih Dokter</option>
                                    <?php
                                    $dokter = mysqli_query($koneksi, "SELECT Dokter_ID, Nama_Dokter FROM dokter");
                                    foreach ($dokter as $d) {
                                        $selected = ($dokter_id == $d['Dokter_ID']) ? 'selected' : '';
                                        echo "<option value='{$d['Dokter_ID']}' $selected>{$d['Nama_Dokter']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keluhan Pasien</label>
                                <input type="text" name="keluhan" class="form-control" value="<?= $keluhan ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Biaya Administrasi</label>
                                <input type="number" name="biaya" class="form-control" value="<?= $biaya_adm ?>"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>