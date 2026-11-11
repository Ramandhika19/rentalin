@extends("layouts.app")

@section("title", "Masuk")

@section("content")
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card auth-card">
            <div class="text-center mb-4">
                <div class="mb-3"><i class="fas fa-car-side fa-3x text-primary"></i></div>
                <h2 class="font-weight-bold">Selamat Datang Kembali</h2>
                <p class="text-muted">Masuk untuk melanjutkan perjalananmu bersama Rentalin.</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Masukkan password" required>
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                    <label class="custom-control-label" for="remember">Ingat saya</label>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Masuk <i class="fas fa-arrow-right ml-1"></i></button>
            </form>
            <p class="text-center mt-4 mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
        </div>
    </div>
</div>
@endsection
