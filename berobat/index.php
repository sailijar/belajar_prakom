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
                        <b>Data Pasien</b>
                    </div>
                    <div class="card-body">
                        <a href="form.php" class="btn btn-primary">Tambah Data</a>
                        <table class="table mt-3 table-striped ">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Tanggal Berobat</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Keluhan Pasien</th>
                                    <th scope="col">Biaya Administrasi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi
                                include('../koneksi.php');

                                #2. query join tabel berobat, pasien, dokter, poli
                                $qry = "SELECT berobat.No_Transaksi,pasien.Nama_pasienKlinik,berobat.Tanggal_Berobat,dokter.Nama_Dokter,poli.Nama_Poli,berobat.Keluhan_Pasien,berobat.Biaya_Adm FROM berobat
                                INNER JOIN pasien ON berobat.PasienKlinik_ID = pasien.PasienKlinik_ID INNER JOIN dokter ON berobat.Dokter_ID = dokter.Dokter_ID
                                INNER JOIN poli ON dokter.Poli_ID = poli.Poli_ID";


                                #3. menjalankan query
                                $result = mysqli_query($koneksi, $qry);

                                #4. melakukan looping data pasien
                                $nomor = 1;
                                $bulanIndo = [
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
                                foreach ($result as $row) {
                                    // Pisahkan tanggal, bulan, tahun
                                    $tgl = date('d', strtotime($row['Tanggal_Berobat']));
                                    $bln = date('m', strtotime($row['Tanggal_Berobat']));
                                    $thn = date('Y', strtotime($row['Tanggal_Berobat']));
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $nomor++ ?></th>
                                        <td><?= $row['Nama_pasienKlinik'] ?></td>
                                        <td><?= $tgl . ' ' . $bulanIndo[$bln] . ' ' . $thn ?></td>
                                        <td><?= $row['Nama_Dokter'] ?></td>
                                        <td><?= $row['Keluhan_Pasien'] ?></td>
                                        <td><?= number_format($row['Biaya_Adm'], 0, ',', '.') ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $row['No_Transaksi'] ?>"
                                                class="btn btn-info btn-sm">edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal<?= $row['No_Transaksi'] ?>">
                                                Hapus
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $row['No_Transaksi'] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin data pasien <b><?= $row['Nama_pasienKlinik'] ?></b> ingin
                                                            dihapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <a href="hapus.php?id=<?= $row['No_Transaksi'] ?>"
                                                                class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>