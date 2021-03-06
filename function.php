<?php  
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $subjek = htmlspecialchars($data["subjek"]);
    $kegiatan = htmlspecialchars($data["kegiatan"]);
    $detail = htmlspecialchars($data["detail"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $wilayah = htmlspecialchars($data["wilayah"]);
    $nip = htmlspecialchars($data["nip"]);


    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

        // query insert data
        $query = "INSERT INTO galeri VALUES
        ('', '$subjek', '$kegiatan', '$detail', '$tahun', '$wilayah', '$nip', '$gambar')
        ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
}

function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile =  $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
                alert('Pilih gambar Dulu')    
            </script>";
        return false;
    }

    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('Yang anda Pilih bukan Gambar')    
            </script>";
        return false;
    }

    // cek tipe file
    // if($tipeFile != 'image/jpeg' && $tipeFile != 'image/png' ) {
    //     echo "<script>
    //             alert('Yang anda Pilih bukan Gambar')    
    //         </script>";
    //     return false;
    // }


    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 5000000) {
            echo "<script>
                    alert('Ukuran File Terlalu Besar')    
                 </script>";
            return false;
    }

    //  Lolos pengecekan, Gamabar Siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}

function hapus($id) {
    global $conn;
    $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM galeri WHERE id = '$id'") );
    unlink('img/' . $file["gambar"]);
    $hapus = "DELETE FROM galeri WHERE id='$id'";
    mysqli_query($conn, $hapus);
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $subjek = htmlspecialchars($data["subjek"]);
    $kegiatan = htmlspecialchars($data["kegiatan"]);
    $detail = htmlspecialchars($data["detail"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $wilayah = htmlspecialchars($data["wilayah"]);
    $nip = htmlspecialchars($data["nip"]); 
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] == 4 ) {
        $gambar = $gambarLama;
    } else {
        $result = mysqli_query($conn, "SELECT gambar FROM galeri WHERE id = $id");
        $file = mysqli_fetch_assoc($result);

        $fileName = implode('.', $file);
        unlink('img/' . $fileName);

        $gambar = upload();
    }
    
        // query update data
        $query = "UPDATE galeri SET
                   subjek = '$subjek', 
                   kegiatan = '$kegiatan',
                   detail = '$detail',
                   tahun = '$tahun',
                   wilayah = '$wilayah',
                   nip  = '$nip', 
                   gambar = '$gambar'
                WHERE id = $id
                   ";
        
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
}

function cari($keyword) {   
    $query = "SELECT * FROM galeri 
                WHERE
                subjek LIKE '%$keyword%'
            ";
        return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                    alert('Username Sudah Terdaftar')    
                 </script>";
        return false;
    }

    // cek konfirmasi password
    if ( $password !== $password2) {
        echo "<script>
                    alert('Konfirmasi Password Tidak sesuai')    
                 </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')" );

    return mysqli_affected_rows($conn);





}

?>