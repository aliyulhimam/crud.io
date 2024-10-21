<html>
<head>
    <title>Tampil Data Jurusan</title>
</head>
<body>
<center>
<table cellpadding="2" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th width='150'>Nama Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include('koneksi.php');

        // Query untuk menampilkan data jurusan
        $sql = mysqli_query($conn, "SELECT * FROM tb_jurusan ORDER BY id_jurusan ASC");
        $no = 1;

        while ($row = mysqli_fetch_assoc($sql)) { // Corrected function name
           $id_jurusan = $row['id_jurusan']; // Corrected variable name
           $nama_jurusan = $row['nama_jurusan'];
           echo "
           <tr>
               <td>".$no."</td>
               <td width='150'>".$nama_jurusan."</td>
               <td>
                   <a href='tampil_jurusan.php?hapus_id_jurusan=".$id_jurusan."'
                      onclick='return confirm(\"Apakah Anda yakin ingin menghapus jurusan ini?\")'>Hapus</a>
               </td>
           </tr>";
           $no++;
        }
    ?>
    </tbody>
</table>
</center>

<?php
// Logika untuk menghapus data jurusan
if (isset($_GET['hapus_id_jurusan'])) {
    $id = $_GET['hapus_id_jurusan'];

    // Query untuk menghapus data dari database
    $del = mysqli_query($conn, "DELETE FROM tb_jurusan WHERE id_jurusan='$id'");

    if ($del) {
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'tampil_jurusan.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Menutup koneksi (opsional)
mysqli_close($conn);
?>
</body>
</html>

