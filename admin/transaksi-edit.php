<?php
session_start();
if ($_SESSION['email'] == null) {
    header('location:../TUGAS2.php');
    exit;
}

include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_transaksi WHERE id_transaksi = $id";
    $result = mysqli_query($koneksi, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "
            <script>
                alert('Data tidak ditemukan');
                window.location = 'transaksi.php';
            </script>
        ";
        exit;
    }
} else {
    header('location: transaksi.php');
    exit;
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $karya = $_POST['karya'];
    $pembeli = $_POST['pembeli'];
    $status = $_POST['status'];

    $sql = "UPDATE tb_transaksi SET 
            nama_karya = '$karya',
            nama_pembeli = '$pembeli',
            status = '$status'
            WHERE id_transaksi = $id";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data transaksi berhasil diubah');
                window.location = 'transaksi.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi kesalahan saat mengubah data');
                window.location = 'transaksi-edit.php?id=$id';
            </script>
        ";
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="../css/dbstyle.css">
    <link rel="stylesheet" href="../css/shop.css">
</head>
<body>
    <nav class="menu-container">
        <input type="checkbox" aria-label="Toggle menu" />
        <img src="../Asset/ARTSTATION (1920 x 1080 piksel).png" width="150px" height="70px" style="margin-left: 60px;"/>
    </nav>
    <div class="container">
        <h2>Edit Transaksi</h2>
        <form action="transaksi-edit.php?id=<?php echo $id; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id_transaksi']; ?>">
            <div>
                <label for="karya">Nama Karya</label>
                <input type="text" id="karya" name="karya" value="<?php echo $data['nama_karya']; ?>" required>
            </div>
            <div>
                <label for="pembeli">Nama Pembeli</label>
                <input type="text" id="pembeli" name="pembeli" value="<?php echo $data['nama_pembeli']; ?>" required>
            </div>
            <div>
                <label for="status">Status</label>
                <input type="text" id="status" name="status" value="<?php echo $data['status']; ?>" required>
            </div>
            <div>
                <button type="submit" name="edit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
