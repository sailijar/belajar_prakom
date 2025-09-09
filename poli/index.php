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
            <div class="col-7 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <b> Data Poli</b>
                    </div>
                    <div class="card-body">
                        <a href="form.php" class="btn btn-primary mb-3">Tambah Data</a>
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
                                            <a href="edit.php?id=<?= $row['Poli_ID'] ?>"
                                                class="btn btn-primary">Edit</a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal<?= $row['Poli_ID'] ?>">
                                                Hapus
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $row['Poli_ID'] ?>"
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
                                                            Yakin data poli <b> <?= $row['Nama_Poli'] ?> </b>
                                                            ingin di hapus ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <a href="hapus.php?id=<?= $row['Poli_ID'] ?>"
                                                                class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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