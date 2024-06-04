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
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User</title>
</head>
<body>
<!-- Popup Form -->
<div id="popup" class="popup">
    <span class="close" onclick="closePopup()">&times;</span>
    <form id="dataForm">
        <label for="kopi">Jenis Kopi:</label>
        <input type="text" id="kopi" name="kopi" required>
        
        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" required>
        
        <input type="submit" value="Simpan">
    </form>
</div>

<!-- Overlay -->
<div id="overlay" class="overlay"></div>
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
                <span class="admin_name"> Kopi Ketenangan</span>
            </div>
        </nav>
        <div class="home-content">
            <h3>Jenis Kopi </h3>
            <a class="btn btn-tambah" href="jeniskopi-input.php" style="float:left; text-decoration: none;">Add Data</a>
            <table class="table-data">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Jenis Kopi</th>
                        <th>Grade Kopi</th>
                        <th>Nama Kopi</th>
                        <th>Asal Kopi</th>
                        <th>Harga/pcs</th>
                        <th>Foto Kopi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					include 'koneksi.php';
					$sql = "SELECT * FROM tb_katalogkopi";
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
                             <td>$data[jenis_kopi]</td>
				            	  <td>$data[grade_kopi]</td>
                               <td>$data[nama_kopi]</td>
                               <td>$data[asal_kopi]</td>
                               <td>$data[harga_kopi]</td>
                               <td>
                                 <img src='asset/$data[foto_kopi]' width='200px'>
                               </td>
                               <td>
                                 <a class='btn-edit' href=jeniskopi-edit.php?id=$data[id_kopi]>
                                        Edit
                                 </a> | 
                                 <a class='btn-delete' href=jeniskopi-hapus.php?id=$data[id_kopi]>
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
    <script src="jeniskopi.js"></script>
</body>
</html>
