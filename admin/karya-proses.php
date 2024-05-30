<?php 
include '../koneksi.php';

function upload() {
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'add-karya.php';
            </script>
        ";

        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstentiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstentiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar');
                window.location = 'add-karya.php';
            </script>
        ";

        return null;
    }

    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $oke =  move_uploaded_file($tmpName, '../Asset/' . $namaFileBaru);
    return $namaFileBaru;

}

if(isset($_POST['simpan'])) {
    $karya = $_POST['karya'];
    $seniman = $_POST['seniman'];
    $harga = $_POST['harga'];
    $photo = upload();

    if(!$photo) {
        return false;
    }
    var_dump($photo, $karya, $harga, $seniman);

    $sql = "INSERT INTO tb_karya VALUES(NULL, '$photo','$karya', '$harga','$seniman')";

    if(empty($karya) || empty($harga)|| empty($seniman)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'add-karya.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data karya Berhasil Ditambahkan');
                window.location = 'list-karya.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'add-karya.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id         = $_POST['id'];
    $karya = $_POST['karya'];
    $harga      = $_POST['harga'];
    $seniman = $_POST['seniman'];
    $photoLama = $_POST['photoLama'];

    // cek apakah user pilih gambar atau tidak
    if($_FILES['photo']['error']) {
        $photo = $photoLama;
    }else {
        // foto lama akan dihapus dan diganti foto baru
        unlink('../Asset/' . $photoLama);
        $photo = upload();
    }

    $sql = "UPDATE tb_karya SET 
            photo = '$photo',
            karya = '$karya',
            harga = '$harga',
            seniman = '$seniman'
            WHERE id_karya = $id
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data karya Berhasil Diubah');
                window.location = 'list-karya.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'list-karyat.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_karya WHERE id_karya = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $photo = $row['photo'];
    unlink('../Asset/' . $photo);
    

    $sql = "DELETE FROM tb_karya WHERE id_karya = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data karya Berhasil Dihapus');
                window.location = 'list-karya.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data karya Gagal Dihapus');
                window.location = 'list-karya.php';
            </script>
        ";
    }
}else {
    header('location: list-karya.php');
}
