<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Kopi Ketenangan</title>
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
              <li><a href="adminkopi.html">Lokasi</a></li>
            </ul>
          </nav>
        </div>
      </header>
                    <section id="login">
                        <h1>Kopi Kenangan Register</h1>
        <form action="" method="POST">
            <label for="Username">Masukan Username</label>
            <input type="text" id="username" name="username" required>

            <label for="Email">Masukan Email</label>
            <input type="email" id="email" name="email" required>
                
            <label for="password">Masukan Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="btn">Masuk</button>
            <?php
            session_start(); // Menggunakan sesi untuk mengelola informasi pengguna
            
            // Mendapatkan nilai dari variabel lingkungan (lebih aman dari penyimpanan di cookie)
            $c_email = getenv("email");
            $c_user = getenv("username");
            $c_pass = getenv("password");
            
            // Menangani permintaan POST untuk mengelola informasi pengguna
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Mengambil input pengguna
                $email = $_POST['email'] ?? '';
                $user = $_POST['username'] ?? '';
                $pass = $_POST['password'] ?? '';
            
                // Memeriksa apakah input email, username, dan password ada
                if ($email && $user && $pass) {
                    // Update cookie dengan data baru (sebaiknya dihindari)
                    setcookie('email', $email, time() + (86400 * 30), "/");
                    setcookie('username', $user, time() + (86400 * 30), "/");
                    setcookie('password', $pass, time() + (86400 * 30), "/");
                    
                    // Gunakan sesi di server sebagai gantinya
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $user;
                    $_SESSION['password'] = password_hash($pass, PASSWORD_DEFAULT); // Menggunakan hash untuk kata sandi
            
                    // Selanjutnya, Anda dapat mengarahkan pengguna ke halaman lain atau memberikan respons yang sesuai
                }
            }
            
            // Selalu gunakan HTTPS untuk memastikan keamanan data saat dikirimkan
            ?>
        </form>
            <p>Login jika sudah mempunyai akun <a href="LoginKopiKetenangan.php">Login</a></p>
                    </section>
    <center>
        <p> © Kopi Ketenangan All Rights Reserved 2024</p>
    </center>
    </footer>
</body>
</html>
