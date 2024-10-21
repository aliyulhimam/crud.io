<html>
<head>
    <title>Tampil Data Jurusan</title>
</head>
<body>
<!-- untuk mengetengahkan konten -->
<center>
<?php
    include('koneksi.php'); // mengambil file koneksi
?>

<?php
// mengecek apakah ID jurusan tersedia di URL untuk proses edit
if (isset($_GET['id_jurusan'])) {
    $id = $_GET['id_jurusan'];
    $sql_edit = mysqli_query($conn, "SELECT * FROM tb_jurusan WHERE id_jurusan='$id'");
    
    while ($data = mysqli_fetch_array($sql_edit)) {
        $ed_id_jurusan = $data['id_jurusan'];
        $ed_nama_jurusan = $data['nama_jurusan']; // Fetch the jurusan name
?>
    <!-- form untuk edit data jurusan -->
    <form action="edit_jurusan.php" method="POST">
        <input type="hidden" name="id_jurusan" value="<?php echo $ed_id_jurusan; ?>">
        Nama Jurusan:
        <input type="text" name="nama_jurusan" value="<?php echo $ed_nama_jurusan; ?>" required>
        <br><br>
        <input type="submit" name="update" value="update">
        <a href='edit_jurusan.php'><input type="button" name="batal" value="Batal"></a>
    </form> <!-- Fixed the form tag -->
    <br>
<?php
    }
}
?>
<?php
// mengecek apakah tombol update ditekan
if (isset($_POST['update'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];

    // query untuk mengupdate data
    $ubah = mysqli_query($conn, "UPDATE tb_jurusan SET nama_jurusan='$nama_jurusan' WHERE id_jurusan='$id_jurusan'");

    if ($ubah) {
        echo "Data berhasil diupdate!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!-- tabel untuk menampilkan data jurusan -->
<table cellpadding="2" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th width='150'>Nama Jurusan</th> <!-- Fixed the closing tag -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        // perintah menampilkan data jurusan
        $sql = mysqli_query($conn, "SELECT * FROM tb_jurusan ORDER BY id_jurusan ASC");
        $no = 1;

        while ($row = mysqli_fetch_array($sql)) {
            $id_jurusan = $row['id_jurusan'];
            $nama_jurusan = $row['nama_jurusan'];

            echo "
                <tr>
                    <td>".$no."</td>
                    <td width='150'>".$nama_jurusan."</td>
                    <td><a href='edit_jurusan.php?id_jurusan=".$id_jurusan."'>Edit</a></td>
                </tr>
            ";
            $no++;
        }
    ?>
    </tbody>
</table>
</center>
</body>
</html>
