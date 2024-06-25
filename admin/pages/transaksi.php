<?php
require "../conn.php";

$tableName = "view_transaksi";


?>
<div class="main-content">
    <div class="title">Transakasi</div>
    <div class="subtitle">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At ducimus, omnis blanditiis,
        aliquam modi eum exercitationem corrupti atque rerum quam mollitia quasi, eaque magnam qui fuga laboriosam
        pariatur nulla? Ducimus.
        <br>


        <!-- <button class="btn btn-outline-primary mt-3 py-2 px-3" data-bs-toggle="modal" data-bs-target="#tambah-modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" fill="currentColor" class="" viewBox="0 0 16 16">
                <path
                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
            </svg> Download
        </button> -->
    </div>
    <div class="tables">
        <table id="myTable" class="row-border hover compact" width=" 100%">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = "SELECT * FROM $tableName";
                $res = mysqli_query($conn, $q);
                $count = 1;
                while ($data = mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <td><?= $count++ ?>.</td>
                        <td><?= $data['nama_user'] ?></td>
                        <td><?= $data['nama_produk'] ?></td>
                        <td><?= $data['jumlah'] ?></td>
                        <td>Rp. <?= number_format($data['harga_produk']) ?></td>

                        <td>Rp. <?= number_format($data['total_harga']) ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Tambah -->
<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-heading">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="modal-body ">
                    <div class="row">
                        <div class="col">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" id="tnama" value="">
                        </div>
                        <div class="col">
                            <label for="" class="mt-">Harga</label>
                            <input type="number" class="form-control" id="tharga" value="">
                        </div>
                    </div>

                    <div class="py-2">
                        <label for="" class="mt-">Jumlah</label>
                        <input type="number" class="form-control" id="tjumlah" value="">
                    </div>


                    <p for="" class="mt-3">Foto</p>
                    <!-- <img src="uploads/img/" alt="" style="width:150px; height: 100px"> -->
                    <input type="file" class="form-control mt-3" id="tfoto" onchange="validasiFile()">

                    <div class="col-md-2 mb-2 mt-3" id="pratinjauGambar"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="tambah()">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-heading">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="modal-body ">
                    <div class="row">
                        <input type="text" id="uid" class="form-control" hidden disabled>
                        <div class="row">
                            <div class="col">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" id="unama" value="">
                            </div>
                            <div class="col">
                                <label for="" class="mt-">Harga</label>
                                <input type="number" class="form-control" id="uharga" value="">
                            </div>
                        </div>

                        <div class="py-2">
                            <label for="" class="mt-">Jumlah</label>
                            <input type="number" class="form-control" id="ujumlah" value="">
                        </div>

                        <div class="py-2">
                            <label for="" class="">Foto</label>
                            <input type="file" class="form-control mt-3" id="ufoto" onchange="return validasiFile1()">

                        </div>


                        <div class="row">
                            <div class="col-md mt-3" id="pratinjauGambar0">

                            </div>

                            <div class="col-md mt-3" id="pratinjauGambar1"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="edit()">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="pages/transaksi.js"></script>