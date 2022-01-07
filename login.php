<?php
session_start();
require 'function.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    // ambil username berdasarkan id
     $result = mysqli_query ($conn, "SELECT username FROM user WHERE
         id = $id");
    $row = mysqli_fetch_assoc ($result);
   // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}



if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // cek session
            $_SESSION["login"] = true;

            // cek Ingat saya
            if (isset($_POST['ingat'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 86400);
                setcookie('key', hash('sha256', $row['username']), time()+ 86400);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
          alert('user baru berhasil ditambahkan')
          </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css" />
    <title>Selamat Datang - Doktor BPS</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="img/Logo2.png" alt="" class="img">
        </div>
        <!---------------------------------------SIGN IN---------------------------------------------->
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="post">
                    <h2 class="title">Sign in</h2>
                    <?php if (isset($error)) : ?>
                        <p style="color: red; font-style:italic; ">Username atau Password Salah</p>
                    <?php endif; ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" id="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" />
                    </div>
                    <input type="submit" name="login" value="Login" class="btn solid" />
                </form>
                <!-----------------------------------END OF SIGN IN--------------------------------------->

                <!---------------------------------------SIGN UP---------------------------------------------->
                <form action="" method="post" class="sign-up-form">
                    <h2 class="title">YAY</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" id="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-check-circle"></i>
                        <input type="password" name="password" id="password" placeholder="Konfirmasi Password" />
                    </div>
                    <input type="submit" name="register" class="btn" value="YAY" />
                    <p class="social-text">Atau daftar dengan Akun sosial media Anda</p>
                    <div class="social-media">
                    
                    </div>
                </form>
            </div>
        </div>
        <!--------------------------------------- END OF SIGN UP---------------------------------------------->

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Selamat Datang di Doktor BPS!</h3>
                    <p>
                        abadikan semua kegiatan dan aktifitas pekerjaan Anda disini.
                    </p>
                    
                </div>
                <img src="img/foto5.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah punya Akun?</h3>
                    <p>
                        Silahkan login dan explore semua kegiatan dan aktifitas kerja Anda disini!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src=".js"></script>
</body>

</html>