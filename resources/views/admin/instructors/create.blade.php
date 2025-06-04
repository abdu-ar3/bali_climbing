@extends('admin.layout')

@section('content')
    <h1>Tambah Instruktur</h1>

    <form action="{{ route('admin.instructors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Instruktur</label>
            <select name="user_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="contact">Kontak</label>
            <input type="text" name="contact" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-4">Tambah Instruktur</button>
    </form>
@endsection
