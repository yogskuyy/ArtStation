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
<style>
    body {
    padding-top:0px; /* Menambahkan jarak dari top bar */
    background-color: #0B1F3A; /* Warna latar belakang body */
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.menu-transaksi {
    background-color: #19376D;
    height: 70px; /* Mengatur tinggi top bar */
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.edit-transaksi {
    background-color: #f9f9f9; /* Warna latar belakang form */
    padding: 30px; /* Padding di dalam form */
    border-radius: 10px; /* Membuat sudut form membulat */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    max-width: 600px; /* Lebar maksimum form */
    margin: 20px auto; /* Margin otomatis untuk membuat form berada di tengah */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.edit-transaksi h2 {
    color: #19376D; /* Warna teks judul */
    margin-bottom: 20px; /* Margin bawah judul */
    text-align: center; /* Posisikan judul di tengah */
}

.edit-transaksi form div {
    margin-bottom: 15px; /* Margin bawah setiap elemen form */
}

.edit-transaksi form label {
    display: block; /* Tampilkan label sebagai blok */
    margin-bottom: 8px; /* Margin bawah label */
    font-weight: bold; /* Teks label tebal */
    color: #19376D; /* Warna teks label */
}

.edit-transaksi form input[type="text"] {
    width: 100%; /* Lebar penuh */
    padding: 12px; /* Padding di dalam input */
    margin-bottom: 10px; /* Margin bawah input */
    border: 1px solid #ccc; /* Border warna abu-abu */
    border-radius: 5px; /* Membuat sudut input membulat */
    box-sizing: border-box; /* Mengatur ukuran box */
    font-size: 16px; /* Ukuran font */
    background-color: #fff; /* Warna latar belakang input */
    transition: border-color 0.3s ease; /* Animasi transisi border */
}

.edit-transaksi form input[type="text"]:focus {
    border-color: #19376D; /* Warna border saat input fokus */
    outline: none; /* Hilangkan outline */
}

.edit-transaksi form button[type="submit"] {
    background-color: #19376D; /* Warna latar belakang tombol */
    color: #fff; /* Warna teks tombol */
    padding: 12px 20px; /* Padding di dalam tombol */
    border: none; /* Hilangkan border tombol */
    border-radius: 5px; /* Membuat sudut tombol membulat */
    cursor: pointer; /* Ubah kursor menjadi pointer */
    font-size: 16px; /* Ukuran font */
    transition: background-color 0.3s ease; /* Animasi transisi warna */
    width: 100%; /* Lebar penuh */
}

.edit-transaksi form button[type="submit"]:hover {
    background-color: #1452a5; /* Warna latar belakang tombol saat hover */
}

@media (max-width: 600px) {
    .edit-transaksi {
        padding: 20px; /* Padding pada perangkat kecil */
    }

    .edit-transaksi form label {
        font-size: 14px; /* Ukuran font label pada perangkat kecil */
    }

    .edit-transaksi form input[type="text"] {
        padding: 10px; /* Padding input pada perangkat kecil */
        font-size: 14px; /* Ukuran font input pada perangkat kecil */
    }

    .edit-transaksi form button[type="submit"] {
        padding: 10px 16px; /* Padding tombol pada perangkat kecil */
        font-size: 14px; /* Ukuran font tombol pada perangkat kecil */
    }
}

</style>
<body>
    <nav class="menu-transaksi">
        <img src="../Asset/ARTSTATION (1920 x 1080 piksel).png" width="150px" height="70px" style="margin-left: 60px;"/>
    </nav>
    <div class="edit-transaksi">
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
