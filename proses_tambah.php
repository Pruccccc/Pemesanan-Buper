<?php
include_once("koneksi.php");

// Ambil data dari form
$paket = mysqli_real_escape_string($conn, $_POST['paket']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
$tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
$jumlah_hari = mysqli_real_escape_string($conn, $_POST['jumlah_hari']);
$jumlah_peserta = mysqli_real_escape_string($conn, $_POST['jumlah_peserta']);
$harga = mysqli_real_escape_string($conn, $_POST['harga']);
$jumlah_tagihan = mysqli_real_escape_string($conn, $_POST['jumlah_tagihan']);

// Proses layanan
$penginapan = isset($_POST['penginapan']) ? "Y" : "N";
$transportasi = isset($_POST['transportasi']) ? "Y" : "N";
$makanan = isset($_POST['makanan']) ? "Y" : "N";

// Query simpan pemesanan
$query = "INSERT INTO daftar_pesanan (
    id_paket_wisata, 
    nama_pemesan, 
    no_telpon, 
    tanggal_pemesanan, 
    jumlah_hari,
    jumlah_peserta,
    penginapan,
    transportasi,
    makanan,
    harga_paket,
    total_tagihan
) VALUES (
    '$paket', 
    '$nama', 
    '$telepon', 
    '$tanggal', 
    '$jumlah_hari',
    '$jumlah_peserta',
    '$penginapan',
    '$transportasi',
    '$makanan',
    '$harga',
    '$jumlah_tagihan'
)";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    header("Location: list_pemesanan.php");
} else {
    echo "<script>
            alert('Pemesanan Gagal: " . mysqli_error($conn) . "');
            window.history.back();
          </script>";
}

mysqli_close($conn);
?>