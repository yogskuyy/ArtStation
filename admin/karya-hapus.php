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
    .home-content h4{
      color: #fff;
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
        <div class="home-content">
            <h4>Ingin Menghapus Data ?</h4>
            <form
              action="karya-proses.php"
              method="post"
              enctype="multipart/form-data"
            >
              <input type="hidden" name="id" value="<?= $data['id_karya'] ?>">
              <button type="submit" class="btn" name="hapus" style="margin-top: 50px;">
			Yes
		  </button>
		  <button type="submit" class="btn" name="tidak">
			No
		  </button>
            </form>
          </div>
	</div>
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
