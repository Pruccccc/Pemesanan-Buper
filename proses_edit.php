<?php
include("koneksi.php");

// Ambil data dari form
$id_pemesanan = $_POST['id_daftar_pesanan'];
$paket = $_POST['paket'];
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$tanggal = $_POST['tanggal'];
$jumlah_peserta = $_POST['jumlah_peserta'];
$jumlah_hari = $_POST['jumlah_hari'];

// Proses checkbox
$penginapan = isset($_POST['penginapan']) ? "Y" : "N";
$transportasi = isset($_POST['transportasi']) ? "Y" : "N";
$makanan = isset($_POST['makanan']) ? "Y" : "N";

// Bersihkan input harga
$harga_paket = str_replace(".", "", $_POST['harga_paket']);
$total_tagihan = str_replace(".", "", $_POST['total_tagihan']);

// Query update
$query = "UPDATE daftar_pesanan SET 
        id_paket_wisata = '$paket',
        nama_pemesan = '$nama',
        no_telpon = '$telepon',
        tanggal_pemesanan = '$tanggal',
        jumlah_peserta = '$jumlah_peserta',
        jumlah_hari = '$jumlah_hari',
        penginapan = '$penginapan',
        transportasi = '$transportasi',
        makanan = '$makanan',
        harga_paket = '$harga_paket',
        total_tagihan = '$total_tagihan'
        WHERE id_daftar_pesanan = '$id_pemesanan'";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    // Redirect dengan pesan sukses
    header("Location: list_pemesanan.php?status=success&message=Data berhasil diperbarui");
    exit();
} else {
    // Tampilkan pesan error untuk debugging
    die("Error: " . mysqli_error($conn));
}

// Tutup koneksi
mysqli_close($conn);
?>
