<?php 
require 'function.php';

// ambil data di URL
$id = $_GET["id"];


// query data galeri berdasarkan id
$foto = query("SELECT * FROM galeri WHERE id = $id")[0];

// cek apakah tombol sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    // var_dump($_POST);
    // var_dump($_FILES);
    // die;
    // cek apakah data berhasil diubah atau tidak
     if( ubah($_POST) >= 0 ) {
         echo "
         <script>
            alert('data berhasil DiUbah!');
            document.location.href = 'index.php';
         </script>
         ";
     } else {
        echo "
        <script>
            alert('data gagal DiUbah!');
            document.location.href = 'index.php';
        </script>
        ";
     }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link CSS -->
    <link rel="stylesheet" href="edit.css">
    <title>Tambah data mahasiswa</title>
</head>
<body>

<!-- Navbar -->
<nav>  
    <div class="containerr">
    <img src="./img/logo.jpg" alt=""> 
    
    <h2 class="upload"> Form Edit</h2>

    <a class="btn btn-primary" href="index.php">Kembali</a>


            
    </div>
</nav>

<!-- form ubah -->

<div class="container">
    <div class="title">Edit Foto</div>
    <form action="" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $foto["id"]; ?> ">
        <input type="hidden" name="gambarLama" value="<?= $foto["gambar"]; ?> ">

        <br>
            <div class="user-details">
                <br>

                <div class="input-box">
                <span class="details" for="subjek">Kategori :</span>
                <select name="subjek" id="subjek">
                    <option selected disabled>Pilih Kategori</option>
                    <option >Kepala</option>
                    <option >SP2020</option>
                    <option >Tata Usaha</option>
                    <option >Statistik Sosial</option>
                    <option >Statistik Produksi</option>
                    <option >Statistik Distribusi</option>
                    <option >Neraca Wilayah dan Analis</option>
                    <option >IPDS</option>
                    <option >Fungsional</option>
                    </select>
                </div>

                <div class="input-box">
                    <span class="details" for="kegiatan">Kegiatan :</span>
                    <input type="text" name="kegiatan" id="kegiatan" required value="<?= $foto["kegiatan"]; ?> ">
                </div>

                <div class="input-box">
                    <span class="details" for="detail">Detail :</span>
                    <input type="text" name="detail" id="detail" required value="<?= $foto["detail"]; ?> ">
                </div>

                <div class="input-box">
                    <span class="details" for="tahun">Tanggal :</span>
                    <input type="date" name="tahun" id="tahun" required value="<?= $foto["tahun"]; ?>">
                </div>

                <div class="input-box">
                    <span class="details" for="wilayah">Wilayah :</span>
                    <input type="text" name="wilayah" id="wilayah" required value="<?= $foto["wilayah"]; ?> ">
                </div>
                
                <div class="input-box">
                    <span class="details" for="nip">NIP :</span>
                    <input type="text" name="nip" id="nip" required value="<?= $foto["nip"]; ?> ">
                </div>
                
                <br>
                <input type="file" name="gambar" id="gambar">
                <div class="image-preview" id="imagePreview">
                    <img src="img/<?= $foto['gambar']; ?>" value="<?= $foto["gambar"]; ?>" alt="Image Preview" class="image-preview__image">
                    <span class="image-preview__default-text" for="gambar">Image Preview</span>
                </div>

                <h5>*ukuran file tidak boleh lebih dari 10mb</h5>

                <div class="button">
                    <input type="submit" name="submit"> 
                </div>
                
        
            </div>
        </form>
    </div>










<script>
    const gambar = document.getElementById("gambar");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

    gambar.addEventListener("change", function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";

        reader.addEventListener ("load", function() {
            console.log(this);
            previewImage.setAttribute("src", this.result);
        });
            reader.readAsDataURL (file);
        } else {
            previewDefaultText.style.display = null;
            previewImage.style.display = null;
            previewImage.setAttribute("src", "");
        }
    });
</script>
</body>
</html>
</body>
</html>