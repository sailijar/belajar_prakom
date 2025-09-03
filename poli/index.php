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
                        <b> Data Poli</b>
                    </div>
                    <div class="card-body">
                        <a href="" class="btn btn-primary mb-3">Tambah Data</a>
                        <table class="table">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Poli</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1 koneksi
                                include "../koneksi.php";

                                #2 menjalankan query
                                $qry = "SELECT * FROM poli";

                                #3 menjalankan query
                                $result = mysqli_query(mysql: $koneksi, query: $qry);

                                $no = 1;

                                #4 melakukan looping data pasien
                                foreach ($result as $row) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $row['Nama_Poli'] ?></td>
                                        <td>
                                            <a href="" class="btn btn-primary">Edit</a>
                                            <a href="" class="btn btn-danger">Hapus</a>
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