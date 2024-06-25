<?php
session_start();
require "../conn.php";

// print_r($_POST);




if (isset($_SESSION['id'])) {
    $id_user = $_SESSION['id'];
    /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
    composer require midtrans/midtrans-php
                                  
    Alternatively, if you are not using **Composer**, you can download midtrans-php library 
    (https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
    
    the file manually.   
    
    require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
    require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';
    //SAMPLE REQUEST START HERE

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-fqa_Ds0oLnNqC6Ti00ir6dMT';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    if($jumlah < 0){
        exit('gagal');
    }else{

        $produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga, jumlah FROM tb_produk WHERE id_produk = '$id_produk'"));
        $sisa = $produk['jumlah'] - $jumlah;

        if($sisa < 0){
        exit('stok-habis');

        }

        $harga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM tb_produk WHERE id_produk = '$id_produk'"))['harga'];
    
        $total_harga = $harga * $jumlah;
    
    
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total_harga,
            ),
    
        );
    
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        echo $snapToken;

    }

    // print_r($jumlah);



} else {
    exit("NOT-LOGIN");
}
