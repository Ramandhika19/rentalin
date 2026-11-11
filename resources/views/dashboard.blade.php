@extends("layouts.app")
@section("title", "Dashboard")
@section("content")
<section class="hero">
    <h1>Halo, {{ auth()->user()->name }}!</h1>
    <p>Selamat datang di Rentalin. Siap merencanakan perjalanan berikutnya?</p>
    <a class="btn btn-light text-primary" href="{{ route('home') }}">Cari Kendaraan</a>
    <a class="btn btn-outline-light ml-2" href="{{ route('bookings') }}">Booking Saya</a>
</section>
<div class="row mt-4">
    <div class="col-md-4 mb-3"><div class="feature"><i class="fas fa-car"></i><h6 class="font-weight-bold">Cari Kendaraan</h6><p class="text-muted mb-0">Jelajahi mobil dan motor yang tersedia.</p></div></div>
    <div class="col-md-4 mb-3"><div class="feature"><i class="fas fa-calendar-check"></i><h6 class="font-weight-bold">Booking Saya</h6><p class="text-muted mb-0">Pantau pengajuan dan status pesananmu.</p></div></div>
    <div class="col-md-4 mb-3"><div class="feature"><i class="fas fa-user-check"></i><h6 class="font-weight-bold">Akun Aktif</h6><p class="text-muted mb-0">Masuk sebagai {{ auth()->user()->role }}.</p></div></div>
</div>
@endsection
