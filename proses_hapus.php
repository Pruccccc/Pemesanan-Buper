<?php
    include("koneksi.php");
    if(isset($_GET['id'])){
        $id_daftar_pesanan = $_GET['id'];

        // Perintah SQL untuk menghapus
        $sql = "DELETE FROM daftar_pesanan WHERE id_daftar_pesanan = $id_daftar_pesanan";

        if(mysqli_query($conn, $sql)) {
            header("Location: list_pemesanan.php?status=sukses");
        } else {
            header("Location: list_pemesanan.php?status=gagal");
        }
    } else {
        header("Location: list_pemesanan.php");
    }
?>
