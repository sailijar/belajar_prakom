<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Klinik</title>
</head>

<body>
    <?php
    include "../navbar.php";
    ?>

    <div class="container">
        <!-- disini kontennya -->
        <div class="row">
            <div class="col-10 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <b> Data Pasien</b>
                    </div>
                    <div class="card-body">
                        <a href="cetak.php" target="_blank" class="btn btn-primary mb-3">Print</a>
                        <table class="table">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1 koneksi
                                include "../koneksi.php";

                                #2 menjalankan query
                                $qry = "SELECT * FROM pasien";

                                #3 menjalankan query
                                $result = mysqli_query(mysql: $koneksi, query: $qry);

                                $no = 1;

                                #4 melakukan looping data pasien
                                foreach ($result as $row) {
                                    $tgl_lahir = date_create($row['Tanggal_LahirPasien']);
                                    $tgl_lahir = date_format($tgl_lahir, 'D, d F Y')
                                        ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $row['Nama_pasienKlinik'] ?></td>
                                        <td><?= $tgl_lahir ?></td>
                                        <td><?= $row['Jenis_KelaminPasien'] ?></td>
                                        <td><?= $row['Alamat_Pasien'] ?></td>
                                        
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