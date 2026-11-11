# Rentalin — Laravel 5.8 / PHP 7.2

Aplikasi rental mobil dan motor: registrasi/login, role user/admin, katalog kendaraan, booking dengan pengecekan bentrok tanggal, riwayat booking, dashboard admin, tambah/hapus kendaraan, dan pengelolaan status booking.

## Kebutuhan
- PHP 7.2.x
- Composer 2.2 LTS (kompatibel PHP 7.2)
- MySQL 5.7/MariaDB dan ekstensi OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON.

## Instalasi XAMPP
1. Clone repo ke `htdocs/rentalin`.
2. Buat database `rentalin` di phpMyAdmin lalu import `database/rentalin_phpmyadmin.sql`.
3. Salin `.env.example` menjadi `.env` dan sesuaikan konfigurasi database.
4. Jalankan `composer install` dan `php artisan key:generate`.
5. Akses `http://localhost/rentalin/public`.

Akun demo admin: `admin@rentalin.test` / `password`. Ganti password setelah login pertama.

**PENTING:** SQL akan menghapus tabel `users`, `vehicles`, `bookings`, dan `password_resets` yang sudah ada pada database rentalin. Backup dulu data lama sebelum import. Folder `vendor` tidak ada di GitHub; Composer membuatnya lokal saat `composer install`.
