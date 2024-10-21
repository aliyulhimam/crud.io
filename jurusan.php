<html>
<head>
    <title>Tampil Data Jurusan</title>
</head>
<body>
    <table cellpadding="2" cellspacing="0" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th width='150'>Nama Jurusan</th>
            </tr>
        </thead>
        <tbody>
<?php
include('koneksi.php'); // mengimpor file koneksi
// membuat query untuk menampilkan data dari tabel tb_jurusan
$sql = mysqli_query($conn, "SELECT * FROM tb_jurusan ORDER BY id_jurusan ASC");
//pengecekan apakah ada data yang ditemukan
if (mysqli_num_rows($sql) > 0) {
    $no = 1;
    // mengambil setiap baris hasil query
    while ($row = mysqli_fetch_assoc($sql)) {
        echo "
            <tr>
                <td>".$no."</td>
                <td width= '150'>".$row['nama_jurusan']."</td>
            </tr>
        ";
        $no++;
    }
} else {
    echo "<tr><td colspan='2'>Data tidak ditemukan.<td></tr>";
}
// menutup koneksi (opsional tapi disarankan)
mysqli_close($conn);
?>
        </tbody>
    </table>
</body>
</html>