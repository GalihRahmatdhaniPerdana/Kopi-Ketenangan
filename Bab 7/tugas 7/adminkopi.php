<?php
include 'koneksi.php';

// Mengambil total data dari tb_katalogkopi
$kata = "SELECT COUNT(*) as total FROM tb_katalogkopi";
$resultKopi = mysqli_query($koneksi, $kata);
if ($resultKopi) {
    $rowKopi = mysqli_fetch_assoc($resultKopi);
    $totalKopi = $rowKopi['total'];
} else {
    $totalKopi = 0; // Jika query gagal, atur default value
}

// Mengambil total data dari tb_pembayarankatalogkopi
$pem = "SELECT COUNT(*) as total FROM tb_pembayarankatalogkopi";
$resultPembayaran = mysqli_query($koneksi, $pem);
if ($resultPembayaran) {
    $rowPembayaran = mysqli_fetch_assoc($resultPembayaran);
    $totalPembayaran = $rowPembayaran['total'];
} else {
    $totalPembayaran = 0; // Jika query gagal, atur default value
}

session_start();
if($_SESSION['username'] == null) {
  header('location:LoginKopiKetenangan.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/icon.png" />
    <link rel="stylesheet" href="css/adminkopi.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kopi Ketenangan Admin</title>
    <style>
        .dashboard {
            display: flex;
            gap: 20px;
        }
        .widget {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .widget h2 {
            margin: 0;
            font-size: 2em;
        }
        .widget p {
            margin: 5px 0 0;
            font-size: 1em;
            color: #888;
        }
    </style>
  </head>
  
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bx-category"></i>
        <span class="logo_name">Kopi Ketenangan</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="adminkopi.php" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="jeniskopi.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Jenis Kopi</span>
          </a>
        </li>
        <li>
          <a href="pembayaran.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Pembayaran</span>
          </a>
        </li>
        <li>
          <a href="logout.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
        </div>
        <div class="profile-details">
          <span class="admin_name">Kopi Ketenangan</span>
        </div>
      </nav>
      <div class="home-content">
        <h1>Selamat Datang Admin</h1>
        <div class="dashboard">
            <div class="widget">
                <h2 id="total-kopi"><?php echo $totalKopi; ?></h2>
                <p>Total Kopi</p>
            </div>
            <div class="widget">
                <h2 id="total-pembayaran"><?php echo $totalPembayaran; ?></h2>
                <p>Total Pembayaran</p>
            </div>
        </div>
      </div>
    </section>
    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>
