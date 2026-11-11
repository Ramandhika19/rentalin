# Rentalin — Sistem Rental Motor & Mobil

Aplikasi rental kendaraan berbasis Laravel 12, PHP 8.2–8.4, MySQL/MariaDB, dan Blade.

## Instalasi di Windows / XAMPP
1. Letakkan folder project di `C:\\xampp\\htdocs\\rentalin`.
2. Jalankan Apache dan MySQL dari XAMPP.
3. Buat database `rentalin` dengan collation `utf8mb4_unicode_ci` di phpMyAdmin.
4. Buka CMD pada folder project, jalankan `composer install`.
5. Salin `.env.example` menjadi `.env`; pastikan DB_CONNECTION=mysql, DB_HOST=127.0.0.1, DB_PORT=3306, DB_DATABASE=rentalin, DB_USERNAME=root dan DB_PASSWORD kosong (jika MySQL XAMPP tidak memakai password).
6. Jalankan `php artisan key:generate`.
7. Jalankan `php artisan migrate --seed`.
8. Jalankan `php artisan storage:link`.
9. Buka `http://localhost/rentalin/public`.

Alternatif: jalankan `php artisan serve` dari CMD.

## Impor phpMyAdmin
Impor file `database/rentalin_phpmyadmin.sql` melalui menu Import. SQL tersebut membuat tabel dan mencatat tiga migration aplikasi. Setelah impor, jalankan `php artisan db:seed` saja; jangan jalankan `php artisan migrate` lagi pada database yang sudah diimpor.

## Akun awal
Admin: `admin@rentalin.test` / `password`. Ganti password sebelum aplikasi dipublikasikan.

Fitur awal: katalog kendaraan, registrasi/login, pemesanan motor/mobil, pembayaran tunai atau transfer manual, panel admin kendaraan dan status pesanan.
