<?php
    include 'koneksi.php';

    // Logika tampilkan data
    $query = "SELECT * FROM buku";
    $hasil = mysqli_query($koneksi, $query);

    // Logika hapus data
    if (isset($_GET['hapus_id'])) {
        $id = $_GET['hapus_id'];

        $query_hapus = "DELETE FROM buku WHERE id = ?";
        $stmt = $koneksi->prepare($query_hapus);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus: ')". $stmt->error . " window.location.href='index.php'</script>";
        }
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Simper-Lib | Perpustakaan Mini</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="header">
        <div class="header-kiri">
            <h2>Simper-Lib | Sistem Informasi Perpustakaan</h2>
        </div>
        <div class="header-kanan">
            <a href="tambah.php" class="tombol-header">Tambah Buku Baru</a>
        </div>
    </div>

    <div class="container">
        
        <div class="hero">
            <h1>SELAMAT DATANG DI SIMPER-LIB</h1>
            <p>Kelola koleksi buku perpustakaan Anda dengan sistem manajemen yang modern dan efisien.</p>
        </div>

        <div class="judul-bagian">
            <h2>DAFTAR KOLEKSI BUKU PERPUSTAKAAN</h2>
            <p>Manajemen data buku digital Simper-Lib</p>
        </div>

        <div class="kotak-tabel">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        if($hasil && mysqli_num_rows($hasil) > 0){
                            while ($baris = mysqli_fetch_assoc($hasil)) {
                    ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><b><?php echo $baris['judul']; ?></b></td>
                                <td><?php echo $baris['pengarang']; ?></td>
                                <td><i><?php echo $baris['tahun_terbit']; ?></i></td>
                                <td><span class="badge"><?php echo $baris['kategori']; ?></span></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $baris['id']; ?>" class="tombol-edit">Edit</a>
                                    <a href="index.php?hapus_id=<?php echo $baris['id']; ?>" class="tombol-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</a>
                                </td>
                            </tr>
                    <?php
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='6' style='text-align:center;'>Belum ada data buku.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <div class="footer">
        <p>Simper-Lib © 2026. All rights reserved.</p>
    </div>

</body>
</html>
