<?php
require_once 'conn.php';
session_start();

if (isset($_SESSION['id']) && isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];
    $id_user = $_SESSION['id'];

    $res = mysqli_query($conn, "SELECT * FROM `view_transaksi` WHERE id_transaksi = $id_transaksi AND id_user = $id_user");

    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
    } else {
        redirectBack();
    }
} else {
    redirectBack();
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-6 mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-7">
                <div class="card">
                    <div class="card-body p-5">
                        <h2>
                            Kepadah <?= $data['nama_user'] ?>
                        </h2>
                        <p class="fs-sm">
                            Berikan receipt ini kepada kami agar anda dapat mengambil barang anda
                        </p>

                        <div class="border-top border-gray-200 pt-4 mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-muted mb-2">No. Pembelian</div>
                                    <strong>#<?= $id_transaksi ?></strong>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <div class="text-muted mb-2">Tanggal Pembelian</div>
                                    <strong><?= $data['tanggal'] ?></strong>
                                </div>
                            </div>
                        </div>


                        <table class="table border-bottom border-gray-200 mt-3">
                            <thead>
                                <tr>
                                    <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Deskripsi Barang</th>
                                    <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0">Jumlah</th>

                                    <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0">Harga
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-0"><?= $data['nama_produk'] ?></td>
                                    <td class="px-0"><?= $data['jumlah'] ?></td>
                                    <td class="text-end px-0">Rp. <?= number_format($data['harga_produk']) ?></td>
                                </tr>

                            </tbody>
                        </table>

                        <div class="container d-flex justify-content-center">
                            <img src="assets/img/produk/<?= $data['foto_produk'] ?>" alt="" class="w-100">
                        </div>

                        <div class="mt-5">

                            <div class="d-flex justify-content-end mt-3">
                                <h5 class="me-3">Total:</h5>
                                <h5 class="text-success">Rp. <?= number_format($data['total_harga']) ?></h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        window.print()
    </script>
</body>

</html>