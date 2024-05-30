<?php 
include 'koneksi.php';
if(isset($_POST['login'])) {
  $requestemail = $_POST['email'];
  $requestPassword = $_POST['password'];

  $sql = "SELECT * FROM tb_user WHERE email = '$requestemail'";
  list($id_user,  $username, $email, $password) = mysqli_fetch_row(mysqli_query($koneksi, $sql));
  $result = mysqli_query($koneksi, $sql);
  
  if(mysqli_num_rows($result) > 0) {
    if (password_verify($requestPassword, $password)) {
        while($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['email'] = $row['email'];
            header('location:admin/DashboardAdmin.php');
        }
      } else { 
          echo "
          <script>
            alert('email atau password anda salah, Silahkan coba lagi');
            window.location = 'TUGAS2.php';
          </script>
          ";
      }
    } else { 
        echo "
        <script>
          alert('email atau password anda salah, Silahkan coba lagi');
          window.location = 'TUGAS2.php';
        </script>
        ";
    }
}elseif(isset($_POST['register'])){
  $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_user VALUES(NULL, '$username', '$email', '$password')";

    if(empty($username) || empty($email) || empty($password)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'REGISTER.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Registrasi Berhasil Silahkan Tugas2');
                window.location = 'TUGAS2.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'REGISTER.php';
            </script>
        ";
    }
}elseif(isset($_POST['logout'])){
    session_start();
    session_unset();
    echo "
        <script>
            alert('Berhasil Logout');
            window.location = 'TUGAS2.php';
        </script>
    ";
}

?>