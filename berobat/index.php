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
            <div class="col-12 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <b>Data Berobat</b>
                    </div>
                    <div class="card-body">
                        <a href="form.php" class="btn btn-primary">Add New</a>
                        <table class="table mt-3 table-striped ">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">No Transaksi</th>
                                    <th scope="col">Tanggal Berobat</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Nama Poli</th>
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
                                $qry = "SELECT * FROM berobat
                                INNER JOIN pasien ON berobat.PasienKlinik_ID = pasien.PasienKlinik_ID INNER JOIN dokter ON berobat.Dokter_ID = dokter.Dokter_ID
                                INNER JOIN poli ON dokter.Poli_ID = poli.Poli_ID";


                                #3. menjalankan query
                                $result = mysqli_query($koneksi, $qry);

                                #4. melakukan looping data pasien
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
                                        <!-- <th scope="row"><?= $nomor++ ?></th> -->
                                        <td><?= $row['No_Transaksi'] ?></td>
                                        <td><?= $tgl_berobat ?></td>
                                        <td><?= $row['Nama_pasienKlinik'] ?></td>
                                        <td><?= $usia ?></td>
                                        <td><?= $row['Nama_Poli'] ?></td>
                                        <td><?= $row['Nama_Dokter'] ?></td>
                                        <td><?= $row['Keluhan_Pasien'] ?></td>
                                        <td>Rp <?= $biaya_adm ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $row['No_Transaksi'] ?>"
                                                class="btn btn-info btn-sm">edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal<?= $row['No_Transaksi'] ?>">
                                                Hapus
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $row['No_Transaksi'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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