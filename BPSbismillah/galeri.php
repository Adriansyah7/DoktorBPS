<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';



$foto = query("SELECT * FROM galeri ORDER BY id DESC");


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
    <title>DOKTOR BPS</title>

    <!-- magnific-popup css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="galeri.css">

</head>

<body>

    <!-- Navbar -->
    <nav>
        <div class="container">
            <h2 class="logo">
                <a class="link" href="index.php"> Doktor BPS </a>
            </h2>

            <div class="search-bar">
                <form action="" method="post">
                    <i class="uil uil-search-alt"></i>
                    <input type="search" name="keyword" placeholder="Cari disini" autocomplete="off">
                    <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                </form>
            </div>
            <div class="create">
                <div class="profile-photo">
                    <img src="./img/logo.jpg" alt="">
                </div>
            </div>
        </div>
    </nav>

    <br>
    <br>
    <br>


    <!-- buttons -->
    <div class="gallery">

        <ul class="controls">
            <li class="buttons active" data-filter="all">All</li>
            <li class="buttons" data-filter="sp">SP2020</li>
            <li class="buttons" data-filter="kl">Kepala</li>
            <li class="buttons" data-filter="tu">Tata Usaha</li>
            <li class="buttons" data-filter="ss">S Sosial</li>
            <li class="buttons" data-filter="spr">S Produksi</li>
            <li class="buttons" data-filter="sd">S Distribusi</li>
            <li class="buttons" data-filter="nwa">NWA</li>
            <li class="buttons" data-filter="ipds">IPDS</li>
            <li class="buttons" data-filter="fu">Fungsional</li>
        </ul>

        <div class="image-container">
            <?php foreach ($foto as $row) : ?>
                <a href="img/<?= $row["gambar"]; ?>" class="image sp" title="<?= $row["subjek"]; ?> <?= $row["detail"]; ?> <?= $row["wilayah"]; ?> <?= $row["tahun"]; ?>">
                    <img src="img/<?= $row["gambar"]; ?>" alt="">
                </a>
                <!-- SP2020 -->

                <!-- <a href="" class="image kepala" title="">
            <img src="" alt="">
        </a> -->
            <?php endforeach; ?>
        </div>

    </div>


    <footer class="footer">
        <div align="center">
            <p>Dokumentasi Kinerja Kegiatan Kantor
                <br>~~* IPDS3273 @2021 *~~
            </p>
            <h6><a href="https://www.creative-tim.com" target="_blank">©2021 </a>.</h6>
        </div>
    </footer>
    <br>

    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- magnific popup js cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.buttons').click(function() {

                $(this).addClass('active').siblings().removeClass('active');

                var filter = $(this).attr('data-filter')

                if (filter == 'all') {
                    $('.image').show(400);
                } else {
                    $('.image').not('.' + filter).hide(200);
                    $('.image').filter('.' + filter).show(400);
                }

            });

            $('.gallery').magnificPopup({

                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }

            });

        });
    </script>

</body>

</html>