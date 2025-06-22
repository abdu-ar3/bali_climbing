@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Status Pemesanan Kelas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th>Bukti Pembayaran</th>
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
                        @if ($booking->bukti_pembayaran)
                            <img src="{{ asset('storage/' . $booking->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="120">
                        @else
                            <form action="{{ route('customer.bukti.upload', $booking->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="file" name="bukti_pembayaran" class="form-control mb-2" required>
                                <button type="submit" class="btn btn-sm btn-success">Upload</button>
                            </form>
                        @endif
                    </td>

                    <td>
                        @if ($booking->status === 'confirmed')
                            <a href="{{ route('customer.feedback.create', $booking->classPackage->id) }}" class="btn btn-secondary">
                                Beri Feedback
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($booking->status == 'confirmed')
                            <a href="{{ route('customer.feedback.show', ['classPackageId' => $booking->class_package_id]) }}" class="btn btn-primary">
                                Lihat Ulasan
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
