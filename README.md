# 📚 Simper-Lib (Sistem Manajemen Perpustakaan)

Simper-Lib adalah sebuah aplikasi web sederhana yang dirancang untuk mengelola data koleksi buku perpustakaan. Proyek ini dibangun untuk mendemonstrasikan implementasi operasi CRUD (Create, Read, Update, Delete) menggunakan PHP Native dan MySQL.

## ✨ Fitur Utama
* **Tampil Data (Read):** Menampilkan daftar buku dari database ke dalam format tabel yang rapi.
* **Tambah Data (Create):** Formulir untuk menambahkan buku baru ke dalam koleksi.
* **Edit Data (Update):** Memperbarui detail informasi buku yang sudah ada.
* **Hapus Data (Delete):** Menghapus data buku dari sistem (menggunakan *Self-Processing Page*).

## 🛠️ Teknologi yang Digunakan
* **Backend:** PHP Native
* **Database:** MySQL
* **Frontend:** HTML5, CSS
* **Icon & Font:** Google Fonts (Inter) & Material Symbols

## 🚀 Cara Menjalankan Proyek di Komputer Lokal

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini di komputermu:

1. Pastikan kamu sudah menginstal aplikasi *local web server* seperti **XAMPP**, **Laragon**, atau **MAMP**.
2. *Clone* atau *Download* repositori ini, lalu masukkan ke dalam folder root web server kamu:
   - Untuk XAMPP: Masukkan ke folder `htdocs`.
   - Untuk Laragon: Masukkan ke folder `www`.
3. Buka **phpMyAdmin** (`http://localhost/phpmyadmin`).
4. Buat database baru dengan nama **`db_simperlib`**.
5. Import file **`db_simperlib.sql`** (yang ada di dalam repositori ini) ke dalam database tersebut.
6. Buka browser dan jalankan aplikasi melalui URL: `http://localhost/simper-lib` (sesuaikan dengan nama folder proyekmu).

---
*Dibuat untuk memenuhi tugas mata kuliah pemrograman web.*
