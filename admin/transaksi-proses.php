<?php 
include '../koneksi.php';

if(isset($_POST['simpan'])) {
    $karya = $_POST['karya'];
    $pembeli = $_POST['pembeli'];
    $status = $_POST['status'];
    
    var_dump( $karya, $pembeli, $status);

    $sql = "INSERT INTO tb_transaksi VALUES(NULL,'$karya', '$pembeli', '$status')";

    if(empty($karya) || empty($status)|| empty($pembeli)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'add-transaksi.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data karya Berhasil Ditambahkan');
                window.location = 'transaksi.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'transaksi.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id         = $_POST['id'];
    $karya = $_POST['karya'];
    $pembeli = $_POST['pembeli'];
    $status      = $_POST['status'];
    

    $sql = "UPDATE tb_transaksi SET 
            WHERE id_karya = $id,
            karya = '$karya',
            pembeli$pembeli = '$pembeli',
            status = '$status',
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data karya Berhasil Diubah');
                window.location = 'transaksi.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'transaksi.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM tb_transaksi WHERE id_transaksi = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    

    $sql = "DELETE FROM tb_transaksi WHERE id_transaksi = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data karya Berhasil Dihapus');
                window.location = 'transaksi.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data karya Gagal Dihapus');
                window.location = 'transaksi.php';
            </script>
        ";
    }
}else {
    header('location: list-karya.php');
}
