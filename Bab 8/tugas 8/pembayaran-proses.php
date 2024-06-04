<?php 
include 'koneksi.php';

if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    var_dump($nama, $jenis, $tanggal,$status);

    $sql = "INSERT INTO tb_pembayarankatalogkopi VALUES(NULL, '$nama', '$jenis', '$tanggal', '$status')";

    if(empty($nama) || empty($jenis)|| empty($tanggal)|| empty($status)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'pembayaran-input.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Pembayaran Berhasil Ditambahkan');
                window.location = 'pembayaran.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'pembayaran-input.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "UPDATE tb_pembayarankatalogkopi SET 
            id_kopi = '$nama',
            jenis_pembayaran = '$jenis',
            tanggal_pembayaran = '$tanggal',
            status_pembayaran = '$status'
            WHERE id_pembayaran = $id 
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Pembayaran Berhasil Diubah');
                window.location = 'pembayaran.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'pembayaran-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_pembayarankatalogkopi WHERE id_pembayaran = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    

    $sql = "DELETE FROM tb_pembayarankatalogkopi WHERE id_pembayaran = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Pembayaran Berhasil Dihapus');
                window.location = 'pembayaran.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Pembayaran Gagal Dihapus');
                window.location = 'pembayaran.php';
            </script>
        ";
    }
}else {
    header('location: pembayaran.php');
}
