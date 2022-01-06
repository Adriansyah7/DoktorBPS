<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';

    // Pagination
    // konfigurasi
    $jumlahPerPage = 6;
    $jumlahData = count(query("SELECT * FROM galeri"));
    $jumlahHalaman = ceil($jumlahData / $jumlahPerPage);
    $pageAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
    $awalData = ($jumlahPerPage * $pageAktif) - $jumlahPerPage;


    $foto = query("SELECT * FROM galeri ORDER BY id DESC LIMIT $awalData, $jumlahPerPage");


    // Tombol Cari di tekan
    if (isset($_POST["cari"])) {
        $foto = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>

    <!-- magnific-popup css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="galeri.css">

    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- magnific popup js cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

</head>

<body>




    <!-- Navbar -->
    <nav>
        <div class="container">

            <h4 class="logo">
                <a class="link" href="index.php"> Beranda </a>
                <a class="link" href="Upload.php"> Upload </a>
            </h4>

            <div class="search-bar">
                <form action="" method="post">
                    <i class="uil uil-search-alt"></i>
                    <input type="search" name="keyword" placeholder="Cari disini" autocomplete="off" id="keyword">
                    <button class="btn btn-primary" type="submit" name="cari" id="tombol-cari">Cari</button>
                </form>
            </div>

            <h4 class="logo">
                <a class="links">------ </a>
                <a class="link" href="galeri.php"> Kembali </a>
            </h4>
        </div>
    </nav>

    <br>
    <br>
    <br>


    <!-- Galeri -->
    <div id="container">
        <div class="gallery">

            <div class="image-container">
                <?php foreach ($foto as $row) : ?>
                    <a href="img/<?= $row["gambar"]; ?>" class="image" title="<?= $row["subjek"]; ?> <?= $row["detail"]; ?> <?= $row["wilayah"]; ?> <?= $row["tahun"]; ?>">
                        <img src="img/<?= $row["gambar"]; ?>" alt="">
                    </a>
                <?php endforeach; ?>

            </div>

        </div>
        
        <center>
            <section class="pagination">
                <ul class="pagination-items">
                    <?php if ($pageAktif != 1) : ?>
                        <a href="?page=1">FIRST</a>
                    <?php endif; ?>
                    <?php if ($pageAktif > 1) : ?>
                        <a href="?page=<?= $pageAktif - 1; ?>">&laquo;</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $pageAktif) : ?>
                            <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                        <?php else : ?>
                            <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($pageAktif < $jumlahHalaman) : ?>
                        <a href="?page=<?= $pageAktif + 1; ?>">&raquo;</a>
                    <?php endif; ?>
                    <?php if ($pageAktif != $jumlahHalaman) : ?>
                        <a href="?page= <?= $jumlahHalaman ?>">LAST</a>
                    <?php endif; ?>
                </ul>
            </section>
        </center>



        <footer>
            <div align="center">
                <p>Dokumentasi Kinerja Kegiatan Kantor <br> ~~* IPDS3273 @2021 *~~</p>
                <h6><a href="https://www.creative-tim.com" target="_blank">©2021 </a>.</h6>
            </div>
        </footer> <br>

    </div>
    <script src="galeri.js"> </script>
</body>

</html>