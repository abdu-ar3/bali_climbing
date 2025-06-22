@extends('admin.layout')

@section('content')
    <h1>Tambah Paket Kelas</h1>

    <form action="{{ route('admin.class-packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nama Kelas</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="duration">Durasi (Jam)</label>
            <input type="number" name="duration" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="schedule">Jadwal</label>
            <input type="datetime-local" name="schedule" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Gambar Kelas</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="instructor_id">Instruktur</label>
            <select name="instructor_id" class="form-control" required>
                @foreach ($instructors as $instructor)
                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-4">Tambah Kelas</button>
    </form>
@endsection
