<?php
  include '../koneksi.php';
  $id = $_GET['id'];
  if(!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'list-karya.php';
      </script>
    ";
  }

  $sql = "SELECT * FROM tb_karya WHERE id_karya = '$id'";
  $result = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_assoc($result);
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
    body {
    background-color: #0B1F3A; /* Warna latar belakang body */
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.sales {
    text-align: center;
}

.sales h2 {
    color: #19376D; /* Warna teks judul */
    margin-bottom: 20px;
}

#toggle-sales {
    background-color: #19376D;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    margin-bottom: 20px;
}

#toggle-sales:hover {
    background-color: #1452a5;
}

#add-artwork-form {
    text-align: left;
}

#add-artwork-form div {
    margin-bottom: 15px;
}

#add-artwork-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #19376D;
}

#add-artwork-form input[type="text"],
#add-artwork-form input[type="number"],
#add-artwork-form input[type="file"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    background-color: #fff;
    transition: border-color 0.3s ease;
}

#add-artwork-form input[type="text"]:focus,
#add-artwork-form input[type="number"]:focus,
#add-artwork-form input[type="file"]:focus {
    border-color: #19376D;
    outline: none;
}

#add-artwork-form button[type="submit"] {
    background-color: #19376D;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    width: 100%;
}

#add-artwork-form button[type="submit"]:hover {
    background-color: #1452a5;
}

#add-artwork-form img {
    display: block;
    margin: 0 auto 10px auto;
    border-radius: 5px;
}

@media (max-width: 600px) {
    .container {
        padding: 20px;
    }

    #add-artwork-form label {
        font-size: 14px;
    }

    #add-artwork-form input[type="text"],
    #add-artwork-form input[type="number"],
    #add-artwork-form input[type="file"] {
        padding: 10px;
        font-size: 14px;
    }

    #add-artwork-form button[type="submit"] {
        padding: 10px 16px;
        font-size: 14px;
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
        <input type="hidden" name="id" value="<?= $data['id_karya'] ?>">
               <input type="hidden" name="photoLama" value="<?= $data['photo'] ?>">    
        <label for="karya">Nama Karya Seni:</label>
            <input type="text" id="karya" name="karya" value="<?= $data['karya'] ?>" required><br><br>
            
            <label for="seniman">Seniman:</label>
            <input type="text" id="seniman" name="seniman" value="<?= $data['seniman'] ?>"required><br><br>
            
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="<?= $data['harga'] ?>"required><br><br>

            <label for="photo">Foto Karya Seni:</label>
            <img src="assets/<?= $data['photo'] ?>" alt="" width="200px">
            <input type="file" id="photo" name="photo" required><br><br>
        
            <button type="submit" name="edit">Tambah</button>
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
