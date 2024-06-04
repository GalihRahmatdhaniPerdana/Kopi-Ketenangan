<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = "
          SELECT 
          tb_pembayarankatalogkopi.id_pembayaran,
          tb_pembayarankatalogkopi.jenis_pembayaran,
          tb_pembayarankatalogkopi.tanggal_pembayaran,
          tb_pembayarankatalogkopi.status_pembayaran,
          tb_katalogkopi.nama_kopi
          FROM tb_pembayarankatalogkopi
          INNER JOIN tb_katalogkopi ON tb_pembayarankatalogkopi.id_kopi = tb_katalogkopi.id_kopi";
$result = mysqli_query($koneksi, $query);
$html = '
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    h3 {
        margin: 0;
        padding: 0;
    }
    hr {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
';
$html .= '<center><h3>Data Pembayaran</h3></center><hr/><br>';
$html .= '<table width="100%">
            <tr>
            <th>NO</th>
            <th>Nama Kopi</th>
            <th>Jenis Pembayaran</th>
            <th>Tanggal Pembayaran</th>
            <th>Status Pembayaran</th>
            </tr>';
$no = 1;
while ($row = mysqli_fetch_array($result)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $row['nama_kopi'] . "</td>
                <td>" . $row['jenis_pembayaran'] . "</td>
                <td>" . $row['tanggal_pembayaran'] . "</td>
                <td>" . $row['status_pembayaran'] . "</td>
            </tr>";
    $no++;
}
$html .= "</table>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-pembelian.pdf');
?>
