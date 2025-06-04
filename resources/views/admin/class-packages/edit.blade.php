@extends('admin.layout')

@section('content')
    <h1>Edit Paket Kelas</h1>

    <form action="{{ route('admin.class-packages.update', $classPackage->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Kelas</label>
            <input type="text" name="name" class="form-control" value="{{ $classPackage->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" required>{{ $classPackage->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" class="form-control" value="{{ $classPackage->price }}" required>
        </div>

        <div class="form-group">
            <label for="duration">Durasi (Jam)</label>
            <input type="number" name="duration" class="form-control" value="{{ $classPackage->duration }}" required>
        </div>

        <div class="form-group">
            <label for="schedule">Jadwal</label>
            <input type="datetime-local" name="schedule" class="form-control" value="{{ \Carbon\Carbon::parse($classPackage->schedule)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="instructor_id">Instruktur</label>
            <select name="instructor_id" class="form-control" required>
                @foreach ($instructors as $instructor)
                    <option value="{{ $instructor->id }}" {{ $instructor->id == $classPackage->instructor_id ? 'selected' : '' }}>
                        {{ $instructor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-4">Update Kelas</button>
    </form>
@endsection
