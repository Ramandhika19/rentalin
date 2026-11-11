# Rentalin — Sistem Rental Motor & Mobil

Aplikasi penyewaan kendaraan berbasis Laravel dengan pola MVC, autentikasi pengguna, dashboard admin, katalog kendaraan, pemesanan, dan pengelolaan pembayaran manual.

## Stack
- Laravel 12
- PHP 8.2+
- MySQL 8+
- Blade dan Bootstrap 5

## Fitur
- Katalog motor dan mobil serta halaman detail kendaraan
- Registrasi, login, dan dashboard pelanggan
- Pemesanan berdasarkan tanggal mulai dan selesai
- Validasi ketersediaan agar jadwal rental tidak bertabrakan
- Pilihan pembayaran tunai atau transfer manual
- Dashboard admin untuk CRUD kendaraan dan kategori
- Pengelolaan pesanan, verifikasi pembayaran, dan status rental

## Instalasi
1. Jalankan `composer install`
2. Salin `.env.example` menjadi `.env`, lalu atur koneksi MySQL
3. Jalankan `php artisan key:generate`
4. Jalankan `php artisan migrate --seed`
5. Jalankan `php artisan storage:link`
6. Jalankan `php artisan serve`

Akun admin awal setelah seeder: `admin@rentalin.test` / `password`. Segera ganti password sebelum aplikasi dipublikasikan.

> Status: dokumentasi awal repositori. Source aplikasi dan migration akan ditambahkan pada commit berikutnya.