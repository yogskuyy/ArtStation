<?php
session_start();
if ($_SESSION['email'] == null) {
    header('location:../TUGAS2.php');
    exit;
}

include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah data dengan ID tersebut ada di database
    $sql = "SELECT * FROM tb_transaksi WHERE id_transaksi = $id";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Hapus data dari database
        $sql = "DELETE FROM tb_transaksi WHERE id_transaksi = $id";
        if (mysqli_query($koneksi, $sql)) {
            echo "
                <script>
                    alert('Data transaksi berhasil dihapus');
                    window.location = 'transaksi.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Terjadi kesalahan saat menghapus data');
                    window.location = 'transaksi.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Data tidak ditemukan');
                window.location = 'transaksi.php';
            </script>
        ";
    }
} else {
    header('location: transaksi.php');
    exit;
}

mysqli_close($koneksi);
?>
