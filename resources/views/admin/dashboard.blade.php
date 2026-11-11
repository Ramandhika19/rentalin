@extends("layouts.app")
@section("title", "Dashboard Admin")
@section("content")
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div><h2 class="section-title mb-1">Dashboard Admin</h2><p class="section-sub mb-0">Ringkasan aktivitas Rentalin.</p></div>
    <div class="mt-3 mt-md-0"><a class="btn btn-primary mr-2" href="{{ route('admin.vehicles') }}"><i class="fas fa-car mr-1"></i> Kelola Kendaraan</a><a class="btn btn-outline-primary" href="{{ route('admin.bookings') }}"><i class="fas fa-calendar mr-1"></i> Kelola Booking</a></div>
</div>
<div class="row">
@foreach($stats as $k=>$v)
    <div class="col-sm-6 col-lg-3 mb-3"><div class="card p-3"><div class="text-muted">{{ $k }}</div><h2 class="font-weight-bold mb-0">{{ $v }}</h2></div></div>
@endforeach
</div>
<div class="card p-4 mt-3">
    <h5 class="font-weight-bold mb-3">Booking terbaru</h5>
    @forelse($bookings as $b)
        <div class="d-flex justify-content-between border-bottom py-3"><div><strong>{{ $b->user->name }}</strong><div class="text-muted small">{{ $b->vehicle->name }} · {{ $b->start_date }} – {{ $b->end_date }}</div></div><span class="badge badge-info align-self-center">{{ $b->status }}</span></div>
    @empty
        <p class="text-muted mb-0">Belum ada booking.</p>
    @endforelse
</div>
@endsection
