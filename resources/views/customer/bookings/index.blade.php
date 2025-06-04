@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Status Pemesanan Kelas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->classPackage->name }}</td>
                    <td>{{ $booking->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>
                        @if ($booking->status === 'confirmed')
                            <a href="{{ route('customer.feedback.create', $booking->classPackage->id) }}" class="btn btn-secondary">
                                Beri Feedback
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
