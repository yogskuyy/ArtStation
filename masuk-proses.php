<?php 
include 'koneksi.php';
if(isset($_POST['login'])) {
    $requestemail = $_POST['email'];
    $requestPassword = $_POST['password'];

    $sql = "SELECT * FROM tb_user WHERE email = '$requestemail'";
    $result = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($requestPassword, $row['password'])) {
            session_start();
            $_SESSION['email'] = $row['email'];
            echo "
            <script>
                alert('Login Berhasil, Selamat Datang Di Dashboard Admin ArtStation');
                window.location = 'admin/DashboardAdmin.php';
            </script>
            ";
        } else { 
            echo "
            <script>
                alert('Email atau password Anda salah, silahkan coba lagi');
                window.location = 'TUGAS2.php';
            </script>
            ";
        }
    } else { 
        echo "
        <script>
            alert('Email atau password Anda salah, silahkan coba lagi');
            window.location = 'TUGAS2.php';
        </script>
        ";
    }
} elseif(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_user (username, email, password) VALUES('$username', '$email', '$password')";

    if(empty($username) || empty($email) || empty($password)) {
        echo "
        <script>
            alert('Pastikan Anda Mengisi Semua Data');
            window.location = 'REGISTER.php';
        </script>
        ";
    } elseif(mysqli_query($koneksi, $sql)) {
        echo "
        <script>
            alert('Registrasi Berhasil, Silahkan Login Sebagai Admin ArtStation');
            window.location = 'TUGAS2.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Terjadi Kesalahan');
            window.location = 'REGISTER.php';
        </script>
        ";
    }
} elseif(isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    echo "
    <script>
        alert('Berhasil Logout');
        window.location = 'TUGAS2.php';
    </script>
    ";
}
?>
