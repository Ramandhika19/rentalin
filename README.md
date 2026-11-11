# Rentalin — Sistem Rental Motor & Mobil (Laravel 6.20)

Project pada branch ini disiapkan untuk **XAMPP PHP 7.2.28** dengan **Laravel 6.20.x**. Branch `main` tetap menggunakan versi awal Laravel 12.

## Persyaratan

- XAMPP dengan PHP 7.2.28
- Apache dan MySQL aktif
- Composer 2.2 LTS (gunakan Composer yang kompatibel dengan PHP 7.2)
- Ekstensi PHP: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo

## Instalasi

1. Clone/download branch `xampp-php72-laravel620` ke `C:\xampp\htdocs\rentalin`.
2. Buka CMD di folder project dan jalankan `C:\xampp\php\php.exe -v` untuk memastikan PHP yang dipakai adalah 7.2.28.
3. Jalankan `composer install`. Jika Composer memakai PHP lain, jalankan Composer menggunakan PHP XAMPP.
4. Salin `.env.example` menjadi `.env`.
5. Buat database bernama `rentalin` melalui phpMyAdmin dengan collation `utf8mb4_unicode_ci`.
6. Import file `database/rentalin_phpmyadmin.sql` ke database tersebut.
7. Jalankan:
   ```bash
   php artisan key:generate
   php artisan db:seed
   php artisan storage:link
   ```
8. Buka `http://localhost/rentalin/public`.

Atur koneksi database pada `.env` jika username/password MySQL berbeda dari konfigurasi XAMPP default.

## Alternatif membuat database lewat migration

Pada database kosong, jalankan `php artisan migrate --seed` sebagai pengganti langkah import SQL dan `php artisan db:seed`. Jangan menjalankan migration pada database yang sudah diimpor karena SQL sudah mencatat ketiga migration sebagai selesai.

## Login admin contoh

- Email: `admin@rentalin.test`
- Password: `password`

Akun dibuat oleh seeder. Ganti password setelah login pertama.

## Catatan

Laravel 6 merupakan versi lama. Branch ini ditujukan untuk kebutuhan kompatibilitas lokal/legacy PHP 7.2, bukan rekomendasi deployment publik jangka panjang.