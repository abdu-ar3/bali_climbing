@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Data Booking</h2>
    <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary mb-3">Tambah Booking</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Peserta</th>
                <th>Kelas</th>
                <th>Bukti Pembayaran</th>
                <th>Tanggal Booking</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $i => $booking)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->classPackage->name }}</td>
                    <td>
                         @if ($booking->bukti_pembayaran)
                            <img src="{{ asset('storage/' . $booking->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100">
                        @else
                            Belum ada bukti Pembayaran
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                    <td><span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'cancelled' ? 'danger' : 'secondary') }}">{{ ucfirst($booking->status) }}</span></td>
                    <td>
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus booking ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
