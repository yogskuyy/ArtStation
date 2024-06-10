<?php
session_start();
if ($_SESSION['email'] == null) {
    header('location:../TUGAS2.php');
    exit;
}

include '../koneksi.php';

// Menghitung jumlah transaksi
$sqlTransaksi = "SELECT COUNT(*) as count FROM tb_transaksi";
$resultTransaksi = mysqli_query($koneksi, $sqlTransaksi);
$dataTransaksi = mysqli_fetch_assoc($resultTransaksi);
$jumlahTransaksi = $dataTransaksi['count'];

// Menghitung jumlah karya seni
$sqlKarya = "SELECT COUNT(*) as count FROM tb_karya";
$resultKarya = mysqli_query($koneksi, $sqlKarya);
$dataKarya = mysqli_fetch_assoc($resultKarya);
$jumlahKarya = $dataKarya['count'];

mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtStation-Admin</title>
    <link rel="stylesheet" href="../css/shop.css">
    <link rel="stylesheet" href="../css/dbstyle.css">
    <style>
        h1 {
            color: #fff;
            font-family: 'Arial', sans-serif; /* Atur font untuk h1 */
        }
        .logout button {
            background-color: transparent;
            color: #fff;
            border: none;
            font-size: 16px;
            margin: 5px;
        }
        .widget-container {
            display:flex;
            justify-content: space-around;
            margin-top: 100px;
        }
        .widget {
            background-color: cornflowerblue;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 30%;
            font-family: 'Arial', sans-serif; /* Atur font untuk widget */
        }
        .widget h3 {
            margin: 0;
            font-size: 24px;
            font-family: 'Arial', sans-serif; /* Atur font untuk h3 dalam widget */
        }
        .widget p {
            margin: 10px 0 0;
            font-size: 60px;
            font-family:fantasy /* Atur font untuk p dalam widget */
        }
    </style>
</head>
<body>
    <nav class="menu-container">
        <input type="checkbox" aria-label="Toggle menu" />
        <img src="../Asset/ARTSTATION (1920 x 1080 piksel).png" width="150px" height="70px" style="margin-left: 70px;" />
    </nav>
    <div class="conten">
        <button class="sidebar-toggle">&#9776;</button>
        <div class="sidebar">
            <ul>
                <li><a href="DashboardAdmin.php">Dashboard</a></li>
                <li><a href="add-karya.php">Add Karya Seni</a></li>
                <li><a href="list-karya.php">List Karya</a></li>
                <li><a href="transaksi.php">Transaksi</a></li>
                <li class="logout">
                    <form action="../masuk-proses.php" method="post">
                        <button name="logout">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <main>
            <div class="sales">
                <h1>Selamat Datang Admin</h1>
            </div>
            <div class="widget-container">
                <div class="widget">
                    <h3>Jumlah Transaksi</h3>
                    <p id="transaksi-count"><?php echo $jumlahTransaksi; ?></p>
                </div>
                <div class="widget">
                    <h3>Jumlah Karya Seni</h3>
                    <p id="karya-count"><?php echo $jumlahKarya; ?></p>
                </div>
            </div>
        </main>
    </div>
    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('open');
        });
    </script>
</body>
</html>
