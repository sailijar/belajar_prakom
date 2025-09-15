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
$pasien_id = $row["PasienKlinik_ID"];
$poli_id = $row["Poli_ID"];
$dokter_id = $row["Dokter_ID"];
$keluhan = $row["Keluhan_Pasien"];
$biaya_adm = $row["Biaya_Adm"];
$tanggal = date('d', strtotime($row["Tanggal_Berobat"]));
$bulan = date('m', strtotime($row["Tanggal_Berobat"]));
$tahun = date('Y', strtotime($row["Tanggal_Berobat"]));
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
                        <input type="hidden" name="idedit" value="<?=$id?>">
                        <div class="mb-3">
                            <label class="form-label">Nama Pasien</label>
                            <select name="nama" class="form-select" required>
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
                            <label class="form-label">Tanggal Berobat</label>
                            <div class="row">
                                <div class="col">
                                    <select name="tgl" class="form-select" required>
                                        <option value="" disabled>Tanggal</option>
                                        <?php for ($i = 1; $i <= 31; $i++) {
                                            $val = str_pad($i, 2, '0', STR_PAD_LEFT);
                                            $selected = ($tanggal == $val) ? 'selected' : '';
                                            echo "<option value='$val' $selected>$i</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="bln" class="form-select" required>
                                        <option value="" disabled>Bulan</option>
                                        <?php
                                        $bulanArr = [
                                            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
                                            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
                                            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                                        ];
                                        foreach ($bulanArr as $num => $namaBln) {
                                            $selected = ($bulan == $num) ? 'selected' : '';
                                            echo "<option value='$num' $selected>$namaBln</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="thn" class="form-select" required>
                                        <option value="" disabled>Tahun</option>
                                        <?php
                                        $tahunSekarang = date('Y');
                                        for ($thn = $tahunSekarang; $thn >= $tahunSekarang - 50; $thn--) {
                                            $selected = ($tahun == $thn) ? 'selected' : '';
                                            echo "<option value='$thn' $selected>$thn</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Poli</label>
                            <select name="poli_id" class="form-select" required>
                                <option value="" disabled>Pilih Poli</option>
                                <?php
                                $dokter = mysqli_query($koneksi, "SELECT Poli_ID, Nama_Poli FROM poli");
                                foreach ($dokter as $d) {
                                    $selected = ($poli_id == $d['Poli_ID']) ? 'selected' : '';
                                    echo "<option value='{$d['Poli_ID']}' $selected>{$d['Nama_Poli']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dokter</label>
                            <select name="dokter_id" class="form-select" required>
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
                            <input type="text" name="keluhan" class="form-control" value="<?=$keluhan?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biaya Administrasi</label>
                            <input type="number" name="biaya_adm" class="form-control" value="<?=$biaya_adm?>" required>
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