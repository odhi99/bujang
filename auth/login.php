<?php
session_start();
require '../conn.php';
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['level'];

// print_r($_POST);

switch($role){
    case 'user':
        $sql_user = "SELECT * FROM tb_users where username = '$username' AND password ='$password' AND role = '$role'";
        $cek_user = mysqli_query($conn, $sql_user);
        $data_user = mysqli_fetch_assoc($cek_user);
        if (mysqli_num_rows($cek_user) > 0) {
            $_SESSION['id'] = $data_user['id_user'];
            $_SESSION['user'] = $data_user['nama'];
            $_SESSION['login'] = $username;
            exit('user');
        }else{
            exit('gagal'); 
        }
        break;
    case 'admin':
        $sql_admin = "SELECT * FROM tb_users where username = '$username' AND password ='$password' AND role = '$role'";
        $cek_admin = mysqli_query($conn, $sql_admin);
        if (mysqli_num_rows($cek_admin) > 0) {
            $_SESSION['user'] = "admin";
            $_SESSION['login'] = $username;
            exit('admin');
        }else{
            exit('gagal'); 
        }
        break;
        
    case 'superadmin':
        $sql_superadmin = "SELECT * FROM tb_users where username = '$username' AND password ='$password' AND role = '$role'";
        $cek_superadmin = mysqli_query($conn, $sql_superadmin);
        if (mysqli_num_rows($cek_superadmin) > 0) {
            $_SESSION['user'] = "superadmin";
            $_SESSION['login'] = $username;
            exit('superadmin');
        }else{
            exit('gagal'); 
        }
        break;
    case 'regist':
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        // $foto = $_POST['foto'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = "user";

        $newfilename = uploadFoto("../assets/img/users/");

        $sql = "INSERT INTO `tb_users` (`id_user`, `nama`, `alamat`, `hp`, `foto`, `username`, `password`, `role`) VALUES (NULL, '$nama', '$alamat', '$hp', '$newfilename', '$username', '$password', '$role')";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }
        break;
}
