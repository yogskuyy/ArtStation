<?php
session_start();
if ($_SESSION['email'] == null) {
	header('location:../TUGAS2.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ArtStation-Admin</title>
  <link rel="stylesheet" href="../css/shop.css">
  <link rel="stylesheet" href="../css/dbstyle.css">
</head>
<body>
  <nav class="menu-container">
    <input type="checkbox" id="menu-toggle" aria-label="Toggle menu" />
    <img src="../Asset/ARTSTATION (1920 x 1080 piksel).png" width="150px" height="70px" style="margin-left: 60px;"/>
  </nav>
  <div class="conten">
    <button class="sidebar-toggle">&#9776;</button> 
    <div class="sidebar">
        <ul>
            <li><a href="DashboardAdmin.php">Dashboard</a></li>
            <li><a href="add-karya.php">Add Karya Seni</a></li>
            <li><a href="list-karya.php">List Karya</a></li>
            <li><a href="list-karya.php">Transaksi</a></li>
            <li><form action="../masuk-proses.php" method="post">
            <li class="logout"><form action="../masuk-proses.php" method="post">
                <button name="logout">Log Out</button>
            </form></li>
        </ul>
    </div>
  </div>
  <div class="container">
    <main>
      <div class="sales">
        <h2>Penjualan Karya Seni</h2>
        <button id="toggle-sales">Tambah Karya Seni</button>
        <form id="add-artwork-form" style="display: none;" action="karya-proses.php" method="post" enctype="multipart/form-data">
            <label for="karya">Nama Karya Seni:</label>
            <input type="text" id="karya" name="karya" required><br><br>
            
            <label for="seniman">Seniman:</label>
            <input type="text" id="seniman" name="seniman" required><br><br>
            
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" required><br><br>

            <label for="photo">Foto Karya Seni:</label>
            <input type="file" id="photo" name="photo" required><br><br>
        
            <button type="submit" name="simpan">Tambah</button>
        </form>
      </div>
    </main>
  </div>
  <script>
    // Menangani toggle sidebar
    document.querySelector('.sidebar-toggle').addEventListener('click', function() {
      document.querySelector('.sidebar').classList.toggle('open');
    });

    // Mendapatkan elemen tombol "Tambah Karya Seni" dan form
    const toggleButton = document.getElementById('toggle-sales');
    const form = document.getElementById('add-artwork-form');

    // Menambahkan event listener untuk saat tombol ditekan
    toggleButton.addEventListener('click', function() {
      // Mengubah tampilan form dari none menjadi block, atau sebaliknya
      form.style.display = (form.style.display === 'none') ? 'block' : 'none';
    });
  </script>

</body>
</html>