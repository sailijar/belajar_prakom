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
            <div class="col-10 m-auto mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Laporan Data Dokter</h1>
                        <br>
                        <table class="table mt-3 table-striped ">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Doktor</th>
                                    <th scope="col">Nama Poli</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi
                                include('../koneksi.php');

                                #2. menuliskan query
                                $qry = "SELECT * FROM dokter INNER JOIN poli ON dokter.Poli_ID = poli.Poli_ID";

                                #3. menjalankan query
                                $result = mysqli_query($koneksi, $qry);

                                #4. melakukan looping data pasien
                                $nomor = 1;
                                foreach ($result as $row) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $nomor++ ?></th>
                                        <td><?= $row['Nama_Dokter'] ?></td>
                                        <td><?= $row['Nama_Poli'] ?></td>
                                        
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