<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Berobat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('../navbar.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <b>Form Berobat</b>
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_form.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No Transaksi</label>
                                <input name="trans" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Pasien</label>
                                <select name="pasien" class="form-select" required>
                                    <option value="" selected disabled>Pilih Pasien</option>
                                    <?php
                                    include('../koneksi.php');
                                    $qry = mysqli_query($koneksi, "SELECT * FROM pasien");
                                    foreach ($qry as $row) {
                                        ?>
                                        <option value="<?= $row['PasienKlinik_ID'] ?>"><?= $row['Nama_pasienKlinik'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Berobat</label>
                                <div class="row">
                                    <div class="col">
                                        <select name="tgl" class="form-select" required>
                                            <option value="" selected disabled>Tanggal</option>
                                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="bln" class="form-select" required>
                                            <option value="" selected disabled>Bulan</option>
                                            <?php
                                            $bulan = [
                                                '01' => 'Januari',
                                                '02' => 'Februari',
                                                '03' => 'Maret',
                                                '04' => 'April',
                                                '05' => 'Mei',
                                                '06' => 'Juni',
                                                '07' => 'Juli',
                                                '08' => 'Agustus',
                                                '09' => 'September',
                                                '10' => 'Oktober',
                                                '11' => 'November',
                                                '12' => 'Desember'
                                            ];
                                            foreach ($bulan as $num => $nama) {
                                                echo "<option value='$num'>$nama</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="thn" class="form-select" required>
                                            <option value="" selected disabled>Tahun</option>
                                            <?php
                                            $tahunSekarang = date('Y');
                                            for ($thn = $tahunSekarang; $thn >= $tahunSekarang - 50; $thn--) {
                                                echo "<option value='$thn'>$thn</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dokter</label>
                                <select name="dokter" class="form-select" required>
                                    <option value="" selected disabled>Pilih Dokter</option>
                                    <?php
                                    $dokter = mysqli_query($koneksi, "SELECT Dokter_ID, Nama_Dokter FROM dokter");
                                    foreach ($dokter as $d) {
                                        echo "<option value='{$d['Dokter_ID']}'>{$d['Nama_Dokter']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keluhan Pasien</label>
                                <input type="text" name="keluhan" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Biaya Administrasi</label>
                                <input type="number" name="biaya" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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