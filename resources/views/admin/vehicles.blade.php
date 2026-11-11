@extends("layouts.app")
@section("title", "Kelola Kendaraan")
@section("content")
<div class="d-flex justify-content-between align-items-center mb-4"><div><h2 class="section-title mb-1">Kelola Kendaraan</h2><p class="section-sub mb-0">Tambah dan perbarui katalog kendaraan.</p></div><a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Kembali</a></div>
<div class="card p-4 mb-4">
    <h5 class="font-weight-bold mb-3">Tambah kendaraan</h5>
    <form method="POST" action="{{ route('admin.vehicle.create') }}">@csrf
        <div class="form-row">
            <div class="col-md-4 form-group"><label>Nama kendaraan</label><input class="form-control" name="name" placeholder="Contoh: Honda Brio" required></div>
            <div class="col-md-4 form-group"><label>Brand</label><input class="form-control" name="brand" placeholder="Honda"></div>
            <div class="col-md-4 form-group"><label>Nomor polisi</label><input class="form-control" name="plate_number" placeholder="DK 1234 ABC" required></div>
        </div>
        <div class="form-row">
            <div class="col-md-3 form-group"><label>Jenis</label><select name="type" class="form-control"><option value="motor">Motor</option><option value="mobil">Mobil</option></select></div>
            <div class="col-md-3 form-group"><label>Tahun</label><input type="number" name="year" class="form-control" placeholder="2024"></div>
            <div class="col-md-3 form-group"><label>Harga per hari (Rp)</label><input type="number" name="price_per_day" class="form-control" min="1" required></div>
            <div class="col-md-3 form-group"><label>Status</label><select name="status" class="form-control"><option value="available">Tersedia</option><option value="unavailable">Tidak tersedia</option></select></div>
        </div>
        <div class="form-group"><label>Deskripsi</label><textarea name="description" class="form-control" rows="2"></textarea></div>
        <div class="form-group"><label>URL gambar (opsional)</label><input name="image" type="url" class="form-control" placeholder="https://..."></div>
        <button class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Tambah Kendaraan</button>
    </form>
</div>
@forelse($vehicles as $v)
<div class="card p-4 mb-3">
    <form method="POST" action="{{ route('admin.vehicle.update', $v->id) }}">@csrf
        <div class="d-flex justify-content-between align-items-center mb-3"><h5 class="font-weight-bold mb-0">{{ $v->name }}</h5><span class="badge badge-info">{{ $v->status }}</span></div>
        <div class="form-row">
            <div class="col-md-4 form-group"><label>Nama</label><input class="form-control" name="name" value="{{ $v->name }}" required></div>
            <div class="col-md-4 form-group"><label>Brand</label><input class="form-control" name="brand" value="{{ $v->brand }}"></div>
            <div class="col-md-4 form-group"><label>Nomor polisi</label><input class="form-control" name="plate_number" value="{{ $v->plate_number }}" required></div>
        </div>
        <div class="form-row">
            <div class="col-md-3 form-group"><label>Jenis</label><select name="type" class="form-control"><option value="motor" {{ $v->type === "motor" ? "selected" : "" }}>Motor</option><option value="mobil" {{ $v->type === "mobil" ? "selected" : "" }}>Mobil</option></select></div>
            <div class="col-md-2 form-group"><label>Tahun</label><input type="number" name="year" class="form-control" value="{{ $v->year }}"></div>
            <div class="col-md-3 form-group"><label>Harga/hari</label><input type="number" name="price_per_day" class="form-control" value="{{ $v->price_per_day }}" min="1" required></div>
            <div class="col-md-4 form-group"><label>Status</label><select name="status" class="form-control"><option value="available" {{ $v->status === "available" ? "selected" : "" }}>Tersedia</option><option value="unavailable" {{ $v->status === "unavailable" ? "selected" : "" }}>Tidak tersedia</option></select></div>
        </div>
        <div class="form-group"><label>Deskripsi</label><textarea name="description" class="form-control">{{ $v->description }}</textarea></div>
        <div class="form-group"><label>URL gambar</label><input name="image" type="url" class="form-control" value="{{ $v->image }}"></div>
        <button class="btn btn-primary btn-sm">Simpan Perubahan</button>
    </form>
    <form method="POST" action="{{ route('admin.vehicle.delete', $v->id) }}" class="mt-2" onsubmit="return confirm('Hapus kendaraan ini?')">@csrf @method("DELETE")<button class="btn btn-outline-danger btn-sm">Hapus Kendaraan</button></form>
</div>
@empty
<div class="card p-5 text-center"><p class="text-muted mb-0">Belum ada data kendaraan.</p></div>
@endforelse
<div class="d-flex justify-content-center">{{ $vehicles->links() }}</div>
@endsection
