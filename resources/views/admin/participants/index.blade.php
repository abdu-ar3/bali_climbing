@extends('admin.layout')

@section('content')
    <h1>Daftar Peserta</h1>
    <a href="{{ route('admin.participants.create') }}" class="btn btn-primary">Tambah Peserta</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama Peserta</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participant)
                <tr>
                    <td>{{ $participant->user->name }}</td>
                    <td>{{ $participant->classPackage->name }}</td>
                    <td>
                        <a href="{{ route('admin.participants.edit', $participant->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.participants.destroy', $participant->id) }}" method="POST" style="display:inline;">
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
