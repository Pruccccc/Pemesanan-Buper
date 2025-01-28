<?php
    include_once("koneksi.php");
    $aktif_menu = "beranda";
    include_once("header.php");
?>
        
    <div class="konten-pariwisata">
        <div class="info-container">     
        <?php
            $sql = "SELECT * FROM paket_wisata";
            $results = mysqli_query($conn, $sql);

            while ($data_paket = mysqli_fetch_array($results)) {
                 $path_gambar = "images/" . $data_paket['img_paket'];
        ?>
        <div class="paket-container">
        <img src="<?php echo $path_gambar; ?>" alt="paket camping">
            <h3><?php echo $data_paket['nama_paket']; ?></h3>
                <p><?php echo $data_paket['deskripsi_paket']; ?></p>
                <a href="form_pendaftaran.php?id_paket_wisata=<?php echo $data_paket['id_paket_wisata']; ?>">Daftar</a>
        </div><!--end paket-container-->
        <?php
            }
        ?>
        </div><!--end info-container-->

    <div class="promosi-container">
        <div class="video-container">
            <h3>Paket Wisata 1</h3>
            <br>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Ls42VayChJk?si=FEBvo3Yrj5MWwN9k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </br>

            <h3>Paket Wisata 2</h3>
            <br>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/C7KzRATIcAo?si=f_SfB9tWfhlTr1sl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </br>

            <h3>Paket Wisata 3</h3>
            <br>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/l8fSrEFlvBM?si=uJK-YPi8xWWDhDAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </br>

            <h3>Paket Wisata 4</h3>
            <br>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/IeewZqhqU9c?si=1d5ZqtD-MvCUW9cU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </br>
            </div><!--end video-container-->
        </div><!--end promosi-container-->

    </div><!--end konten-pariwisata-->
<?php
    include_once("footer.php");
?>
    