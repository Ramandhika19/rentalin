@extends("layouts.app")
@section("title", $vehicle->name)
@push("styles")
<style>
.vehicle-detail-photo{width:100%;height:420px;object-fit:contain;background:#f1f3f5;padding:16px;border-radius:8px}
.detail-card{border:1px solid #e7e9ed;border-radius:10px;box-shadow:0 2px 9px rgba(20,30,45,.04)}
.detail-label{font-size:12px;color:#7b8493;margin-bottom:4px}
.detail-value{font-weight:700;color:#263449}
</style>
@endpush
@section("content")
<div class="mb-4"><a href="{{ route('home') }}" class="text-muted"><i class="fas fa-arrow-left mr-2"></i>Kembali ke katalog</a></div>
@php
    $vehiclePhotos = [
        'honda vario 160' => 'https://radartasik.disway.id/upload/ad66a4d53a26e0cec0f495802e4215ea.jpg',
        'yamaha nmax' => 'https://www.yamaha-motor.co.jp/mc/lineup/nmax/img/nmax_price_2022.jpg',
        'toyota avanza' => 'https://www.autopediame.com/storage/images/Toyota/%D8%AA%D9%88%D9%8A%D9%88%D8%AA%D8%A7%20%D8%A7%D9%81%D8%A7%D9%86%D8%B2%D8%A7%201.jpg',
        'honda brio' => 'https://img3.icarcdn.com/45417861/gallery_mobil-bekas-carmudi-honda-brio-satya-e-hatchback-indonesia_f7cb6773-a6f7-4362-9d4d-635b26ecaf33.jpeg?smia=xTM',
        'toyota innova reborn' => 'https://thumb.katadata.co.id/frontend/thumbnail/2025/10/14/zigi-68ee4a67b5553-innova-reborn_910_512.jpg',
        'honda scoopy' => 'https://media.doanhnghiepvn.vn/Images/Uploaded/Share/2022/11/06/a39honda-scoopy-2023.jpg'
    ];
    $photo = $vehicle->image ? (\Illuminate\Support\Str::startsWith($vehicle->image, ['http://','https://']) ? $vehicle->image : asset('storage/'.$vehicle->image)) : (isset($vehiclePhotos[strtolower(trim($vehicle->name))]) ? $vehiclePhotos[strtolower(trim($vehicle->name))] : null);
@endphp
<div class="row">
    <div class="col-lg-7 mb-4">
        <div class="card detail-card p-3">
            @if($photo)
                <img src="{{ $photo }}" class="vehicle-detail-photo" alt="Foto {{ $vehicle->name }}">
            @else
                <div class="vehicle-detail-photo d-flex align-items-center justify-content-center text-muted"><div class="text-center"><i class="fas fa-car-side fa-3x mb-2"></i><div>Foto kendaraan belum tersedia</div></div></div>
            @endif
            <div class="p-3">
                <span class="badge badge-info mb-2">{{ ucfirst($vehicle->type) }}</span>
                <h2 class="font-weight-bold">{{ $vehicle->name }}</h2>
                <p class="text-muted">{{ $vehicle->brand }} · {{ $vehicle->year }}</p>
                <h5 class="font-weight-bold mt-4">Informasi kendaraan</h5>
                <p class="text-muted">{{ $vehicle->description ?: 'Informasi kendaraan belum ditambahkan.' }}</p>
                <div class="row mt-4">
                    <div class="col-6 mb-3"><div class="detail-label">Tahun</div><div class="detail-value">{{ $vehicle->year ?: '-' }}</div></div>
                    <div class="col-6 mb-3"><div class="detail-label">Nomor polisi</div><div class="detail-value">{{ $vehicle->plate_number }}</div></div>
                    <div class="col-6"><div class="detail-label">Jenis</div><div class="detail-value">{{ ucfirst($vehicle->type) }}</div></div>
                    <div class="col-6"><div class="detail-label">Status</div><div class="detail-value">{{ $vehicle->status === 'available' ? 'Tersedia' : 'Tidak tersedia' }}</div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card detail-card p-4">
            <small class="text-muted">Harga sewa</small>
            <div class="price mb-1">Rp {{ number_format($vehicle->price_per_day, 0, ",", ".") }} <small class="text-muted font-weight-normal">/ hari</small></div>
            <hr>
            @if($vehicle->status !== 'available')
                <div class="alert alert-secondary">Kendaraan ini sedang tidak tersedia untuk dipesan.</div>
            @else
                @auth
                    <form method="POST" action="{{ route('vehicle.booking', $vehicle->id) }}">
                        @csrf
                        <label>Tanggal mulai sewa</label><input type="date" name="start_date" min="{{ date('Y-m-d') }}" class="form-control mb-3" required>
                        <label>Tanggal selesai sewa</label><input type="date" name="end_date" min="{{ date('Y-m-d') }}" class="form-control mb-3" required>
                        <label>Catatan tambahan</label><textarea name="notes" class="form-control mb-3" rows="3" placeholder="Opsional"></textarea>
                        <button class="btn btn-primary btn-block">Ajukan booking</button>
                    </form>
                @else
                    <p class="text-muted">Masuk ke akun untuk mengajukan pemesanan kendaraan ini.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-block">Masuk untuk booking</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-block mt-2">Buat akun</a>
                @endauth
            @endif
            <div class="mt-3 text-muted small"><i class="fas fa-info-circle mr-2"></i>Pastikan tanggal sewa sudah sesuai sebelum mengirim booking.</div>
        </div>
    </div>
</div>
@endsection
