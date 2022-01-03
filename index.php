<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';

// Pagination
// konfigurasi
$jumlahPerPage = 5;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doktor BPS</title>

    <!---- ICONT SCOUT CDN-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--------STYLE CSS-->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--------------------NAVBAR---------------------->
    <nav>
        <div class="container">

            <h2 class="logo"> Doktor BPS </h2>
            <marquee>
                <h2>Selamat Datang Di Dokumen Kantor Badan Pusat Statistik</h2>
            </marquee>

            <div class="create">
                <a href="logout.php"> <label class="btn btn-primary">Logout</label> </a>
            </div>
        </div>
    </nav>

    <!-----------------------MAIN------------------>
    <main>
        <div class="container">
            <!--------------- LEFT ---------------->
            <div class="left">
                <a class="profile" href="https://bandungkota.bps.go.id/">
                    <div class="profile-photo">
                        <img src="./img/logo.jpg" alt="">
                    </div>
                    <div class="handle">
                        <h4>Badan Pusat Statistik</h4>
                    </div>
                </a>

                <!---------- SIDE BAR --------->
                <div class="sidebar">
                    <a class="menu-item active" href="index.php">
                        <span><i class="uil uil-home"></i></span>
                        <h3>Beranda</h3>
                    </a>


                    <a class="menu-item" href="cetak.php" target="_blank">
                        <span><i class="uil uil-users-alt"></i><small class="notification-count"></small></i></span>
                        <h3>Cetak</h3>
                    </a>

                    <a class="menu-item" href="galeri.php">
                        <span><i class="uil uil-scenery"></i></span>
                        <h3>Galeri</h3>
                    </a>

                    <a class="menu-item" href="upload.php">
                        <span><i class="uil uil-image-upload"></i></span>
                        <h3>Upload</h3>
                    </a>

                    <a class="menu-item" id="theme">
                        <span><i class="uil uil-palette"></i></span>
                        <h3>Tema</h3>
                    </a>
                </div>
                <!------------------ END OF SIDEBAR ------------>
                <a href="upload.php">
                    <span for="create-post" class="btn btn-primary">Create Post</span>
                </a>
            </div>

            <!-----------------END OF LEFT-------------->


            <!--------------- MIDDLE ---------------->

            <div class="middle">

                <!---------------------- FEEDS--------------->
                <div class="feeds">
                    <?php foreach ($foto as $row) : ?>
                        <!-------------------FEED 1------------------>
                        <div class="feed">
                            <div class="head">
                                <div class="user">
                                    <div class="ingo">
                                        <h3><?= $row["subjek"]; ?></h3>
                                        <small><?= $row["wilayah"]; ?> <?= $row["tahun"]; ?></small>
                                    </div>
                                </div>
                                <span class="edit">
                                    <i class="uil uil-ellipsis-h"></i>
                                </span>
                            </div>
                            <div class="photo">
                                <img src="img/<?= $row["gambar"]; ?>" alt="">
                            </div>

                            <div class="action-buttons">
                                <div class="interaction-buttons">
                                    <a class="huruf" href="edit.php?id=<?= $row["id"]; ?>">
                                        <i class="uil uil-plus-square"></i>
                                        Edit</a>
                                </div>
                                <div class="bookmark">
                                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?');">
                                        <i class="uil uil-trash-alt"></i></a>
                                </div>
                            </div>
                            <div class="liked-by">
                                <span><img src="./img/erwin.jpg" alt=""></span>
                                <p><?= $row["kegiatan"]; ?></p>
                            </div>

                            <div class="caption">
                                <p> <?= $row["detail"]; ?>
                                    <span class="harsh-tag">#BPSKotaBandung</span>
                                </p>
                            </div>
                            <div class="comments text-muted">Lihat semua komentar </div>
                        </div>
                        <!----------------------- END OF FEED ------------------>
                    <?php endforeach; ?>
                </div>


                <!----------------------------------Navigasi------------------------------------>

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

                <!------------------------------ END OF FEEDS ------------------------------>
            </div>

            <!------------------------------- END OF MIDDLE --------------------------------->
            <!--===============================  RIGHT ==============================-->
            <div class="right">
                <div class="messages">
                    <div class="heading">
                        <h4>Kategori</h4>
                        <i class="uil uil-edit"></i>
                    </div>
                    <!------------------- SEARCH BAR ---------------->
                    <div class="search-bar">
                        <i class="uil uil-search-alt"></i>
                        <input type="search" placeholder="Cari Kategori" id="message-search">
                    </div>
                    <!------------------- MESSAGES CATEGORY ---------------->
                    <div class="category">
                        <h6 class="message-requests">Daftar Kategori</h6>
                    </div>
                    <!------------------- MESSAGE---------------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./img/logo2.png" alt="">
                        </div>
                        <div class="message-body">
                            <h5>IPDS</h5>
                        </div>
                    </div>
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./img/logo2.png" alt="">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>BPS</h5>
                        </div>
                    </div>
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./img/logo2.png" alt="">
                        </div>
                        <div class="message-body">
                            <h5>Staff</h5>
                        </div>
                    </div>
                </div>
                <!------------------- END OF MESSAGES---------------->

                <!------------------- FRIEND REQUEST---------------->
                <div class="friend-requests">
                    <h4>@Badan Pusat Statistik 2021</h4>
                </div>
            </div>
            <!--=============================== END OF RIGHT ==============================-->
        </div>
    </main>

    <!--========================= THEME CUSTOMIZE ================================ -->
    <div class="customize-theme">
        <div class="card">
            <h2>Atur tampilan layar Anda</h2>
            <p class="text-muted"> Atur ukuran tulisan, warna dan latar yang Anda sukai</p>

            <!---------------- FONT SIZE ------------->
            <div class="font-size">
                <h4>Font Size</h4>
                <div>
                    <h6>Aa</h6>
                    <div class="choose-size">
                        <span class="font-size-1"></span>
                        <span class="font-size-2 active"></span>
                        <span class="font-size-3"></span>
                        <span class="font-size-4"></span>
                        <span class="font-size-5"></span>
                    </div>
                    <h3>Aa</h3>
                </div>
            </div>

            <!--------------- PRIMARY COLORS ------------>
            <div class="color">
                <h4>Color</h4>
                <div class="choose-color">
                    <span class="color-1 active"></span>
                    <span class="color-2"></span>
                    <span class="color-3"></span>
                    <span class="color-4"></span>
                    <span class="color-5"></span>
                </div>
            </div>

            <!---------------- BACKGROUND COLORS ----------->
            <div class="background">
                <h4>Background</h4>
                <div class="choose-bg">
                    <div class="bg-1 active">
                        <span></span>
                        <h5 for="bg-1">Light</h5>
                    </div>
                    <div class="bg-2">
                        <span></span>
                        <h5 for="bg-2">Dim</h5>
                    </div>
                    <div class="bg-3">
                        <span></span>
                        <h5 for="bg-3">Lights Out</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="./index.js"></script>
</body>

</html>