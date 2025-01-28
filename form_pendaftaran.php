<?php
include_once("koneksi.php");
$aktif_menu = "form_pendaftaran";
include_once("header.php");
?>

<div class="form-container">
    <h2>Form Pemesanan Paket Wisata</h2>
    <form action="proses_tambah.php" method="post">
    <label for="paket">Nama Paket :</label>
<select name="paket" id="paket">
    <?php
    $sql = "SELECT * FROM paket_wisata";
    $result = mysqli_query($conn, $sql);
    while ($data_paket = mysqli_fetch_array($result)) {
        $selected = $data['id_paket_wisata'] == $data_paket['id_paket_wisata'] ? 'selected' : '';
        ?>
        <option value="<?php echo $data_paket['id_paket_wisata']; ?>" 
                data-harga="<?php echo $data_paket['harga_tiket']; ?>" 
                <?php echo $selected; ?>>
            <?php echo $data_paket['nama_paket']; ?>
        </option>
    <?php } ?>
</select>
        
        <label for="nama">Nama Pemesan :</label>
        <input type="text" id="nama" name="nama" required>

        <label for="telepon">Nomor Telepon :</label>
        <input type="text" id="telepon" name="telepon" required>

        <label for="tanggal">Tanggal Pemesanan :</label>
        <input type="date" id="tanggal" name="tanggal" required>

        <label for="jumlah_hari">Waktu Pelaksanaan Perjalanan :</label>
        <input type="number" id="jumlah_hari" name="jumlah_hari" value="1">

        <label for="">Pelayanan Paket Perjalanan :</label>

        <div class="layanan-container">
            <div class="item-layanan">
                <label for="transportasi">Transportasi (Rp. 50.000)</label>
                <input type="checkbox" name="transportasi" id="transportasi" value="Y">
            </div>

            <div class="item-layanan">
                <label for="makanan">Makanan (Rp. 70.000)</label>
                <input type="checkbox" name="makanan" id="makanan" value="Y">
            </div>
        </div>

        <label for="jumlah_peserta">Jumlah Peserta :</label>
        <input type="number" id="jumlah_peserta" name="jumlah_peserta" value="1">

        <label for="harga">Harga Paket Perjalanan :</label>
        <input type="text" id="harga" name="harga" required readonly>

        <label for="jumlah_tagihan">Jumlah Tagihan :</label>
        <input type="text" id="jumlah_tagihan" name="jumlah_tagihan" required readonly>

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
    const hargaTransportasi = document.getElementById('transportasi').checked ? 50000 : 0;
    const hargaServis = document.getElementById('makanan').checked ? 70000 : 0;
    const jumlahHari = parseInt(document.getElementById('jumlah_hari').value) || 1;
    const jumlahPeserta = parseInt(document.getElementById('jumlah_peserta').value) || 1;

    // Hitung total harga
    const totalLayananPerHari = hargaTransportasi + hargaServis;
    const totalHargaPaket = hargaPaket + totalLayananPerHari;
    const totalHariPeserta = jumlahHari * jumlahPeserta;
    const totalBiayaPerjalanan = totalHargaPaket * totalHariPeserta;

    // Tampilkan harga
    document.getElementById('harga').value = totalHargaPaket;
    document.getElementById('jumlah_tagihan').value = totalBiayaPerjalanan;
});
</script>