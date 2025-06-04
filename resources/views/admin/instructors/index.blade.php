@extends('admin.layout')

@section('content')
    <h1>Daftar Instruktur</h1>
    <a href="{{ route('admin.instructors.create') }}" class="btn btn-primary">Tambah Instruktur</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama Instruktur</th>
                <th>Email</th>
                <th>Bio</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instructors as $instructor)
                <tr>
                    <td>{{ $instructor->user->name }}</td>
                    <td>{{ $instructor->user->email }}</td>
                    <td>{{ $instructor->bio }}</td>
                    <td>{{ $instructor->contact }}</td>
                    <td>
                        <a href="{{ route('admin.instructors.edit', $instructor->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.instructors.destroy', $instructor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

