<?php
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
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jenis Kopi Entry</title>
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
          <span class="admin_name"> Jenis Kopi</span>
        </div>
      </nav>
      <div class="home-content">
        <h3>Masukan Jenis Kopi</h3>
        <div class="form-login">
          <form action="jeniskopi-proses.php" method="post" enctype="multipart/form-data">
            <label for="jenis"> Jenis Kopi </label>
            <input class="input" type="text" name="jenis" id="jenis" placeholder="Jenis Kopi"/>

            <label for="grade"> Grade Kopi </label>
            <input class="input" type="text" name="grade" id="grade" placeholder="Grade Kopi"/>

            <label for="nama"> Nama Kopi </label>
            <input class="input" type="text" name="nama" id="nama" placeholder="Nama Kopi"/>

            <label for="asal"> Asal Kopi </label>
            <input class="input" type="text" name="asal" id="asal" placeholder="Asal Kopi"/>

            <label for="harga"> Harga Kopi / pcs </label>
            <input class="input" type="number" name="harga" id="harga" placeholder="Harga Kopi / kg"/>

            <label for="photo">Foto Kopi</label>
					  <input type="file" name="photo" id="photo" style="margin-bottom: 20px" />

            <button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
          </form>
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
