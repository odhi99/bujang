<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "bujang";

date_default_timezone_set('Asia/Makassar');
$conn = mysqli_connect($server, $username, $password, $db);

// if (!$conn) {
//     die("Koneksi Gagal" . mysqli_connect_errno());
// }
// echo 'koneksi  berhasil';



function redirectBack()
{
    echo "<script>javascript:history.go(-1)</script>";
};

function uploadFoto($location)
{
    // file
    $temp = explode(".", $_FILES["foto"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $location = $location . $newfilename;
    move_uploaded_file($_FILES['foto']['tmp_name'], $location);
    return $newfilename;
}

function updateFoto($nmfoto, $tableName, $id, $idField, $location)
{
    global $conn;
    if (!$nmfoto == "") {
        //hapus foto
        $foto = mysqli_query($conn, "SELECT * from $tableName where $idField = '$id'");
        $data =  mysqli_fetch_array($foto);
        $dataFoto = $data['foto'];

        if (file_exists($location . $dataFoto)) {
            unlink($location . $dataFoto);
        }


        //upload foto
        $temp = explode(".", $_FILES["foto"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $location = $location . $newfilename;
        move_uploaded_file($_FILES['foto']['tmp_name'], $location);

        mysqli_query($conn, "UPDATE $tableName set foto ='$newfilename' where $idField ='$id'");
    }
}

function hapusFoto($location, $id, $tableName, $idField)
{
    global $conn;
    // get foto
    $foto = mysqli_query($conn, "SELECT foto from $tableName where $idField = '$id'");

    $dataFoto = mysqli_fetch_array($foto)[0];

    if (file_exists($location . $dataFoto)) {
        unlink($location . $dataFoto);
    }
}
