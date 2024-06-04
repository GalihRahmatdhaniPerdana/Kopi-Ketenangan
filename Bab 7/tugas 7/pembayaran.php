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
    <title>transaksi</title>
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
        <h3>Data Pembayaran</h3>
        <button type="button" class="btn btn-tambah">
          <a href="pembayaran-input.php">Tambah Data</a>
        </button>
        <button type="button" class="btn btn-tambah">
          <a href="pembayaran-laporan.php">Buat Laporan</a>
        </button>
        <table class="table-data">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Kopi</th>
              <th>Jenis Pembayaran</th>
              <th>Tanggal Pembayaran</th>
              <th>Status Pembayaran</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
					include 'koneksi.php';
					$sql = "
          SELECT 
          tb_pembayarankatalogkopi.id_pembayaran,
          tb_pembayarankatalogkopi.jenis_pembayaran,
          tb_pembayarankatalogkopi.tanggal_pembayaran,
          tb_pembayarankatalogkopi.status_pembayaran,
          tb_katalogkopi.nama_kopi
          FROM tb_pembayarankatalogkopi
          INNER JOIN tb_katalogkopi ON tb_pembayarankatalogkopi.id_kopi = tb_katalogkopi.id_kopi";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "<tr>
				            <td colspan='5' align='center'>
                                    Data Kosong
                                 </td>
			            </tr>
				            ";
				            	}
                                $i =1;
				            	while ($data = mysqli_fetch_assoc($result)) {
				            		echo "
                             <tr>
                              <td>$i</td>
                              <td>$data[nama_kopi]</td>
				            	        <td>$data[jenis_pembayaran]</td>
                              <td>$data[tanggal_pembayaran]</td>
                              <td>$data[status_pembayaran]</td>
                              <td>
                                 <a class='btn-edit' href=pembayaran-edit.php?id=$data[id_pembayaran]>
                                        Edit
                                 </a> | 
                                 <a class='btn-delete' href=pembayaran-hapus.php?id=$data[id_pembayaran]>
                                     Hapus
                                 </a>
                               </td>
                             </tr>
                           ";
                           $i++;
				            	}
				            	?>
          </tbody>
        </table>
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
