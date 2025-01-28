<?php
include_once("koneksi.php");
$aktif_menu = "list_pendaftaran";
include_once("header.php");

// Query untuk mengambil data dari database
$sql = "SELECT * FROM daftar_pesanan";
$result = mysqli_query($conn, $sql);
?>

<div class="list-container">
    <h2>Daftar Pesanan</h2>
    <div class="table-responsive" style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-size:14px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Paket Wisata</th>
                    <th>Nama Pemesan</th>
                    <th>Phone</th>
                    <th>Jumlah Peserta</th>
                    <th>Jumlah Hari</th>
                    <th>Transportasi</th>
                    <th>Makanan</th>
                    <th>Harga Paket</th>
                    <th>Total Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['id_paket_wisata']) ?></td>
                            <td><?= htmlspecialchars($row['nama_pemesan']) ?></td>
                            <td><?= htmlspecialchars($row['no_telpon']) ?></td>
                            <td><?= htmlspecialchars($row['jumlah_peserta']) ?></td>
                            <td><?= htmlspecialchars($row['jumlah_hari']) ?></td>
                            <td><?= $row['transportasi'] === 'Y' ? 'Ya' : 'Tidak' ?></td>
                            <td><?= $row['makanan'] === 'Y' ? 'Ya' : 'Tidak' ?></td>
                            <td>Rp <?= number_format($row['harga_paket'], 0, ',', '.') ?></td>
                            <td>Rp <?= number_format($row['total_tagihan'], 0, ',', '.') ?></td>
                            <td>
                                <a href="edit_pesanan.php?id=<?= $row['id_daftar_pesanan'] ?>" 
                                   style="display:block; padding:10px; margin-bottom: 5px; text-align:center; text-decoration: none; color: white; background-color: blue; border-radius: 3px;">
                                   Edit
                                </a>
                                <a href="proses_hapus.php?id=<?= $row['id_daftar_pesanan'] ?>" 
                                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                                   style="display:block; padding:10px; text-align:center; text-decoration: none; color: white; background-color: red; border-radius: 3px;">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12">Tidak ada data yang ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once("footer.php"); ?>
