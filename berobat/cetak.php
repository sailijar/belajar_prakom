<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body onload="window.print()" style="background-color: #EFF5D2;">

    <div class="field-container">
        <!-- disini kontennya -->
        <div class="row">
            <div class="col-12 m-auto mt-5">
                <div class="card">
                    
                    <div class="card-body">
                        <h1 class="text-center">Laporan Data Berobat</h1>
                        <br>
                        <table class="table mt-3 table-striped ">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">No Transaksi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Nama Poli</th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Biaya Administrasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi
                                include('../koneksi.php');

                                #2. menuliskan query
                                $qry = "SELECT * FROM berobat 
                                INNER JOIN pasien ON berobat.PasienKlinik_ID=pasien.pasienKlinik_ID
                                INNER JOIN dokter ON berobat.Dokter_ID=dokter.Dokter_ID
                                INNER JOIN poli ON dokter.Poli_ID=poli.Poli_ID";

                                #3. menjalankan query
                                $result = mysqli_query($koneksi, $qry);

                                #4. melakukan looping data Dokter
                                $nomor = 1;
                                foreach ($result as $row) {
                                    //memformat ulang tanggal berobat
                                    $tgl_berobat = date_create($row['Tanggal_Berobat']);
                                    $tgl_berobat = date_format($tgl_berobat, 'd/m/Y');

                                    //membuat usia pasien
                                    $tanggal_lahir = new DateTime($row['Tanggal_LahirPasien']);
                                    $sekarang = new DateTime("today");
                                    $usia = $sekarang->diff($tanggal_lahir)->y;

                                    //memformat biaya menjadi rupiah dan ada pemisah ribuan
                                    $biaya_adm = $row['Biaya_Adm'];
                                    $biaya_adm = number_format($biaya_adm,0,',','.');

                                    ?>
                                    <tr>
                                        <td><?= $row['No_Transaksi'] ?></td>
                                        <td><?= $tgl_berobat ?></td>
                                        <td><?= $row['Nama_pasienKlinik'] ?></td>
                                        <td><?= $usia ?></td>
                                        <td><?= $row['Jenis_KelaminPasien'] ?></td>
                                        <td><?= $row['Keluhan_Pasien'] ?></td>
                                        <td><?= $row['Nama_Poli'] ?></td>
                                        <td><?= $row['Nama_Dokter'] ?></td>
                                        <td>Rp <?= $biaya_adm ?></td>
                                        
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
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