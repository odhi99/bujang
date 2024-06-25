<?php
require "../conn.php"
?>
<div class="main-content">
    <div class="title">Users</div>
    <div class="subtitle">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At ducimus, omnis blanditiis,
        aliquam modi eum exercitationem corrupti atque rerum quam mollitia quasi, eaque magnam qui fuga laboriosam
        pariatur nulla? Ducimus.
        <br>
        <button class="btn btn-outline-primary mt-3 py-2 px-3" data-bs-toggle="modal" data-bs-target="#tambah-modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" fill="currentColor" class="" viewBox="0 0 16 16">
                <path
                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
            </svg> Tambah
        </button>
    </div>
    <div class="tables">
        <table id="myTable" class="row-border hover compact" width=" 100%">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama </th>
                    <th>Alamat </th>
                    <th>Hp</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = "SELECT * FROM tb_users WHERE role = 'user'";
                $res = mysqli_query($conn, $q);
                $count = 1;
                while($data = mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td><?= $count++?>.</td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['alamat']?></td>
                    <td><?= $data['hp']?></td>
                    <td><img src="../assets/img/users/<?= $data['foto']?>" width="100px"></td>
                    <td><?= $data['username']?></td>
                    <td><?= $data['password']?></td>
                    <td>
                        <!-- EDIT BTN -->
                        <button type="button" id="edit-btn" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#edit-modal" data-nama="<?= $data['nama']?>" data-id="<?= $data['id_user']?>"
                            data-alamat="<?= $data['alamat']?>" data-hp="<?= $data['hp']?>"
                            data-foto="<?= $data['foto']?>" data-username="<?= $data['username']?>"
                            data-password="<?= $data['password']?>">
                            <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil " viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg></i>EDIT
                        </button>
                        <!-- DELETE BTN -->
                        <button type="button" id="delete-btn" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-modal" data-id="<?= $data['id_user']?>">
                            <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg></i>HAPUS
                        </button>
                    </td>
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
                            <label for="" class="mt-">Alamat</label>
                            <input type="text" class="form-control" id="talamat" value="">
                        </div>
                    </div>

                    <label for="" class="mt-3">Hp</label>
                    <input type="text" class="form-control" id="thp" value="">

                    <p for="" class="mt-3">Foto</p>
                    <!-- <img src="uploads/img/" alt="" style="width:150px; height: 100px"> -->
                    <input type="file" class="form-control mt-3" id="tfoto" onchange="validasiFile()">

                    <div class="col-md-2 mb-2 mt-3" id="pratinjauGambar"></div>


                    <label for="" class="mt-3">Username</label>
                    <input type="text" class="form-control" id="tusername" value="">

                    <label for="" class="mt-3">Password</label>
                    <input type="text" class="form-control" id="tpassword" value="">
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

                        <div class="col">

                            <label for="">Nama</label>
                            <input type="text" class="form-control" id="unama" value="" id="nama">

                        </div>
                        <div class="col">

                            <label for="" class="">Alamat</label>
                            <input type="text" class="form-control" id="ualamat" value="">

                        </div>
                    </div>

                    <label for="" class="mt-3">Hp</label>
                    <input type="text" class="form-control" id="uhp" value="">

                    <p for="" class="mt-3">Foto</p>
                    <input type="file" class="form-control mt-3" id="ufoto" onchange="return validasiFile1()">

                    <div class="row">
                        <div class="col-md mt-3" id="pratinjauGambar0">
                            
                        </div>

                        <div class="col-md mt-3" id="pratinjauGambar1"></div>
                    </div>



                    <label for="" class="mt-3">Username</label>
                    <input type="text" class="form-control" id="uusername" value="">

                    <label for="" class="mt-3">Password</label>
                    <input type="text" class="form-control" id="upassword" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="edit()">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalLabel">Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="functions/anggota.php" method="post">
                <input type="text" value="1" id="did" hidden>

                <div class="modal-body">
                    <h1 class="fs-5">Anda Yakin Ingin Menghapus?</h1>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" onclick="hapus()">Iya</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="pages/anggota.js"></script>