<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kopi Ketenangan</title>
    <link rel="stylesheet" href="css/login.css" />
</head>
<body>
    <header id="navbar">
        <div class="container" >
          <img src="asset/logo.png" alt="logo" class="logo"/>
          <nav>
            <ul type="square">
              <li><a href="#">Home</a></li>
              <li><a href="RegisterKopiKetenangan.html">Register</a></li>
              <li><a href="adminkopi.html">Admin</a></li>
              <li><a href="adminkopi.html">Katalog</a></li>
              <li><a href="adminkopi.html">Lokasi</a></li>
              <li class="login"><a href="LoginKopiKetenangan.html">Login</a></li>
            </ul>
          </nav>
        </div>
      </header>
      <section id="login">
          <h2>LOGIN KOPI KETENANGAN</h2>
          <form action="#" method="POST">
              <label for="username">Masukan Username</label>
              <input type="text" id="username" name="username" required>
                  
              <label for="password">Masukan Password</label>
              <input type="password" id="password" name="password" required>
  
              <button type="submit" class="btn">Login</button>
          </form>
          <p>Belum punya akun? <a href="RegisterKopiKetenangan.php">Daftar di sini</a></p>
          <?php
          // Pengaturan cookie
          $c_email = "email";
          $c_user = "username";
          $c_pass = "password";
          
          // Mendapatkan nilai dari cookie
          $c_emailValue = isset($_COOKIE[$c_email]) ? $_COOKIE[$c_email] : '';
          $c_userValue = isset($_COOKIE[$c_user]) ? $_COOKIE[$c_user] : '';
          $c_passValue = isset($_COOKIE[$c_pass]) ? $_COOKIE[$c_pass] : '';
          
          // Cek jika POST data telah dikirimkan
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $user = isset($_POST['username']) ? $_POST['username'] : '';
              $pass = isset($_POST['password']) ? $_POST['password'] : '';
          
              // Validasi username dan password dari POST terhadap cookie
              if ($user === $c_userValue && $pass === $c_passValue) {
                  header('Location: IndeksKopiKetenangan.html');
                  exit(); // Pastikan untuk menghentikan eksekusi skrip setelah redireksi
              } else {
                  echo '<script>alert("Login GAGAL, Silahkan Cek Username dan Password Anda")</script>';
              }
          }
          ?>
      </section>
      <center>
        <p> © Kopi Ketenangan All Rights Reserved 2024</p>
    </center>
    </footer>
</body>
</html>