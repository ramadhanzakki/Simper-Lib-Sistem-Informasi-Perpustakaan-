<?php
    include 'koneksi.php';

    // Mengambil data spesifik berdasarkan nilai '?id=' dari tombol edit
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM buku WHERE id=?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();
        
        if (!$data) {
            echo "<script>alert('Data tidak ditemukan'); window.location.href='index.php';</script>";
            exit;
        }
    } else {
        header("Location: index.php");
        exit;
    }

    // Pemrosesan Memperbarui (Update) setelah form disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_buku   = $_POST['id'];
        $judul     = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit  = $_POST['penerbit'];
        $tahun     = $_POST['tahun_terbit'];
        $kategori  = $_POST['kategori'];

        $query_update = "UPDATE buku SET judul=?, pengarang=?, penerbit=?, tahun_terbit=?, kategori=? WHERE id=?";
        $stmt_update = $koneksi->prepare($query_update);
        $stmt_update->bind_param('sssssi', $judul, $pengarang, $penerbit, $tahun, $kategori, $id_buku);

        if ($stmt_update->execute()) {
            echo "<script>alert('Data berhasil diperbarui'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data: ". $stmt_update->error ."'); window.location.href='index.php';</script>";
        }

        $stmt_update->close();
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit Data Buku - Simper-Lib</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header-putih">
        <h2>Simper-Lib</h2>
        <a href="index.php">Kembali ke Dashboard</a>
    </div>

    <div class="container">
        
        <div class="judul-halaman">
            <h1>EDIT DATA BUKU</h1>
            <p>Ubah informasi detail buku untuk menjaga keakuratan data perpustakaan.</p>
        </div>

        <div class="kotak-form">
            <form action="" method="POST">
                
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="grup-input">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" value="<?php echo htmlspecialchars($data['judul']); ?>" required>
                </div>

                <div class="grup-input">
                    <label>Pengarang</label>
                    <input type="text" name="pengarang" value="<?php echo htmlspecialchars($data['pengarang']); ?>" required>
                </div>

                <div class="grup-input">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" value="<?php echo htmlspecialchars($data['penerbit']); ?>" required>
                </div>

                <div class="grup-input">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" value="<?php echo htmlspecialchars($data['tahun_terbit']); ?>" min="1900" max="2099" required>
                </div>

                <div class="grup-input">
                    <label>Kategori</label>
                    <select name="kategori" required>
                        <option value="<?php echo htmlspecialchars($data['kategori']); ?>" selected>
                            Kategori Saat Ini: <?php echo htmlspecialchars($data['kategori']); ?>
                        </option>
                        <option value="Fiksi">Fiksi</option>
                        <option value="Non-Fiksi">Non-Fiksi</option>
                        <option value="Sains">Sains &amp; Teknologi</option>
                        <option value="Sejarah">Sejarah</option>
                        <option value="Biografi">Biografi</option>
                        <option value="Pendidikan">Pendidikan</option>
                    </select>
                </div>

                <div class="kumpulan-tombol">
                    <button type="submit" class="tombol-simpan">PERBARUI DATA</button>
                    <a href="index.php" class="tombol-kembali">KEMBALI</a>
                </div>

            </form>
        </div>
    </div>
    
    <div class="footer">
        <p>Simper-Lib © 2026. All rights reserved.</p>
    </div>

</body>
</html>
