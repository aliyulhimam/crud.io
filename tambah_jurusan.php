<head>
    <title>Form Tambah Jurusan</title>
</head>
<body>
    
<form action="tambah_jurusan.php" method="POST">
    Nama Jurusan:<input type="text" name="nama_jurusan" placeholder="input nama jurusan" required>
    <br>
    <input type="submit" name="simpan" value="simpan">
</form>

<?php
// mengecek apakah from telah disubmit
if (isset($_POST['simpan'])) {
    // mengimpor file koneksi
    include('koneksi.php');

    // menerima dan menampung data yang dikirim melalui from
    $nama_jurusan = $_POST['nama_jurusan'];

    // query untuk menyimpan data ke dalam tabel tb_jurusan
    $sql = "INSERT INTO tb_jurusan (nama_jurusan) VALUES ('$nama_jurusan')";

    // mengeksekusi query dan memeriksa keberhasilannya
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // menutup koneksi
    mysqli_close($conn);
}
?>
</body>
</html>