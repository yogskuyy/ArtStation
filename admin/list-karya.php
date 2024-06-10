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
  <link rel="stylesheet" href="../css/dbstyle.css">
  <link rel="stylesheet" href="../css/shop.css">
  <style>
    #sales-table {
      width: 100%;
    }
    #sales-table th, #sales-table td {
      color: #fff;
      background-color: transparent;
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    #sales-table th {
      background-color: #19376D;
      width:auto;
    }
    .btn-edit,
    .btn-delete {
      background-color: #f44336;
      color: #fff;
      border: none;
      padding: 6px 12px;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
    }
    .btn-edit {
      background-color: #36f462;
      margin-right: 5px;
    }
    .btn-print {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      margin-bottom: 20px;
      text-decoration: none;
      float: left;
    }
  </style>
</head>
<body>
  <nav class="menu-container">
    <input type="checkbox" aria-label="Toggle menu" />
    <img src="../Asset/ARTSTATION (1920 x 1080 piksel).png" width="150px" height="70px" style="margin-left: 70px;"/>
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
        <h2>Penjualan Karya Seni</h2>
        <button class="btn-print" onclick="window.location.href='karya-laporan.php'">Cetak</button>
        <table id="sales-table">
          <thead>
            <tr>
              <th>Photo</th>
              <th>Karya</th>
              <th>Seniman</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../koneksi.php';
            $sql = "SELECT * FROM tb_karya";
            $result = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($result) == 0) {
              echo "<tr><td colspan='5' align='center'>Data Kosong</td></tr>";
            } else {
              while ($data = mysqli_fetch_assoc($result)) {
                echo "
                  <tr>
                    <td><img src='../Asset/{$data['photo']}' width='200px'></td>
                    <td>{$data['karya']}</td>
                    <td>{$data['seniman']}</td>
                    <td>Rp " . number_format($data['harga'], 0, ',', '.') . "</td>
                    <td>
                      <a class='btn-edit' href='karya-edit.php?id={$data['id_karya']}'>Edit</a>
                      <a class='btn-delete' href='karya-hapus.php?id={$data['id_karya']}'>Hapus</a>
                    </td>
                  </tr>
                ";
              }
            }
            ?>
          </tbody>
        </table>
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
