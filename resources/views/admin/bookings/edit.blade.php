@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Edit Booking</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id">Peserta</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="class_package_id">Kelas</label>
            <select name="class_package_id" class="form-control" required>
                @foreach($classPackages as $class)
                    <option value="{{ $class->id }}" {{ $booking->class_package_id == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="booking_date">Tanggal Booking</label>
            <input type="datetime-local" name="booking_date" class="form-control"
                   value="{{ \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                @foreach(['pending', 'confirmed', 'cancelled'] as $status)
                    <option value="{{ $status }}" {{ $booking->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
