<?php
include_once("koneksi.php");
include_once("header.php");

if(!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>
            alert('ID Pemesanan tidak valid');
            window.location.href='list_pemesanan.php';
          </script>";
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

// Query ambil data pemesanan
$query = "SELECT * FROM daftar_pesanan WHERE id_daftar_pesanan = '$id'"; 
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0) {
    echo "<script>
            alert('Data Pemesanan tidak ditemukan');
            window.location.href='list_pemesanan.php';
          </script>";
    exit();
}

// Ambil data
$data = mysqli_fetch_assoc($result);
?>

<div class="form-container">
    <h2>Form Pemesanan Paket Wisata</h2>
    <form action="proses_edit.php" method="post">
        <input type="hidden" name="id_daftar_pesanan" value="<?= $data['id_daftar_pesanan'] ?>">

        <label for="paket">Nama Paket :</label>
        <select name="paket" id="paket">
            <?php
            $sql = "SELECT * FROM paket_wisata";
            $result = mysqli_query($conn, $sql);
            while ($data_paket = mysqli_fetch_array($result)) {
                $selected = $data_paket['id_paket_wisata'] == $data['id_paket_wisata'] ? 'selected' : '';
            ?>
                <option value="<?php echo $data_paket['id_paket_wisata']; ?>" <?php echo $selected; ?>>
                    <?php echo $data_paket['nama_paket']; ?>
                </option>
            <?php } ?>
        </select>
        
        <label for="nama">Nama Pemesan :</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama_pemesan']) ?>" required>

        <label for="telepon">Nomor Telepon :</label>
        <input type="text" id="telepon" name="telepon" value="<?= htmlspecialchars($data['no_telpon']) ?>" required>

        <label for="tanggal">Tanggal Pemesanan :</label>
        <input type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal_pemesanan'] ?>" required>

        <label for="jumlah_hari">Waktu Pelaksanaan Perjalanan :</label>
        <input type="number" id="jumlah_hari" name="jumlah_hari" value="<?= $data['jumlah_hari'] ?>" required>

        <label for="">Pelayanan Paket Perjalanan :</label>

        <div class="layanan-container">
            <div class="item-layanan">
                <label for="penginapan">Penginapan (Rp. 150.000)</label>
                <input type="checkbox" name="penginapan" id="penginapan" <?= $data['penginapan'] == "Y" ? 'checked' : ''; ?>>
            </div>

            <div class="item-layanan">
                <label for="transportasi">Transportasi (Rp. 50.000)</label>
                <input type="checkbox" name="transportasi" id="transportasi" <?= $data['transportasi'] == "Y" ? 'checked' : ''; ?>>
            </div>

            <div class="item-layanan">
                <label for="makanan">Makanan (Rp. 70.000)</label>
                <input type="checkbox" name="makanan" id="makanan" <?= $data['makanan'] == "Y" ? 'checked' : ''; ?>>
            </div>
        </div>

        <label for="jumlah_peserta">Jumlah Peserta :</label>
        <input type="number" id="jumlah_peserta" name="jumlah_peserta" value="<?= $data['jumlah_peserta'] ?>" required>

        <label for="harga">Harga Paket Perjalanan :</label>
        <input type="text" id="harga" name="harga_paket" value="<?= $data['harga_paket'] ?>" readonly>

        <label for="jumlah_tagihan">Jumlah Tagihan :</label>
        <input type="text" id="jumlah_tagihan" name="total_tagihan" value="<?= $data['total_tagihan'] ?>" readonly>

        <div class="btn-container">
            <input type="submit" value="Simpan">
            <button id="btn-hitung" type="button">Hitung</button>
            <button id="btn-riset" type="reset">Reset</button>
        </div>
    </form>
</div>

<?php
include_once("footer.php");
?>

<script>
document.getElementById('btn-hitung').addEventListener('click', function () {
    // Ambil data paket wisata
    const paketSelect = document.getElementById('paket');
    const selectedPaket = paketSelect.options[paketSelect.selectedIndex];
    const hargaPaket = parseFloat(selectedPaket.getAttribute('data-harga')) || 0;

    // Ambil data dari form
    const hargaPenginapan = document.getElementById('penginapan').checked ? 150000 : 0;
    const hargaTransportasi = document.getElementById('transportasi').checked ? 50000 : 0;
    const hargaServis = document.getElementById('makanan').checked ? 70000 : 0;
    const jumlahHari = parseInt(document.getElementById('jumlah_hari').value) || 1;
    const jumlahPeserta = parseInt(document.getElementById('jumlah_peserta').value) || 1;

    // Hitung total harga
    const totalLayananPerHari = hargaPenginapan + hargaTransportasi + hargaServis;
    const totalHargaPaket = hargaPaket + totalLayananPerHari;
    const totalBiayaPerjalanan = totalHargaPaket * jumlahHari * jumlahPeserta;

    // Tampilkan harga
    document.getElementById('harga').value = totalHargaPaket;
    document.getElementById('jumlah_tagihan').value = totalBiayaPerjalanan;
});
</script>
