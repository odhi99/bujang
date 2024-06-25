<?php
session_start();

if ($_SESSION['login'] == "") {
    // header("Location: dashboard.php");
    echo '<script>window.location="../login.php"</script>';
} else if ($_SESSION['user'] != "admin") {
    echo '<script>window.location="../index.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <?php
    include("../assets/assets.php")

    ?>

</head>

<body>


    <section class="contents">
        <?php
        require_once "layouts/sidebar.php"
        ?>
        <div>
            <?php
            require_once "layouts/navbar.php";

            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                switch ($page) {
                    case 'anggota':
                        include "pages/anggota.php";
                        break;
                    case 'produk':
                        include "pages/produk.php";
                        break;
                    case 'transaksi':
                        include "pages/transaksi.php";
                        break;
                    case 'rekap':
                        include "pages/rekap.php";
                        break;
                }
            } else {
                include "pages/anggota.php";
            }
            ?>
        </div>
    </section>



    <script type="text/javascript" src="functions.js"></script>

</body>
<script>
    let table = new DataTable('#myTable', {
        // options
        lengthChange: false,
        pageLength: 6,
        responsive: true,
    });
</script>

</html>