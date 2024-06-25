<?php

require '../../conn.php';

$location = "../../assets/img/users/";


// print_r($_POST);


$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'tambah':

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        // $foto = $_POST['foto'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = "user";

        $newfilename = uploadFoto("../../assets/img/users/");

        $sql = "INSERT INTO `tb_users` (`id_user`, `nama`, `alamat`, `hp`, `foto`, `username`, `password`, `role`) VALUES (NULL, '$nama', '$alamat', '$hp', '$newfilename', '$username', '$password', '$role')";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }
        break;

    case 'edit':
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        // $foto = $_POST['foto'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = "user";

        $nmFoto = $_POST['nmfoto'];
        $id = $_POST['id'];
        $tbName = "tb_users";
        $fotoField = "foto";
        $idField = "id_user";

        updateFoto($nmFoto, $tbName, $id, $idField, $location);

        $sql = "UPDATE tb_users set nama = '$nama', alamat = '$alamat', hp = '$hp', username='$username', password='$password' where id_user ='$id'";
        if (mysqli_query($conn, $sql)) {
            exit('sukses');
        }
        break;
    case 'hapus':
        $id = $_POST['id'];

        hapusFoto($location, $id, "tb_users", "id_user");
        
        if(mysqli_query($conn,"DELETE FROM tb_users WHERE `tb_users`.`id_user` = $id")){
            exit('sukses');
        }else{
            exit('gagal');
        }


        break;



        // echo "sukses";


}
