<?php
include "conn.php";
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coffee</title>

  <?php include 'layout/link.php' ?>
</head>

<body>
  <?php include 'layout/navbar.php' ?>

  <?php include 'layout/home.php' ?>

  <!-- MENU -->
  <section class="menu" id="menu">
    <h1 class="heading">our menu <span>popular menu</span></h1>

    <div class="box-container">

      <?php
      $q = "SELECT * FROM tb_produk";
      $res = mysqli_query($conn, $q);
      $count = 1;
      while ($data = mysqli_fetch_assoc($res)) {
        $id = $data['id_produk'];
      ?>

        <a href="detail.php?id=<?= $data['id_produk'] ?>" class="box">
          <img src="assets/img/produk/<?= $data['foto'] ?>" alt="" />
          <div class="content">
            <h3><?= $data['nama'] ?></h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur,
              sed.
            </p>
            <span>Rp. <?= number_format($data['harga']) ?></span>
          </div>
        </a>

      <?php
      }
      ?>


    </div>
  </section>

  <?php include 'layout/footer.php' ?>

  <?php include 'layout/js.php' ?>
</body>

</html>