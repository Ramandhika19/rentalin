@extends("layouts.app")

@section("title", "Daftar")

@section("content")
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card auth-card">
            <div class="text-center mb-4">
                <div class="mb-3"><i class="fas fa-user-plus fa-3x text-primary"></i></div>
                <h2 class="font-weight-bold">Bergabung dengan Rentalin</h2>
                <p class="text-muted">Buat akun untuk memesan kendaraan dengan mudah.</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label>Nama lengkap</label>
                    <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama lengkap" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                </div>
                <div class="form-group">
                    <label>No. HP</label>
                    <input class="form-control" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Minimal 6 karakter" required>
                </div>
                <div class="form-group">
                    <label>Konfirmasi password</label>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Ulangi password" required>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Buat Akun <i class="fas fa-arrow-right ml-1"></i></button>
            </form>
            <p class="text-center mt-4 mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
        </div>
    </div>
</div>
@endsection
