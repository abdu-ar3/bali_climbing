<!-- resources/views/admin/class-packages/index.blade.php -->
@extends('admin.layout')

@section('content')
    <h1>Daftar Paket Kelas</h1>
    
    <a href="{{ route('admin.class-packages.create') }}" class="btn btn-primary">Tambah Kelas</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Durasi</th>
                <th>Jadwal</th>
                <th>Gambar</th>
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
                    <td>{{ \Carbon\Carbon::parse($classPackage->schedule )->format('d M Y') }}</td>
                     <td>
                         @if ($classPackage->image)
                            <img src="{{ asset('storage/' . $classPackage->image) }}" alt="Bukti Pembayaran" width="100">
                        @else
                            Gambar Default
                        @endif
                    </td>
                    <td>{{ $classPackage->instructor->name }}</td>
                    <td>
                        <a href="{{ route('admin.class-packages.edit', $classPackage->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.class-packages.destroy', $classPackage->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
