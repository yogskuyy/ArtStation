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
  <style>
    /* Form Container */
#add-artwork-form {
    background-color: #f9f9f9; /* Warna latar belakang form */
    padding: 30px; /* Padding di dalam form */
    border-radius: 10px; /* Membuat sudut form melengkung */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    max-width: 600px; /* Lebar maksimal form */
    margin: 20px auto; /* Memposisikan form di tengah */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Font keluarga */
}

/* Form Labels */
#add-artwork-form label {
    display: block; /* Menampilkan label sebagai blok */
    margin-bottom: 8px; /* Jarak bawah label */
    font-weight: bold; /* Membuat teks label tebal */
    color: #19376D; /* Warna teks label */
    float: left;
}

/* Form Inputs */
#add-artwork-form input[type="text"] {
    width: 100%; /* Lebar penuh input */
    padding: 12px; /* Padding di dalam input */
    margin-bottom: 20px; /* Jarak bawah input */
    border: 1px solid #ccc; /* Warna border input */
    border-radius: 5px; /* Membuat sudut input melengkung */
    box-sizing: border-box; /* Menggunakan model kotak border */
    font-size: 16px; /* Ukuran font */
    background-color: #fff; /* Warna latar belakang input */
    transition: border-color 0.3s ease; /* Transisi untuk border */
}

#add-artwork-form input[type="text"]:focus {
    border-color: #19376D; /* Warna border saat fokus */
    outline: none; /* Menghilangkan outline */
}

/* Submit Button */
#add-artwork-form button[type="submit"] {
    background-color: #19376D; /* Warna latar belakang tombol */
    color: #fff; /* Warna teks tombol */
    padding: 12px 20px; /* Padding di dalam tombol */
    border: none; /* Menghilangkan border */
    border-radius: 5px; /* Membuat sudut tombol melengkung */
    cursor: pointer; /* Menampilkan kursor pointer */
    font-size: 16px; /* Ukuran font */
    transition: background-color 0.3s ease; /* Transisi untuk hover */
}

#add-artwork-form button[type="submit"]:hover {
    background-color: #1452a5; /* Warna latar belakang tombol saat hover */
}

/* Responsive Design */
@media (max-width: 600px) {
    #add-artwork-form {
        padding: 20px; /* Padding lebih kecil di perangkat kecil */
    }

    #add-artwork-form label {
        font-size: 14px; /* Ukuran font lebih kecil di perangkat kecil */
    }

    #add-artwork-form input[type="text"] {
        padding: 10px; /* Padding lebih kecil di input */
        font-size: 14px; /* Ukuran font lebih kecil di input */
    }

    #add-artwork-form button[type="submit"] {
        padding: 10px 16px; /* Padding lebih kecil di tombol */
        font-size: 14px; /* Ukuran font lebih kecil di tombol */
    }
}

  </style>
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
        <h2>Transaksi Karya Seni</h2>
        <form id="add-artwork-form" action="transaksi-proses.php" method="post">
            <label for="karya">Nama Karya:</label>
            <input type="text" id="karya" name="karya" required><br><br>
            
            <label for="pembeli">Nama Pembeli:</label>
            <input type="text" id="pembeli" name="pembeli" required><br><br>
            
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required><br><br>
        
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
