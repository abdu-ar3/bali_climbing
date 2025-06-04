@extends('admin.layout')

@section('content')
    <h1>Edit Instruktur</h1>

    <form action="{{ route('admin.instructors.update', $instructor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" class="form-control">{{ $instructor->bio }}</textarea>
        </div>

        <div class="form-group">
            <label for="contact">Kontak</label>
            <input type="text" name="contact" class="form-control" value="{{ $instructor->contact }}">
        </div>

        <button type="submit" class="btn btn-success mt-4">Update Instruktur</button>
    </form>
@endsection
