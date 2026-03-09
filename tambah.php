<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tambah Data Buku - Simper-Lib</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="header-putih">
        <h2>Simper-Lib</h2>
        <a href="index.php">Kembali ke Dashboard</a>
    </div>

    <div class="container">
        <div class="judul-halaman">
            <h1>TAMBAH DATA BUKU</h1>
            <p>Lengkapi formulir di bawah ini untuk menambahkan koleksi buku baru.</p>
        </div>

        <div class="kotak-form">
            <form action="tambah.php" method="POST">
                
                <div class="grup-input">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" placeholder="Masukkan judul lengkap buku" required>
                </div>

                <div class="grup-input">
                    <label>Pengarang</label>
                    <input type="text" name="pengarang" placeholder="Nama penulis/pengarang" required>
                </div>

                <div class="grup-input">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" placeholder="Nama perusahaan penerbit" required>
                </div>

                <div class="grup-input">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun-terbit" placeholder="Contoh: 2023" min="1900" max="2099" required>
                </div>

                <div class="grup-input">
                    <label>Kategori</label>
                    <select name="kategori" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Fiksi">Fiksi</option>
                        <option value="Non-Fiksi">Non-Fiksi</option>
                        <option value="Sains">Sains & Teknologi</option>
                        <option value="Sejarah">Sejarah</option>
                        <option value="Biografi">Biografi</option>
                        <option value="Pendidikan">Pendidikan</option>
                    </select>
                </div>

                <div class="kumpulan-tombol">
                    <button type="submit" class="tombol-simpan">SIMPAN DATA</button>
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

<?php
    include 'koneksi.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun-terbit'];
        $kategori = $_POST['kategori'];

        $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, kategori) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sssds", $judul, $pengarang, $penerbit, $tahun, $kategori);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil disimpan!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data: " . $stmt->error . "');</script>";
        }
        
        $stmt->close();
    }
?>