@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Jadwal Class Saya</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Waktu</th>
                <th>Deskripsi</th>
                <th>Durasi</th>
                <th>Jumlah Peserta</th>
                <th>Detail Peserta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $kelas)
                <tr>
                    <td>{{ $kelas->name }}</td>
                    <td>{{ $kelas->schedule }}</td>
                    <td>{{ $kelas->description }}</td>
                    <td>{{ $kelas->duration }} Hour</td>
                    <td>{{ $kelas->participants_count }}</td>
                    <td><a href="{{ route('instruktur.peserta', ['classId' => $kelas->id]) }}">Lihat Peserta</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
