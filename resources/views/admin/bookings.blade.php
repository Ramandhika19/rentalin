@extends("layouts.app")
@section("title", "Kelola Booking")
@section("content")
<div class="d-flex justify-content-between align-items-center mb-4"><div><h2 class="section-title mb-1">Kelola Booking</h2><p class="section-sub mb-0">Periksa pesanan dan perbarui statusnya.</p></div><a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Kembali</a></div>
<div class="card p-3 table-responsive">
<table class="table">
    <thead><tr><th>Pelanggan</th><th>Kendaraan</th><th>Tanggal</th><th>Total</th><th>Status</th><th>Update</th></tr></thead>
    <tbody>
    @forelse($bookings as $b)
    <tr>
        <td>{{ $b->user->name }}</td><td>{{ $b->vehicle->name }}</td><td>{{ $b->start_date }} - {{ $b->end_date }}</td><td>Rp {{ number_format($b->total_price, 0, ",", ".") }}</td>
        <td><span class="badge badge-info">{{ $b->status }}</span></td>
        <td><form method="POST" action="{{ route('admin.booking.update', $b->id) }}">@csrf @method("PATCH")
            <select name="status" class="form-control mb-1">@foreach(["pending","approved","rejected","completed","cancelled"] as $s)<option value="{{ $s }}" {{ $b->status === $s ? "selected" : "" }}>{{ ucfirst($s) }}</option>@endforeach</select>
            <button class="btn btn-sm btn-primary">Update</button>
        </form></td>
    </tr>
    @empty<tr><td colspan="6" class="text-center text-muted py-4">Belum ada booking.</td></tr>@endforelse
    </tbody>
</table>
{{ $bookings->links() }}
</div>
@endsection
