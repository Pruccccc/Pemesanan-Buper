<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Wisata Alam Majalengka</title>
</head>
<body>
    
    <?php
    function renderAktifMenu($val1, $val2){
        $result = "";
        if($val1 == $val2){
            $result = "active-menu";
        }
        return $result;
    }
    ?>

    <div class="main-container">
        <div class="img-header">
            <div class="brand-container">
                <h1>Objek Wisata Alam</h1>
                <h2>Di sekitar Kabupaten Majalengka</h2>
                <!-- <img src="images/icon.png" alt=""> -->
            </div><!--end brand-container-->
            <img src="images/alun-alun.jpg" alt="alun-alun">
            <img src="images/bukit-mercury.jpg" alt="bukit-mercury">
            <img src="images/curug-cipanten.jpeg" alt="curug-cipanten">
            <img src="images/curug-cipetey.jpg" alt="curug-cipetey">
            <img src="images/curug-ibun.jpg" alt="curug-ibun">
            <img src="images/jembar.jpg" alt="jembar">
            <img src="images/kebun-teh.jpeg" alt="kebun-teh">
            <img src="images/villa-raja-ratu.jpeg" alt="villa-raja-ratu">
            <img src="images/taman-dirgantara.jpg" alt="taman-dirgantara">
            <img src="images/saung-eurih.jpg" alt="saung-eurih">
        </div> <!--end img-header-->

        <div class="menu-header">
            <a class ="<?php echo renderAktifMenu($aktif_menu, "beranda")?>" href="index.php">Beranda</a>
            <a class ="<?php echo renderAktifMenu($aktif_menu, "form_pendaftaran")?>" href="form_pendaftaran.php">Daftar Paket Wisata</a>
            <a class ="<?php echo renderAktifMenu($aktif_menu, "list_pendaftaran")?>" href="list_pemesanan.php">Modifikasi Pesanan</a>
        </div><!--menu-header-->