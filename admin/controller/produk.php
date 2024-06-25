<?php

require '../../conn.php';

$location = "../../assets/img/produk/";


// print_r($_POST);


$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'tambah':

        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        $newfilename = uploadFoto($location);

        $sql = "INSERT INTO `tb_produk` (`id_produk`, `nama`, `jumlah`, `harga`, `foto`) VALUES (NULL, '$nama', '$jumlah', '$harga', '$newfilename');";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }
        break;

    case 'edit':
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        $nmFoto = $_POST['nmfoto'];
        $id = $_POST['id'];
        $tbName = "tb_produk";
        $fotoField = "foto";
        $idField = "id_produk";

        updateFoto($nmFoto, $tbName, $id, $idField, $location);

        $sql = "UPDATE tb_produk set nama = '$nama', harga = '$harga', jumlah = '$jumlah' where id_produk ='$id'";
        if (mysqli_query($conn, $sql)) {
            exit('sukses');
        }
        break;
    case 'hapus':
        $id = $_POST['id'];

        hapusFoto($location, $id, "tb_produk", "id_produk");
        
        if(mysqli_query($conn,"DELETE FROM tb_produk WHERE `tb_produk`.`id_produk` = $id")){
            exit('sukses');
        }else{
            exit('gagal');
        }


        break;



        // echo "sukses";


}
