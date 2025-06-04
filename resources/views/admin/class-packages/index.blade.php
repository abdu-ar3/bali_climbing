<!-- resources/views/admin/class-packages/index.blade.php -->
@extends('admin.layout')

@section('content')
    <h1>Daftar Paket Kelas</h1>
    <a href="{{ route('admin.class-packages.create') }}" class="btn btn-primary">Tambah Kelas</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Durasi</th>
                <th>Jadwal</th>
                <th>Instruktur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classPackages as $classPackage)
                <tr>
                    <td>{{ $classPackage->name }}</td>
                    <td>{{ $classPackage->description }}</td>
                    <td>{{ $classPackage->price }}</td>
                    <td>{{ $classPackage->duration }} jam</td>
                    <td>{{ $classPackage->schedule }}</td>
                    <td>{{ $classPackage->instructor->name }}</td>
                    <td>
                        <a href="{{ route('admin.class-packages.edit', $classPackage->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.class-packages.destroy', $classPackage->id) }}" method="POST" style="display:inline;">
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
