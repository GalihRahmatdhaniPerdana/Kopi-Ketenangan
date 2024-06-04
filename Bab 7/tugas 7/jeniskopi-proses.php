<?php 
include 'koneksi.php';

function upload() {
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'jeniskopi-input.php';
            </script>
        ";

        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstentiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstentiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar');
                window.location = 'jeniskopi-input.php';
            </script>
        ";

        return null;
    }

    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $oke =  move_uploaded_file($tmpName, 'asset/' . $namaFileBaru);
    return $namaFileBaru;

}

if(isset($_POST['simpan'])) {
    $jenis = $_POST['jenis'];
    $grade = $_POST['grade'];
    $nama = $_POST['nama'];
    $asal = $_POST['asal'];
    $harga = $_POST['harga'];
    $photo = upload();

    if(!$photo) {
        return false;
    }
    var_dump( $jenis, $grade, $nama, $asal, $harga, $photo);

    $sql = "INSERT INTO tb_katalogkopi VALUES(NULL, '$jenis', '$grade','$nama', '$asal','$harga', '$photo')";

    if(empty($jenis) || empty($grade)|| empty($asal)|| empty($harga)|| empty($photo)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'jeniskopi-input.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Jenis Kopi Berhasil Ditambahkan');
                window.location = 'jeniskopi.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'jeniskopi-input.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $grade = $_POST['grade'];
    $asal = $_POST['asal'];
    $harga = $_POST['harga'];
    $photoLama = $_POST['photoLama'];

    // cek apakah user pilih gambar atau tidak
    if($_FILES['photo']['error']) {
        $photo = $photoLama;
    }else {
        // foto lama akan dihapus dan diganti foto baru
        unlink('asset/' . $photoLama);
        $photo = upload();
    }

    $sql = "UPDATE tb_katalogkopi SET 
            jenis_kopi = '$jenis',
            grade_kopi = '$grade',
            nama_kopi = '$nama',
            asal_kopi = '$asal',
            harga_kopi = '$harga',
            foto_kopi = '$photo'
            WHERE id_kopi = $id 
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Jenis Kopi Berhasil Diubah');
                window.location = 'jeniskopi.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'jeniskopi-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_katalogkopi WHERE id_kopi = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $photo = $row['photo'];
    unlink('asset/' . $photo);
    

    $sql = "DELETE FROM tb_katalogkopi WHERE id_kopi = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Jenis Kopi Berhasil Dihapus');
                window.location = 'jeniskopi.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Jenis Kopi Gagal Dihapus');
                window.location = 'jeniskopi.php';
            </script>
        ";
    }
}else {
    header('location: jeniskopi.php');
}
