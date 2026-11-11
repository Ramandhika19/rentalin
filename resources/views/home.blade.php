@extends("layouts.app")
@section("title", "Rental Mobil dan Motor")
@push("styles")
<style>
.home-heading{padding:34px 0 26px;border-bottom:1px solid #e6e9ee;margin-bottom:28px}
.home-heading h1{font-size:31px;font-weight:800;letter-spacing:-.8px;color:#17243a;margin-bottom:8px}
.home-heading p{color:#687386;max-width:650px;margin:0}
.vehicle-photo{height:220px;object-fit:contain;background:#f1f3f5;padding:12px}
.vehicle-card{border:1px solid #e7e9ed;box-shadow:0 2px 9px rgba(20,30,45,.04);border-radius:10px}
.vehicle-card:hover{transform:translateY(-2px);box-shadow:0 7px 18px rgba(20,30,45,.08)}
.vehicle-card .card-body{padding:18px}
.vehicle-card h5{font-size:17px}
.vehicle-category{font-size:11px;text-transform:uppercase;letter-spacing:.7px;color:#6b7280;font-weight:700}
.home-tools{display:flex;gap:10px;flex-wrap:wrap;margin:22px 0 28px}
.home-tools a{border:1px solid #d9dee7;border-radius:6px;padding:8px 14px;color:#344054;font-weight:600;font-size:13px;background:#fff}
.home-tools a:hover{border-color:#2563eb;color:#2563eb;text-decoration:none}
</style>
@endpush
@section("content")
<section class="home-heading">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="vehicle-category mb-2">Rentalin · Katalog kendaraan</div>
            <h1>Sewa mobil dan motor</h1>
            <p>Pilih kendaraan yang tersedia, periksa detail dan harga sewanya, lalu ajukan pemesanan sesuai tanggal perjalanan.</p>
        </div>
        <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
            <span class="text-muted small"><i class="fas fa-map-marker-alt mr-1"></i> Pilihan kendaraan untuk perjalananmu</span>
        </div>
    </div>
</section>
<div class="home-tools">
    <a href="#kendaraan"><i class="fas fa-th-large mr-1"></i> Semua kendaraan</a>
    <a href="#kendaraan"><i class="fas fa-car mr-1"></i> Mobil & motor</a>
</div>
<div id="kendaraan" class="d-flex justify-content-between align-items-end mb-3">
    <div><h2 class="section-title mb-1" style="font-size:22px">Kendaraan tersedia</h2><p class="section-sub mb-0">Harga sewa ditampilkan per hari.</p></div>
    <small class="text-muted">{{ $vehicles->total() }} unit</small>
</div>
<div class="row">
@forelse($vehicles as $v)
    @php
        $vehiclePhotos = [
            'honda vario 160' => 'https://radartasik.disway.id/upload/ad66a4d53a26e0cec0f495802e4215ea.jpg',
            'yamaha nmax' => 'https://www.yamaha-motor.co.jp/mc/lineup/nmax/img/nmax_price_2022.jpg',
            'toyota avanza' => 'https://www.autopediame.com/storage/images/Toyota/%D8%AA%D9%88%D9%8A%D9%88%D8%AA%D8%A7%20%D8%A7%D9%81%D8%A7%D9%86%D8%B2%D8%A7%201.jpg',
            'honda brio' => 'https://img3.icarcdn.com/45417861/gallery_mobil-bekas-carmudi-honda-brio-satya-e-hatchback-indonesia_f7cb6773-a6f7-4362-9d4d-635b26ecaf33.jpeg?smia=xTM',
            'toyota innova reborn' => 'https://thumb.katadata.co.id/frontend/thumbnail/2025/10/14/zigi-68ee4a67b5553-innova-reborn_910_512.jpg',
            'honda scoopy' => 'https://media.doanhnghiepvn.vn/Images/Uploaded/Share/2022/11/06/a39honda-scoopy-2023.jpg'
        ];
        $photo = $v->image ? (\Illuminate\Support\Str::startsWith($v->image, ['http://','https://']) ? $v->image : asset('storage/'.$v->image)) : (isset($vehiclePhotos[strtolower(trim($v->name))]) ? $vehiclePhotos[strtolower(trim($v->name))] : null);
    @endphp
    <div class="col-md-6 col-lg-4 mb-4">
        <article class="card vehicle-card h-100">
            @if($photo)
                <img src="{{ $photo }}" class="vehicle-photo" alt="Foto {{ $v->name }}" loading="lazy">
            @else
                <div class="vehicle-photo d-flex align-items-center justify-content-center"><div class="text-center text-muted"><i class="fas fa-car-side fa-2x mb-2"></i><div>Foto belum tersedia</div></div></div>
            @endif
            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="vehicle-category">{{ ucfirst($v->type) }}</span>
                    <small class="text-muted">{{ $v->year }}</small>
                </div>
                <h5 class="font-weight-bold mb-1">{{ $v->name }}</h5>
                <p class="text-muted small mb-3">{{ $v->brand }}</p>
                <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                    <div><div class="price mb-0">Rp {{ number_format($v->price_per_day, 0, ",", ".") }}</div><small class="text-muted">/ hari</small></div>
                    <a class="btn btn-primary btn-sm" href="{{ route('vehicles.show', $v->id) }}">Lihat detail</a>
                </div>
            </div>
        </article>
    </div>
@empty
    <div class="col-12"><div class="card p-5 text-center"><i class="fas fa-car-side fa-2x text-muted mb-3"></i><h5>Belum ada kendaraan tersedia</h5><p class="text-muted mb-0">Silakan cek kembali nanti.</p></div></div>
@endforelse
</div>
<div class="d-flex justify-content-center">{{ $vehicles->links() }}</div>
@endsection
