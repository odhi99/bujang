<?php
session_start();
require "conn.php";


$req = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '$_GET[id]'");
$data = mysqli_fetch_assoc($req);

$now_date = Date('Y-m-d');
$now_time = Date('H:i');

if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $res_user = mysqli_query($conn, "SELECT nama, hp FROM tb_users WHERE role = 'user' AND id_user = '$id'");
  $data_user = mysqli_fetch_assoc($res_user);
} else {
  $data_user['nama'] = '';
  $data_user['hp'] = '';
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coffee</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!-- SWIPER -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!-- Font Awesome CDN Link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <!-- Custom CSS File Link  -->
  <link rel="stylesheet" href="css/style.css" />

  <!-- JQUERY -->
  <script src="assets/jquery/dist/jquery.min.js"></script>
  <script src="assets/DataTables/datatables.js"></script>

  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Sh3wGKHVSP3NM6lF" async></script>
  <link rel="stylesheet" href="assets/DataTables/datatables.css">

  <!-- SWEETALERT -->
  <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
  <script src="assets/sweetalert2/dist/sweetalert2.min.js"></script>
</head>

<body>
  <!-- BOOK -->
  <section class="book" id="book">
    <h1 class="heading">Pemesanan <span>Detail produk</span></h1>
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 menus">
        <img width="20%" src="image/menu-1.png" alt="" />
        <h1><?= $data['nama'] ?></h1>
        <h3>Rp. <?= number_format($data['harga']) ?></h3>
        <p>
          <span><b>Deskripsi</b><br /></span>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
          eaque possimus eligendi placeat consectetur suscipit enim asperiores
          minima dolor dicta aut quod ducimus, dolorum minus doloribus
          provident. Repellat, expedita voluptates.
        </p>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <form action="">
          <input type="text" id="nama" value="<?= $data_user['nama'] ?> " placeholder="Nama" class="box">
          <input type="text" id="hp" value="<?= $data_user['hp'] ?>" class="box" placeholder="No Hp">
          <input type="" min="1" value="<?= $data['jumlah'] ?>" class="box" readonly placeholder="Stok">
          <input type="number" id="jumlah" min="1" value="1" onchange="hitungHarga()" class="box" placeholder="Jumlah Pesanan">
          <input type="text" id="harga" value="<?= number_format($data['harga']) ?>" class="box" readonly placeholder="Harga">
          <button type="button" class="btn" onclick="reserve()" id="reservasi-btn" data-id="<?= $data['id_produk'] ?>">Submit</button>
        </form>
      </div>
    </div>
  </section>


  <script type="text/javascript">
    function hitungHarga() {
      let harga = <?= $data['harga'] ?>;
      let jumlah = $('#jumlah').val()

      document.getElementById('harga').value = (harga * jumlah).toLocaleString()


    }
  </script>

  <!-- SWIPER -->
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

  <!-- Custom JS File Link  -->
  <script src="js/script.js"></script>
  <script src="reservasi.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>