@extends('admin.layout')

@section('content')
    <h1>Jadwal Kelas Saya</h1>

    @foreach ($classes as $class)
        <h3>{{ $class->name }} - Jadwal: {{ $class->schedule }}</h3>
        <h4>Peserta</h4>
        <ul>
            @foreach ($participants[$class->id] as $participant)
                <li>
                    <!-- Pengecekan null untuk memastikan $participant->user tidak null -->
                    @if ($participant->user)
                        {{ $participant->user->name }}
                    @else
                        Tidak ada nama
                    @endif
                </li>
            @endforeach
        </ul>
    @endforeach
@endsection
