<?php 
include 'koneksi.php';
if(isset($_POST['login'])) {
  $requestUsername = $_POST['username'];
  $requestPassword = $_POST['password'];

  $sql = "SELECT * FROM tb_admin WHERE username = '$requestUsername'";
  list($id, $email, $password,  $username) = mysqli_fetch_row(mysqli_query($koneksi, $sql));
  $result = mysqli_query($koneksi, $sql);
  
  if(mysqli_num_rows($result) > 0) {
    if (password_verify($requestPassword, $password)) {
        while($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['username'] = $row['username'];
            header('location:adminkopi.php');
        }
      } else { 
          echo "
          <script>
            alert('email atau password anda salah, Silahkan coba lagi');
            window.location = 'LoginKopiKetenangan.php';
          </script>
          ";
      }
    } else { 
        echo "
        <script>
          alert('email atau password anda salah, Silahkan coba lagi');
          window.location = 'LoginKopiKetenangan.php';
        </script>
        ";
    }
}elseif(isset($_POST['register'])){
  $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_admin VALUES(NULL, '$email', '$password', '$username')";

    if(empty($email) || empty($username) || empty($password)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'RegisterKopiKetenangan.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Registrasi Berhasil Silahkan LoginKopiKetenangan');
                window.location = 'LoginKopiKetenangan.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'RegisterKopiKetenangan.php';
            </script>
        ";
    }
}

?>
