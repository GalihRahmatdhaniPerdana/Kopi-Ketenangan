<?php
include 'koneksi.php';

// Ambil data dari tabel tb_item
$itemQuery = "SELECT id_kopi, nama_kopi FROM tb_katalogkopi";
$itemResult = mysqli_query($koneksi, $itemQuery);

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
          <form action="pembayaran-proses.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama"> Nama Kopi </label>
                <select id="nama" name="nama" style="height: 40px; width: 1000px ; text-align: center;" required>
                    <option value="">--- Pilih Nama Kopi ---</option>
                    <?php
                    while ($kopi = mysqli_fetch_assoc($itemResult)) {
                        echo "<option value='{$kopi['id_kopi']}'>{$kopi['nama_kopi']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jenis"> Jenis Pembayaran </label>
                <select id="jenis" name="jenis" style="height: 40px; width: 100%; text-align: center;" required>
                    <option value="">--- Pilih Jenis Pembayaran ---</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="QRIS">QRIS</option>
                    <option value="Tunai">Tunai</option>
                </select>
            </div>

            <label for="tanggal"> Tanggal Pembayaran </label>
            <input class="input" type="date" name="tanggal" id="tanggal" placeholder="Grade Kopi"/>

            <div class="form-group">
                <label for="status"> Status Pembayaran </label>
                <select id="status" name="status" style="height: 40px; width: 100%; text-align: center; margin-bottom: 20px;" required>
                    <option value="">--- Pilih Status ---</option>
                    <option value="Terbayar">Terbayar<option>
                    <option value="Belum Bayar">Belum Bayar<option>
                </select>
            </div>

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
