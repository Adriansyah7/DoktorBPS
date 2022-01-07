<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'function.php';
$foto = query("SELECT * FROM galeri");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Data Foto</title>
  <link rel="stylesheet" href="cetak.css">
</head>
<body>
  <h1>Daftar Data Foto</h1>
  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Gambar</th>
        <th>Subjek</th>
        <th>Kegiatan</th>
        <th>Detail</th>
        <th>Tahun</th>
        <th>Wilayah</th>
        <th>NIP</th>
    </tr>';

    $i = 1;
    foreach ($foto as $row) {
      $html .= '<tr>
          <td>'. $i++ .'</td>
          <td><img src="img/'. $row["gambar"] .'" width="100" ></td>
          <td>'. $row["subjek"] .'</td>
          <td>'. $row["kegiatan"] .'</td>
          <td>'. $row["detail"] .'</td> 
          <td>'. $row["tahun"] .'</td>
          <td>'. $row["wilayah"] .'</td>
          <td>'. $row["nip"] .'</td>
      </tr>';
    }

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('', \Mpdf\Output\Destination::INLINE);

?>