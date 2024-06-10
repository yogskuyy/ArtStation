<?php
session_start();
if ($_SESSION['email'] == null) {
    header('location:../TUGAS2.php');
    exit;
}

require '../dompdf/autoload.inc.php';
require '../koneksi.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Konfigurasi Dompdf
$options = new Options();
$options->set('defaultFont', 'Arial');
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Fetch data karya seni dari database
$sql = "SELECT * FROM tb_karya";
$result = mysqli_query($koneksi, $sql);

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Karya Seni</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #19376D;
            color: white;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Karya Seni</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Karya</th>
                <th>Seniman</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>';

if (mysqli_num_rows($result) == 0) {
    $html .= '
        <tr>
            <td colspan="3">Tidak ada data</td>
        </tr>';
} else {
    while ($data = mysqli_fetch_assoc($result)) {
        $html .= '
            <tr>
                <td>' . $data['karya'] . '</td>
                <td>' . $data['seniman'] . '</td>
                <td>Rp ' . number_format($data['harga'], 0, ',', '.') . '</td>
            </tr>';
    }
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// Load HTML ke Dompdf
$dompdf->loadHtml($html);

// Set ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'portrait');

// Render HTML menjadi PDF
$dompdf->render();

// Output PDF ke browser
$dompdf->stream("Laporan_Karya_Seni.pdf", ["Attachment" => 1]);

// Tutup koneksi database
mysqli_close($koneksi);
?>
