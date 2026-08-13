# 📦 Point of Sales (POS) - Learn Laravel

Aplikasi manajemen Point of Sales (POS) berbasis **Laravel 13** dan **Bootstrap 5**. Aplikasi ini mencakup manajemen master data (produk, kategori, role, peserta), sistem autentikasi, pengelolaan profil pengguna, serta pengaturan kustomisasi logo aplikasi dan favicon.

---

## ✨ Fitur Utama
- 🔐 **Autentikasi & Autorisasi**: Sistem login aman dan pengelolaan session.
- 🛍️ **Manajemen Produk**: CRUD produk lengkap dengan upload foto dan relasi kategori.
- 📁 **Kategori & Role**: Pengelompokan produk dan manajemen role pengguna.
- ⚙️ **Pengaturan Aplikasi (Settings)**: Ubah judul login, nama sidebar, upload logo aplikasi, dan favicon secara dinamis.
- 👤 **Profil Pengguna**: Ubah nama, email, dan ganti password user yang sedang aktif.

---

## 🚀 Panduan Instalasi (Clone & Setup)

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer (device) baru:

### 1. Clone Repository
Buka terminal/command prompt dan jalankan perintah:
```bash
# Menggunakan HTTPS
git clone https://github.com/farizirvansyah/learn-laravel.git

# ATAU Menggunakan SSH
git clone git@github.com:farizirvansyah/learn-laravel.git

# Masuk ke direktori repository
cd learn-laravel
```

### 2. Menginstal Dependensi Composer
Unduh pustaka (vendor) yang dibutuhkan proyek:
```bash
composer install
```

### 3. Buat File Konfigurasi `.env`
Duplikasi file konfigurasi bawaan:
```bash
# Di Windows (CMD / PowerShell)
copy .env.example .env

# Di Mac / Linux / Git Bash
cp .env.example .env
```

### 4. Generate Application Key
Buat kunci enkripsi aplikasi:
```bash
php artisan key:generate
```

### 5. Konfigurasi Database
1. Buat database baru di MySQL (misal melalui phpMyAdmin): `learn_laravel`
2. Buka file `.env`, lalu sesuaikan koneksi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=learn_laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan Migrasi, Seeder & Storage Link
Jalankan migrasi tabel, data default, dan hubungkan folder storage:
```bash
# Menjalankan migrasi tabel dan seeding data default
php artisan migrate --seed

# Membuat symlink storage untuk upload gambar/logo (WAJIB)
php artisan storage:link
```

> **🔑 Kredensial Login Default:**
> - **Email:** `fariz.irvansyah@gmail.com`
> - **Password:** `123`

### 7. Jalankan Server Lokal
Nyalakan server development Laravel:
```bash
php artisan serve
```
Akses aplikasi melalui browser di alamat: **`http://127.0.0.1:8000`**

---

## 🌿 Panduan Kolaborasi Git (Workflow)

Ikuti standar siklus kerja (*workflow*) Git di bawah ini saat mengerjakan fitur baru:

### 1. Sinkronisasi Branch Utama (Pull)
Sebelum mulai ngoding, pastikan branch `main` lokal Anda sinkron dengan GitHub:
```bash
git checkout main
git pull origin main
```

### 2. Membuat Branch Baru
**JANGAN mengedit langsung di branch `main`!** Buat branch baru untuk setiap fitur atau perbaikan:
```bash
# Format: fitur/[nama-fitur] atau bugfix/[nama-bug]
git checkout -b fitur/pengaturan-aplikasi
```

### 3. Menyimpan Perubahan (Commit)
Setelah selesai membuat perubahan:
```bash
# Cek file yang berubah
git status

# Masukkan file ke staging area
git add .

# Simpan perubahan dengan pesan jelas
git commit -m "Menambahkan pengaturan logo dan favicon dinamis"
```

### 4. Mengirim Branch ke Remote (Push)
Kirim branch kerja ke repositori GitHub:
```bash
git push origin fitur/pengaturan-aplikasi
```

### 5. Membuat Pull Request (PR)
1. Buka repositori di GitHub.
2. Klik tombol hijau **"Compare & pull request"**.
3. Tuliskan deskripsi fitur/perbaikan yang telah Anda buat.
4. Klik **Create pull request**.
5. Setelah disetujui (*merge* ke `main`), kembali ke branch `main` lokal:
   ```bash
   git checkout main
   git pull origin main
   ```