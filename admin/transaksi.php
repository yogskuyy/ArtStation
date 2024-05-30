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
    text-align:center;
    padding: px;
    border-bottom: 1px solid #ddd;
  }
  
  #sales-table th {
    background-color: #19376D;
    width:auto;
  }
  .edit-transaksi,
  .cetak-transaksi {
    background-color:darkblue;
    color: #fff;
    border: none;
    padding: 8px 18px;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
  }
  .edit-transaksi{
    background-color:darkblue;
    margin-right: 10px;
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
  .btn-edit{
    background-color: #36f462;
    margin-right: 5px;
  }
  .edit-transaksi,
  .cetak-transaksi{
    float: left;
    margin-bottom: 10px;
  }
  </style>
</head>
<body>
  <nav class="menu-container">
    <input type="checkbox" aria-label="Toggle menu" />
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
            <li class="logout"><form action="../masuk-proses.php" method="post">
                <button name="logout">Log Out</button>
            </form></li>
        </ul>
    </div>
  </div>
  <div class="container">
    <main>
      <div class="sales">
        <h2>Data Transaksi</h2>
        <a class='edit-transaksi' href="add-transaksi.php">input data</a>
        <a class='cetak-transaksi' href="transaksi-laporan.php">Cetak</a>
        <table id="sales-table">
          <thead>
            <tr>
              <th>Nama Karya</th>
              <th>Nama Pembeli</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
					include '../koneksi.php';
					$sql = "SELECT * FROM tb_transaksi";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
			   <tr>
				<td colspan='5' align='center'>
                           Data Kosong
                        </td>
			   </tr>
				";
					}
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
                    <tr>
                      <td>$data[nama_karya]</td>
					  <td>$data[nama_pembeli]</td>
                      <td>$data[status]</td>
                      <td >
                        <a class='btn-edit' href=transaksi-edit.php?id=$data[id_transaksi]>
                               Edit
                        </a> | 
                        <a class='btn-delete' href=transaksi-hapus.php?id=$data[id_transaksi]>
                            Hapus
                        </a>
                      </td>
                    </tr>
                  ";
					}
					?>

          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script>
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    // Menambahkan atau menghapus kelas 'open' pada sidebar
    document.querySelector('.sidebar').classList.toggle('open');
});

  
  </script>
</body>
</html>
